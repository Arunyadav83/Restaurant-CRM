<?php
session_start();
$conn = new mysqli("localhost", "root", "", "arogya");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['reset_email'])) {
    header("Location: login.php");
    exit();
}

$new_password = trim($_POST['new_password']);
$confirm_password = trim($_POST['confirm_password']);

if ($new_password !== $confirm_password) {
    echo "<script>alert('Passwords do not match.'); window.history.back();</script>";
    exit();
}

$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
$email = $_SESSION['reset_email'];

$update = $conn->prepare("UPDATE admin SET password = ? WHERE email = ?");
$update->bind_param("ss", $hashed_password, $email);

if ($update->execute()) {
    unset($_SESSION['reset_email']);
    echo "<script>alert('Password updated successfully. Please login.'); window.location.href='login.php';</script>";
} else {
    echo "<script>alert('Error updating password.');</script>";
}

$conn->close();
?>
