<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'arogya';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_GET['id'] ?? 0;
    
    if (!$id) {
        throw new Exception("Invalid menu item ID");
    }

    // Get menu item details
    $stmt = $pdo->prepare("
        SELECT m.*, c.name AS category_name 
        FROM menu_items m
        LEFT JOIN menu_categories c ON m.category_id = c.id
        WHERE m.id = ?
    ");
    $stmt->execute([$id]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$item) {
        throw new Exception("Menu item not found");
    }

    echo json_encode([
        'success' => true,
        'item' => $item
    ]);

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}