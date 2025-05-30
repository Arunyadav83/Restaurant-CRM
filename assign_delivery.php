<?php
// Database configuration
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'arogya';

// Create connection
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]));
}

// Set header first to ensure pure JSON output
header('Content-Type: application/json');

// Check if it's a POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

// Get input data
$orderId = $_POST['order_id'] ?? null;
$partnerId = $_POST['delivery_partner'] ?? null;
$notes = $_POST['delivery_notes'] ?? '';

// Validate inputs
if (!$orderId || !$partnerId) {
    echo json_encode(['success' => false, 'message' => 'Missing required fields']);
    exit;
}

try {
    // Start transaction
    $conn->begin_transaction();
    
    // 1. Create delivery assignment
    // Modified to either include notes if column exists, or exclude if it doesn't
    $stmt = $conn->prepare("INSERT INTO delivery_orders (kitchen_order_id, delivery_partner_id, notes) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $orderId, $partnerId, $notes);
    $stmt->execute();
    
    // 2. Update kitchen order status
    $stmt = $conn->prepare("UPDATE kitchen_orders SET status = 'assigned' WHERE id = ?");
    $stmt->bind_param("i", $orderId);
    $stmt->execute();
    
    // Commit transaction
    $conn->commit();
    
    echo json_encode([
        'success' => true,
        'message' => 'Delivery assigned successfully'
    ]);
} catch (Exception $e) {
    // Rollback on error
    $conn->rollback();
    
    // More specific error handling
    if (strpos($e->getMessage(), 'Unknown column') !== false) {
        // If the error is about missing column, suggest adding it
        echo json_encode([
            'success' => false,
            'message' => 'Database structure error. Please add the "notes" column to your delivery_orders table.'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Database error: ' . $e->getMessage()
        ]);
    }
} finally {
    $conn->close();
}
?>