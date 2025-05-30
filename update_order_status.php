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

// Set header first
header('Content-Type: application/json');

// Get the raw POST data
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validate input
if (!$data || !isset($data['order_id']) || !isset($data['status'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid input data']);
    exit;
}

$orderId = $data['order_id'];
$status = $data['status'];

// Validate status value
$validStatuses = ['preparing', 'pending', 'completed', 'assigned'];
if (!in_array($status, $validStatuses)) {
    echo json_encode(['success' => false, 'message' => 'Invalid status value']);
    exit;
}

try {
    $stmt = $conn->prepare("UPDATE kitchen_orders SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $orderId);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Status updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update status']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
} finally {
    $conn->close();
}
?>