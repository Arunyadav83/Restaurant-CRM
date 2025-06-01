<?php
header('Content-Type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);

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

    // Validate required fields
    $required = ['item_name', 'price', 'category_id'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            throw new Exception("Required field '$field' is missing");
        }
    }

    // Process file upload if present
    $imagePath = null;
    if (!empty($_FILES['item_image']['name'])) {
        $uploadDir = 'uploads/menu/';
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

    // Get input values
    $itemName = $_POST['item_name'];
    $subItem = $_POST['sub_item'] ?? '';
    $price = (float)$_POST['price'];
    $categoryId = (int)$_POST['category_id'];
    $subCategoryId = isset($_POST['sub_category_id']) ? (int)$_POST['sub_category_id'] : null;

    // Prepare and execute SQL (includes sub_category_id)
    $stmt = $conn->prepare("INSERT INTO menu_items 
        (item_name, description, price, image_path, category_id, sub_category_id) 
        VALUES (?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        throw new Exception('Prepare failed: ' . $conn->error);
    }

    // Bind params: s = string, d = double, i = integer
    $stmt->bind_param("ssdsii", 
        $itemName,
        $subItem,
        $price,
        $imagePath,
        $categoryId,
        $subCategoryId
    );

    if ($stmt->execute()) {
        $response = [
            'success' => true,
            'message' => 'Menu item added successfully!',
            'item_id' => $stmt->insert_id
        ];
    } else {
        throw new Exception('Failed to save menu item: ' . $stmt->error);
    }
} catch (Exception $e) {
    error_log("Error in add_menu_item.php: " . $e->getMessage());
    $response['message'] = $e->getMessage();
    
    // Clean up uploaded image if insertion fails
    if (isset($targetFile) && file_exists($targetFile)) {
        @unlink($targetFile);
    }
}

echo json_encode($response);
$conn->close();
