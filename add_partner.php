<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "arogya";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Validate required fields
if (
    empty($_POST['partner_name']) ||
    empty($_POST['phone_number']) ||
    empty($_POST['bike_number']) ||
    empty($_POST['licence_number']) ||
    empty($_FILES['partner_image']) ||
    empty($_POST['email']) ||
    empty($_POST['address']) ||
    empty($_POST['password']) // Check password
) {
    echo "All fields are required.";
    exit();
}

// Hash the password securely
$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Handle image upload
$targetDir = "uploads/";
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0755, true); // Create directory if it doesn't exist
}

$imageName = basename($_FILES["partner_image"]["name"]);
$targetFile = $targetDir . time() . "_" . $imageName;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Validate image type
$allowed = ["jpg", "jpeg", "png", "gif"];
if (!in_array($imageFileType, $allowed)) {
    echo "Only JPG, JPEG, PNG & GIF files are allowed.";
    exit();
}

if (move_uploaded_file($_FILES["partner_image"]["tmp_name"], $targetFile)) {
    // Insert into database with password
    $stmt = $conn->prepare("INSERT INTO delivery_partners (partner_name, phone_number, bike_number, licence_number, image_path, email, address, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "ssssssss",
        $_POST['partner_name'],
        $_POST['phone_number'],
        $_POST['bike_number'],
        $_POST['licence_number'],
        $targetFile,
        $_POST['email'],
        $_POST['address'],
        $hashedPassword
    );

    if ($stmt->execute()) {
        echo "Delivery partner added successfully.";
    } else {
        echo "Error saving to database.";
    }

    $stmt->close();
} else {
    echo "Error uploading image.";
}

$conn->close();
?>

