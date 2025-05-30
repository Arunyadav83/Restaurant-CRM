<?php
header('Content-Type: application/json');
ini_set('display_errors', 0);
error_reporting(0);

// Database configuration
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'arogya';

// Create connection
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed']));
}

try {
    // Fetch recent customers (last 6 added)
    $sql = "SELECT id, full_name, mobile, email, address, profile_image 
            FROM customers 
            ORDER BY created_at DESC 
            LIMIT 6";
    
    $result = $conn->query($sql);
    
    if (!$result) {
        throw new Exception('Query failed: ' . $conn->error);
    }
    
    $customers = [];
    while ($row = $result->fetch_assoc()) {
        // Set default image if none exists
        $row['profile_image'] = $row['profile_image'] ?: 'images/coustomer-img/default.jpg';
        $customers[] = $row;
    }
    
    echo json_encode([
        'success' => true,
        'customers' => $customers
    ]);
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
} finally {
    $conn->close();
}
?>