<?php
header('Content-Type: application/json');

// Database configuration
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'arogya';

// Create connection
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

$response = ['success' => false, 'message' => ''];

try {
    // Check if POST request
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Invalid request method');
    }

    // Get and validate input from $_POST
    $categoryId = isset($_POST['category_id']) ? intval($_POST['category_id']) : 0;
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';
    
    if (empty($name)) {
        throw new Exception('Sub-category name is required');
    }
    if ($categoryId <= 0) {
        throw new Exception('Valid category is required');
    }

    // Check if category exists
    $checkStmt = $conn->prepare("SELECT id FROM menu_categories WHERE id = ?");
    $checkStmt->bind_param("i", $categoryId);
    $checkStmt->execute();
    $checkStmt->store_result();
    
    if ($checkStmt->num_rows === 0) {
        throw new Exception('Invalid category ID');
    }
    $checkStmt->close();
    
    // Check for duplicate sub-category
    $duplicateStmt = $conn->prepare("SELECT id FROM sub_categories WHERE category_id = ? AND name = ?");
    $duplicateStmt->bind_param("is", $categoryId, $name);
    $duplicateStmt->execute();
    $duplicateStmt->store_result();
    
    if ($duplicateStmt->num_rows > 0) {
        throw new Exception('Sub-category already exists for this category');
    }
    $duplicateStmt->close();

    // Insert new sub-category
    $stmt = $conn->prepare("INSERT INTO sub_categories (category_id, name, description) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $categoryId, $name, $description);
    
    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = 'Sub-category added successfully';
        $response['id'] = $conn->insert_id; // Correctly get the inserted ID
    } else {
        throw new Exception('Failed to add sub-category: ' . $stmt->error);
    }
    $stmt->close();

} catch (Exception $e) {
    $response['message'] = $e->getMessage();
} finally {
    $conn->close();
    echo json_encode($response);
}
?>