<?php
header('Content-Type: application/json');
ini_set('display_errors', 0);
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

// Fetch active orders (excluding completed ones if you want)
$sql = "SELECT * FROM kitchen_orders ORDER BY created_at DESC";
$result = $conn->query($sql);

$orders = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
}

echo json_encode([
    'success' => true,
    'orders' => $orders
]);

$conn->close();
?>