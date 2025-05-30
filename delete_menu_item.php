<?php
header('Content-Type: application/json');

// Database connection
$mysqli = new mysqli("localhost", "root", "", "arogya");

if ($mysqli->connect_error) {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => "Database connection failed: " . $mysqli->connect_error
    ]);
    exit;
}

// Allow only DELETE requests
if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    http_response_code(405); // Method Not Allowed
    echo json_encode([
        "success" => false,
        "message" => "Only DELETE requests are allowed"
    ]);
    exit;
}

// Get the ID from query parameters
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    http_response_code(400); // Bad Request
    echo json_encode([
        "success" => false,
        "message" => "Invalid menu item ID"
    ]);
    exit;
}

try {
    // Check if item exists first
    $check = $mysqli->prepare("SELECT id FROM menu_items WHERE id = ?");
    $check->bind_param("i", $id);
    $check->execute();
    $check->store_result();
    
    if ($check->num_rows === 0) {
        http_response_code(404); // Not Found
        echo json_encode([
            "success" => false,
            "message" => "Menu item not found"
        ]);
        exit;
    }

    // Delete the item
    $stmt = $mysqli->prepare("DELETE FROM menu_items WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo json_encode([
            "success" => true,
            "message" => "Menu item deleted successfully"
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            "success" => false,
            "message" => "Failed to delete menu item: " . $stmt->error
        ]);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => "Server error: " . $e->getMessage()
    ]);
}

$mysqli->close();
?>