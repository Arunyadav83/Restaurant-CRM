<?php
ob_start(); // prevent unwanted output
header('Content-Type: application/json');

$mysqli = new mysqli("localhost", "root", "", "arogya");

if ($mysqli->connect_error) {
    echo json_encode([
        "success" => false,
        "message" => "Database connection failed"
    ]);
    exit;
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo json_encode([
        "success" => false,
        "message" => "Invalid ID"
    ]);
    exit;
}

$id = intval($_GET['id']);

// Perform deletion
$query = "DELETE FROM delivery_partners WHERE id = $id";
if ($mysqli->query($query)) {
    echo json_encode([
        "success" => true,
        "message" => "Partner deleted successfully"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Delete failed: " . $mysqli->error
    ]);
}
?>
