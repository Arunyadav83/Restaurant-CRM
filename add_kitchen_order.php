<?php
header('Content-Type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Enable error logging
ini_set('log_errors', 1);
ini_set('error_log', 'php_errors.log');

// Database configuration
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'arogya';

// Create connection
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check connection
if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error);
    die(json_encode(['success' => false, 'message' => 'Database connection failed']));
}

// Initialize response
$response = ['success' => false, 'message' => ''];

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Invalid request method');
    }

    // Log received data for debugging
    error_log("Received POST data: " . print_r($_POST, true));
    error_log("Received FILES data: " . print_r($_FILES, true));

    // Validate required fields
    $required = ['item_name', 'quantity', 'status'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            throw new Exception("Required field '$field' is missing");
        }
    }

    // Process file upload if present
    $imagePath = null;
    if (!empty($_FILES['item_image']['name'])) {
        $uploadDir = 'uploads/kitchen/';
        if (!file_exists($uploadDir)) {
            if (!mkdir($uploadDir, 0777, true)) {
                throw new Exception('Failed to create upload directory');
            }
        }

        $fileExt = pathinfo($_FILES['item_image']['name'], PATHINFO_EXTENSION);
        $fileName = uniqid() . '.' . strtolower($fileExt);
        $targetFile = $uploadDir . $fileName;

        // Validate image
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array(strtolower($fileExt), $allowedTypes)) {
            throw new Exception('Only JPG, JPEG, PNG & GIF files are allowed');
        }

        if ($_FILES['item_image']['size'] > 5000000) { // 5MB max
            throw new Exception('File is too large (max 5MB)');
        }

        if (!move_uploaded_file($_FILES['item_image']['tmp_name'], $targetFile)) {
            throw new Exception('Failed to upload image');
        }

        $imagePath = $targetFile;
    }

    // Prepare and execute SQL
    $stmt = $conn->prepare("INSERT INTO kitchen_orders 
                           (item_name, sub_item, quantity, status, image_path, created_at) 
                           VALUES (?, ?, ?, ?, ?, NOW())");
    
    if (!$stmt) {
        throw new Exception('Prepare failed: ' . $conn->error);
    }
    
    $subItem = $_POST['sub_item'] ?? '';
    $stmt->bind_param("ssiss", 
        $_POST['item_name'],
        $subItem,
        $_POST['quantity'],
        $_POST['status'],
        $imagePath
    );

    if ($stmt->execute()) {
        $response = [
            'success' => true,
            'message' => 'Kitchen order added successfully!',
            'order_id' => $stmt->insert_id
        ];
    } else {
        throw new Exception('Failed to save order: ' . $stmt->error);
    }
} catch (Exception $e) {
    error_log("Error in add_kitchen_order.php: " . $e->getMessage());
    $response['message'] = $e->getMessage();
    
    // Clean up if there was an error after file upload
    if (isset($targetFile) && file_exists($targetFile)) {
        @unlink($targetFile);
    }
}

echo json_encode($response);
$conn->close();
?>