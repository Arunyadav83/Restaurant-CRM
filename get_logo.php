<?php
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'arogya';

// Create connection
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
 // Include your database connection file

$logoPath = 'uploads/default_logo.png'; // fallback logo

$query = "SELECT logo FROM settings LIMIT 1";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (!empty($row['logo'])) {
        $logoPath = $row['logo'];
    }
}

echo htmlspecialchars($logoPath);
?>