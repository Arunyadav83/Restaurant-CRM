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
    die(json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]));
}

try {
    // Fetch menu items with category and sub-category information
    $sql = "SELECT mi.*, mc.name AS category_name, 
                   sc.name AS sub_category_name, sc.id AS sub_category_id
            FROM menu_items mi
            LEFT JOIN menu_categories mc ON mi.category_id = mc.id
            LEFT JOIN sub_categories sc ON mi.sub_category_id = sc.id
            ORDER BY mi.item_name ASC";
    
    $result = $conn->query($sql);
    if (!$result) {
        throw new Exception('Query failed: ' . $conn->error);
    }

    $items = [];
    while($row = $result->fetch_assoc()) {
        $row['price'] = (float)$row['price'];
        $items[] = $row;
    }

    // Fetch all categories
    $categoriesResult = $conn->query("SELECT id, name FROM menu_categories ORDER BY name");
    $categories = [];
    while($row = $categoriesResult->fetch_assoc()) {
        $categories[] = $row;
    }

    echo json_encode([
        'success' => true,
        'items' => $items,
        'categories' => $categories
    ]);

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}

$conn->close();
?>