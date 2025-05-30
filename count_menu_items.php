<?php
header('Content-Type: application/json');

$mysqli = new mysqli("localhost", "root", "", "arogya");

if ($mysqli->connect_error) {
    echo json_encode([
        "success" => false,
        "message" => "Database connection failed: " . $mysqli->connect_error
    ]);
    exit;
}

try {
    // Query to count all menu items
    $query = "SELECT COUNT(*) as total_menus FROM menu_items";
    $result = $mysqli->query($query);
    
    if ($result) {
        $row = $result->fetch_assoc();
        echo json_encode([
            'success' => true,
            'total_menus' => $row['total_menus']
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Query failed: ' . $mysqli->error
        ]);
    }
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Error counting menu items: ' . $e->getMessage()
    ]);
}

$mysqli->close();
?>