<?php
header('Content-Type: application/json');

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$dbname = "arogya";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!isset($_GET['id'])) {
        throw new Exception('Order ID is required');
    }

    $orderId = intval($_GET['id']);
    
    // Prepare and execute query
    $stmt = $pdo->prepare("SELECT * FROM kitchen_orders WHERE id = ?");
    $stmt->execute([$orderId]);
    $order = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$order) {
        throw new Exception('Order not found');
    }
    
    // Return success response
    echo json_encode([
        'success' => true,
        'order' => $order
    ]);
    
} catch (Exception $e) {
    // Return error response
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?>