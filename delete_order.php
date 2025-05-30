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

    // Get JSON input
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!isset($input['order_id'])) {
        throw new Exception('Order ID is required');
    }

    $orderId = intval($input['order_id']);
    
    // Prepare and execute delete query
    $stmt = $pdo->prepare("DELETE FROM kitchen_orders WHERE id = ?");
    $result = $stmt->execute([$orderId]);
    
    if ($result && $stmt->rowCount() > 0) {
        echo json_encode([
            'success' => true,
            'message' => 'Order deleted successfully'
        ]);
    } else {
        throw new Exception('Failed to delete order or order not found');
    }
    
} catch (Exception $e) {
    // Return error response
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?>