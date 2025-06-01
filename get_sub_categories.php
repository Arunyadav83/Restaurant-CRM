<?php
header('Content-Type: application/json');

// Database configuration
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'arogya';

// Create connection
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
$response = ['success' => false, 'data' => [], 'message' => ''];

try {
    if (!isset($_GET['category_id'])) {
        throw new Exception('Category ID is required');
    }

    $categoryId = intval($_GET['category_id']);
    
    $stmt = $conn->prepare("
        SELECT id, name, description 
        FROM sub_categories 
        WHERE category_id = ? 
        ORDER BY name ASC
    ");
    $stmt->bind_param("i", $categoryId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $subCategories = [];
    while ($row = $result->fetch_assoc()) {
        $subCategories[] = $row;
    }
    
    $response['success'] = true;
    $response['data'] = $subCategories;
    $response['message'] = 'Sub-categories retrieved successfully';
    
} catch (Exception $e) {
    $response['message'] = $e->getMessage();
} finally {
    $stmt->close();
    $conn->close();
    echo json_encode($response);
}
?>
