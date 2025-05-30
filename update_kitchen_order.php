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

    // Check if it's a POST request
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Invalid request method');
    }

    // Get form data
    $orderId = isset($_POST['order_id']) ? intval($_POST['order_id']) : null;
    $itemName = $_POST['item_name'] ?? null;
    $subItem = $_POST['sub_item'] ?? null;
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : null;
    $status = $_POST['status'] ?? null;

    // Validate required fields
    if (!$orderId || !$itemName || !$quantity || !$status) {
        throw new Exception('Missing required fields');
    }

    // Handle file upload if exists
    $imagePath = null;
    if (isset($_FILES['item_image']) && $_FILES['item_image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        $fileName = uniqid() . '_' . basename($_FILES['item_image']['name']);
        $targetPath = $uploadDir . $fileName;
        
        if (move_uploaded_file($_FILES['item_image']['tmp_name'], $targetPath)) {
            $imagePath = $targetPath;
            
            // Get old image path to delete it later
            $stmt = $pdo->prepare("SELECT image_path FROM kitchen_orders WHERE id = ?");
            $stmt->execute([$orderId]);
            $oldImage = $stmt->fetchColumn();
        }
    }

    // Prepare update query
    if ($imagePath) {
        $stmt = $pdo->prepare("UPDATE kitchen_orders SET item_name = ?, sub_item = ?, quantity = ?, status = ?, image_path = ? WHERE id = ?");
        $result = $stmt->execute([$itemName, $subItem, $quantity, $status, $imagePath, $orderId]);
        
        // Delete old image if it exists
        if ($oldImage && file_exists($oldImage)) {
            unlink($oldImage);
        }
    } else {
        $stmt = $pdo->prepare("UPDATE kitchen_orders SET item_name = ?, sub_item = ?, quantity = ?, status = ? WHERE id = ?");
        $result = $stmt->execute([$itemName, $subItem, $quantity, $status, $orderId]);
    }

    if ($result) {
        echo json_encode([
            'success' => true,
            'message' => 'Order updated successfully'
        ]);
    } else {
        throw new Exception('Failed to update order');
    }
    
} catch (Exception $e) {
    // Return error response
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?>