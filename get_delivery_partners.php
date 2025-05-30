<?php
header('Content-Type: application/json');

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
    $result = $conn->query("SELECT id, partner_name, phone_number FROM delivery_partners WHERE active = 1");

    $partners = [];
    while ($row = $result->fetch_assoc()) {
        $partners[] = $row;
    }

    echo json_encode([
        'success' => true,
        'partners' => $partners
    ]);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Database error: ' . $e->getMessage()
    ]);
}
?>
