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

try {
    // Fetch menu items with category information
    $sql = "SELECT mi.*, mc.name AS category_name 
            FROM menu_items mi
            JOIN menu_categories mc ON mi.category_id = mc.id
            ORDER BY mi.created_at DESC";
    $result = $conn->query($sql);

    if (!$result) {
        throw new Exception('Query failed: ' . $conn->error);
    }

    $items = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
             $row['price'] = (float)$row['price'];
            $items[] = $row;
        }
    }

    // Fetch categories for the form
    $categoriesResult = $conn->query("SELECT * FROM menu_categories");
    $categories = [];
    if ($categoriesResult->num_rows > 0) {
        while($row = $categoriesResult->fetch_assoc()) {
            $categories[] = $row;
        }
    }

    echo json_encode([
        'success' => true,
        'items' => $items,
        'categories' => $categories
    ]);
} catch (Exception $e) {
    error_log("Error in get_menu_items.php: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}

$conn->close();
?>