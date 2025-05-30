<?php
header('Content-Type: application/json');
$host = 'localhost';
$dbname = 'arogya';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the ID from the POST data
    $id = $_POST['id'] ?? 0;
    
    if (!$id) {
        throw new Exception("Invalid menu item ID");
    }

    // Validate required fields
    $required = ['item_name', 'price', 'category_id'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            throw new Exception("Field $field is required");
        }
    }

    // Handle file upload if present
    $imagePath = null;
    if (!empty($_FILES['item_image']['name'])) {
        $targetDir = "uploads/menu_items/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        
        $fileName = uniqid() . '_' . basename($_FILES['item_image']['name']);
        $targetFile = $targetDir . $fileName;
        
        // Check if image file is a actual image
        $check = getimagesize($_FILES['item_image']['tmp_name']);
        if ($check === false) {
            throw new Exception("File is not an image");
        }
        
        // Check file size (5MB max)
        if ($_FILES['item_image']['size'] > 5000000) {
            throw new Exception("File is too large (max 5MB)");
        }
        
        // Allow certain file formats
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            throw new Exception("Only JPG, JPEG, PNG & GIF files are allowed");
        }
        
        if (move_uploaded_file($_FILES['item_image']['tmp_name'], $targetFile)) {
            $imagePath = $targetFile;
            
            // Delete old image if it exists
            $stmt = $pdo->prepare("SELECT image_path FROM menu_items WHERE id = ?");
            $stmt->execute([$id]);
            $oldImage = $stmt->fetchColumn();
            if ($oldImage && file_exists($oldImage)) {
                unlink($oldImage);
            }
        } else {
            throw new Exception("Error uploading file");
        }
    }

    // Prepare update statement
    $updateFields = [
        'item_name' => $_POST['item_name'],
        'sub_item' => $_POST['sub_item'] ?? null,
        'price' => $_POST['price'],
        'category_id' => $_POST['category_id'],
        'updated_at' => date('Y-m-d H:i:s')
    ];
    
    if ($imagePath) {
        $updateFields['image_path'] = $imagePath;
    }

    $setParts = [];
    $params = [];
    foreach ($updateFields as $field => $value) {
        $setParts[] = "$field = ?";
        $params[] = $value;
    }
    $params[] = $id;

    $sql = "UPDATE menu_items SET " . implode(', ', $setParts) . " WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    if ($stmt->rowCount() === 0) {
        throw new Exception("No changes made or menu item not found");
    }

    echo json_encode([
        'success' => true,
        'message' => 'Menu item updated successfully'
    ]);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?>