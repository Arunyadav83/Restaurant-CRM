<?php
ob_start();
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// DB connection
$conn = new mysqli("localhost", "root", "", "arogya");
if ($conn->connect_error) die("DB Error: " . $conn->connect_error);

// Session check
if (!isset($_SESSION['id'])) {
    header("Location: page-login.php");
    exit();
}

$admin_id = $_SESSION['id'];

// Validate and sanitize input
$firstname = trim($_POST['firstname'] ?? '');
$lastname = trim($_POST['lastname'] ?? '');
$email = trim($_POST['email'] ?? '');
$gender = trim($_POST['gender'] ?? '');
$dob = trim($_POST['dob'] ?? '');
$phone = trim($_POST['phone'] ?? '');

// Validate required fields
if ($firstname && $lastname && $email) {
    $check = $conn->prepare("SELECT id FROM admin WHERE id = ?");
    $check->bind_param("i", $admin_id);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        // Update
        $update = $conn->prepare("UPDATE admin SET firstname=?, lastname=?, email=?, gender=?, dob=?, phone=? WHERE id=?");
        $update->bind_param("ssssssi", $firstname, $lastname, $email, $gender, $dob, $phone, $admin_id);

        if ($update->execute()) {
            header("Location: profile.php?success=1"); // or wherever your profile page is
            exit();
        } else {
            echo "Update failed: " . $conn->error;
        }
    } else {
        echo "Admin not found.";
    }
} else {
    echo "Please fill all required fields.";
}
?>
