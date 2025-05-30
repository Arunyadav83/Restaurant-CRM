<?php
header('Content-Type: application/json');

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arogya";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]));
}

// Get the posted data
$data = json_decode(file_get_contents('php://input'), true);
$customerId = isset($data['id']) ? intval($data['id']) : 0;

if ($customerId <= 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid customer ID']);
    exit;
}

// Prepare and execute the delete statement
$stmt = $conn->prepare("DELETE FROM customers WHERE id = ?");
$stmt->bind_param("i", $customerId);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No customer found with that ID']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Error deleting customer: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?>