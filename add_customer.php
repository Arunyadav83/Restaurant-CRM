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

// Initialize response
$response = ['success' => false, 'message' => ''];

try {
    // Validate required fields
    $requiredFields = ['full_name', 'mobile'];
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            throw new Exception("$field is required");
        }
    }

    // Sanitize inputs
    $fullName = trim($conn->real_escape_string($_POST['full_name']));
    $mobile = trim($conn->real_escape_string($_POST['mobile']));
    $email = isset($_POST['email']) ? trim($conn->real_escape_string($_POST['email'])) : null;
    $address = isset($_POST['address']) ? trim($conn->real_escape_string($_POST['address'])) : null;
    $initialBalance = isset($_POST['initial_balance']) ? floatval($_POST['initial_balance']) : 0;

    // Validate mobile number
    if (!preg_match('/^[0-9]{10,15}$/', $mobile)) {
        throw new Exception("Invalid mobile number format");
    }

    // Check if mobile already exists
    $checkStmt = $conn->prepare("SELECT id FROM customers WHERE mobile = ?");
    $checkStmt->bind_param("s", $mobile);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();
    
    if ($checkResult->num_rows > 0) {
        throw new Exception("Customer with this mobile number already exists");
    }
    $checkStmt->close();

    // Handle file upload
    $profileImagePath = null;
    if (!empty($_FILES['profile_image']['name'])) {
        $targetDir = "uploads/customers/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Generate unique filename
        $fileExt = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);
        $fileName = uniqid() . '.' . $fileExt;
        $targetFile = $targetDir . $fileName;

        // Check if image file is a actual image
        $check = getimagesize($_FILES['profile_image']['tmp_name']);
        if ($check === false) {
            throw new Exception("File is not an image");
        }

        // Check file size (5MB max)
        if ($_FILES['profile_image']['size'] > 5000000) {
            throw new Exception("Image size should be less than 5MB");
        }

        // Allow certain file formats
        $allowedExts = ["jpg", "jpeg", "png", "gif"];
        if (!in_array(strtolower($fileExt), $allowedExts)) {
            throw new Exception("Only JPG, JPEG, PNG & GIF files are allowed");
        }

        // Upload file
        if (!move_uploaded_file($_FILES['profile_image']['tmp_name'], $targetFile)) {
            throw new Exception("Error uploading image");
        }

        $profileImagePath = $targetFile;
    }

    // Insert customer into database
    $stmt = $conn->prepare("
        INSERT INTO customers 
        (full_name, mobile, email, address, profile_image, initial_balance, created_at) 
        VALUES (?, ?, ?, ?, ?, ?, NOW())
    ");
    $stmt->bind_param(
        "sssssd", 
        $fullName, 
        $mobile, 
        $email, 
        $address, 
        $profileImagePath, 
        $initialBalance
    );

    if (!$stmt->execute()) {
        throw new Exception("Failed to save customer: " . $stmt->error);
    }

    $response = [
        'success' => true,
        'message' => 'Customer added successfully!',
        'customer_id' => $stmt->insert_id
    ];

} catch (Exception $e) {
    $response['message'] = $e->getMessage();
} finally {
    if (isset($stmt)) $stmt->close();
    $conn->close();
    echo json_encode($response);
}
?>