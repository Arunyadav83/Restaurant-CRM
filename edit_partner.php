<?php
ob_start();
session_start();
include 'include/header.php';

// Establish database connection
$mysqli = new mysqli("localhost", "root", "", "arogya");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$id = $_GET['id'] ?? 0;
$partner = [];

// Fetch partner details if ID is provided
if ($id) {
    $stmt = $mysqli->prepare("SELECT * FROM delivery_partners WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $partner = $result->fetch_assoc();
    $stmt->close();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $update_data = [
        'partner_name' => $_POST['partner_name'],
        'phone_number' => $_POST['phone_number'],
        'bike_number' => $_POST['bike_number'],
        'licence_number' => $_POST['licence_number'],
        'address' => $_POST['address'],
        'email' => $_POST['email']
    ];

    // Handle file upload if a new image is provided
    if (!empty($_FILES["partner_image"]["name"])) {
        $target_dir = "uploads/";
        $file_name = basename($_FILES["partner_image"]["name"]);
        $target_file = $target_dir . uniqid() . "_" . $file_name;

        if (move_uploaded_file($_FILES["partner_image"]["tmp_name"], $target_file)) {
            // Delete old image if it exists
            if (!empty($partner['partner_image']) && file_exists($partner['partner_image'])) {
                unlink($partner['partner_image']);
            }
            $update_data['partner_image'] = $target_file;
        }
    }

    // Prepare update query
    $query = "UPDATE delivery_partners SET ";
    $types = "";
    $params = [];

    foreach ($update_data as $field => $value) {
        $query .= "$field = ?, ";
        $types .= is_int($value) ? "i" : "s";
        $params[] = $value;
    }

    $query = rtrim($query, ", ") . " WHERE id = ?";
    $types .= "i";
    $params[] = $id;

    // Execute update query
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param($types, ...$params);

    if ($stmt->execute()) {
        // Redirect after successful update
        header("Location: delivery_parterns.php");
        exit;
    } else {
        echo "<script>Swal.fire('Error', 'Error updating partner: " . $stmt->error . "', 'error');</script>";
    }

    $stmt->close();
}
?>

<!-- HTML form for editing partner details -->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Edit Delivery Partner</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Partner Name</label>
                                    <input type="text" class="form-control" name="partner_name" value="<?= htmlspecialchars($partner['partner_name'] ?? '') ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" name="phone_number" value="<?= htmlspecialchars($partner['phone_number'] ?? '') ?>" pattern="[0-9]{10}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Bike Number</label>
                                    <input type="text" class="form-control" name="bike_number" value="<?= htmlspecialchars($partner['bike_number'] ?? '') ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Driving Licence</label>
                                    <input type="text" class="form-control" name="licence_number" value="<?= htmlspecialchars($partner['licence_number'] ?? '') ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($partner['email'] ?? '') ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Profile Image</label>
                                    <input type="file" class="form-control" name="partner_image" accept="image/*">
                                    <?php if (!empty($partner['partner_image'])): ?>
                                        <small class="text-muted">Current: <?= basename($partner['partner_image']) ?></small>
                                        <img src="<?= $partner['partner_image'] ?>" width="50" class="d-block mt-2">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <textarea class="form-control" name="address" rows="3" required><?= htmlspecialchars($partner['address'] ?? '') ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Partner</button>
                            <a href="delivery_partners.php" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>
