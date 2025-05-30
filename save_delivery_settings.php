<?php
// include 'db_connection.php'; // include your DB connection file
$conn = new mysqli("localhost", "root", "", "arogya");
if ($conn->connect_error) die("DB Error: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $min_km = floatval($_POST['min_km']);
    $max_km = floatval($_POST['max_km']);
    $delivery_fee = floatval($_POST['delivery_fee']);
    $auto_assign = isset($_POST['auto_assign']) ? 1 : 0;

    $stmt = $conn->prepare("SELECT id FROM delivery_settings WHERE min_km = ? AND max_km = ?");
    $stmt->bind_param("dd", $min_km, $max_km);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // update
        $update = $conn->prepare("UPDATE delivery_settings SET delivery_fee = ?, auto_assign = ? WHERE min_km = ? AND max_km = ?");
        $update->bind_param("dddd", $delivery_fee, $auto_assign, $min_km, $max_km);
        $update->execute();
        echo "Delivery setting updated successfully.";
    } else {
        // insert
        $insert = $conn->prepare("INSERT INTO delivery_settings (min_km, max_km, delivery_fee, auto_assign) VALUES (?, ?, ?, ?)");
        $insert->bind_param("dddi", $min_km, $max_km, $delivery_fee, $auto_assign);
        $insert->execute();
        echo "Delivery setting added successfully.";
    }

    $conn->close();
}
?>
