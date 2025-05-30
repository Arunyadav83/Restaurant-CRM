<?php include 'include/header.php'; ?>
<?php include 'include/sidebar.php'; ?>

<?php
session_start();

// 1) Connect
$conn = new mysqli("localhost", "root", "", "arogya");
if ($conn->connect_error) die("DB Error: " . $conn->connect_error);

// 2) Handle POST (insert or update)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect & sanitize
    $email    = trim($_POST['email']    ?? '');
    $address  = trim($_POST['address']  ?? '');
    $plain_pw = trim($_POST['password'] ?? '');

    // Hash the password
    $hashed   = password_hash($plain_pw, PASSWORD_DEFAULT);

    // File uploads
    $logoPath    = '';
    $faviconPath = '';

    // Ensure uploads directory exists
    if (!is_dir('uploads')) mkdir('uploads', 0755);

    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $logoPath = 'uploads/' . basename($_FILES['logo']['name']);
        move_uploaded_file($_FILES['logo']['tmp_name'], $logoPath);
    }
    if (isset($_FILES['favicon']) && $_FILES['favicon']['error'] === UPLOAD_ERR_OK) {
        $faviconPath = 'uploads/' . basename($_FILES['favicon']['name']);
        move_uploaded_file($_FILES['favicon']['tmp_name'], $faviconPath);
    }

    // Check if row exists
    $r = $conn->query("SELECT id,logo,favicon FROM settings LIMIT 1");
    if ($r->num_rows) {
        // fetch existing paths so we don't overwrite with blank
        $old = $r->fetch_assoc();
        if ($logoPath === '') $logoPath    = $old['logo'];
        if ($faviconPath === '') $faviconPath = $old['favicon'];

        // Update
        $upd = $conn->prepare("
        UPDATE settings
           SET logo    = ?,
               email   = ?,
               favicon = ?,
               password= ?,
               address = ?
         WHERE id=?
      ");
        $upd->bind_param(
            "sssssi",
            $logoPath,
            $email,
            $faviconPath,
            $hashed,
            $address,
            $old['id']
        );
        $upd->execute();
        $upd->close();
        $msg = "Settings updated.";
    } else {
        // Insert
        $ins = $conn->prepare("
        INSERT INTO settings
          (logo,email,favicon,password,address)
        VALUES(?,?,?,?,?)
      ");
        $ins->bind_param(
            "sssss",
            $logoPath,
            $email,
            $faviconPath,
            $hashed,
            $address
        );
        $ins->execute();
        $ins->close();
        $msg = "Settings saved.";
    }
}

// 3) Fetch current settings to prefill form
$row = $conn->query("SELECT * FROM settings LIMIT 1")
    ->fetch_assoc() ?: [];

$conn->close();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize input
    $min_km = floatval($_POST['min_km']);
    $max_km = floatval($_POST['max_km']);
    $delivery_fee = floatval($_POST['delivery_fee']);
    $auto_assign = isset($_POST['auto_assign']) ? 1 : 0;

    // Check for existing setting
    $stmt = $conn->prepare("SELECT id FROM delivery_settings WHERE min_km = ? AND max_km = ?");
    $stmt->bind_param("dd", $min_km, $max_km);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Update record
        $update = $conn->prepare("UPDATE delivery_settings SET delivery_fee = ?, auto_assign = ? WHERE min_km = ? AND max_km = ?");
        $update->bind_param("dddd", $delivery_fee, $auto_assign, $min_km, $max_km);
        $update->execute();
        echo "Delivery setting updated successfully.";
    } else {
        // Insert new
        $insert = $conn->prepare("INSERT INTO delivery_settings (min_km, max_km, delivery_fee, auto_assign) VALUES (?, ?, ?, ?)");
        $insert->bind_param("dddi", $min_km, $max_km, $delivery_fee, $auto_assign);
        $insert->execute();
        echo "Delivery setting added successfully.";
    }
}




?>


<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container">



        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>General Settings</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST"
                            enctype="multipart/form-data"
                            class="needs-validation" novalidate>

                            <!-- Logo -->
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Logo *</label>
                                <div class="col-sm-10">
                                    <?php if (!empty($row['logo'])): ?>
                                        <img src="<?php echo htmlspecialchars($row['logo']); ?>" height="50"><br>
                                    <?php endif; ?>
                                    <input type="file"
                                        name="logo"
                                        class="form-control"
                                        <?php echo empty($row) ? 'required' : ''; ?>>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Email *</label>
                                <div class="col-sm-10">
                                    <input type="email"
                                        name="email"
                                        class="form-control"
                                        value="<?php echo htmlspecialchars($row['email'] ?? ''); ?>"
                                        required>
                                </div>
                            </div>

                            <!-- Favicon -->
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Favicon *</label>
                                <div class="col-sm-10">
                                    <?php if (!empty($row['favicon'])): ?>
                                        <img src="<?php echo htmlspecialchars($row['favicon']); ?>" height="30"><br>
                                    <?php endif; ?>
                                    <input type="file"
                                        name="favicon"
                                        class="form-control"
                                        <?php echo empty($row) ? 'required' : ''; ?>>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Password *</label>
                                <div class="col-sm-10">
                                    <input type="password"
                                        name="password"
                                        class="form-control"
                                        required>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Address *</label>
                                <div class="col-sm-10">
                                    <textarea name="address"
                                        class="form-control"
                                        rows="4"
                                        required><?php echo htmlspecialchars($row['address'] ?? ''); ?></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Delivary Settings</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="save_delivery_settings.php" method="POST" enctype="multipart/form-data" novalidate>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label">Min Delivery Distance (km)<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="number" name="min_km" class="form-control" placeholder="Min Delivery Distance (km).." required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label">Max Delivery Distance (km)<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="number" name="max_km" class="form-control" placeholder="Max Delivery Distance (km).." required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label">Delivery Fee (₹)<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="number" name="delivery_fee" class="form-control" placeholder="Delivery Fee (₹).." required>
                                    </div>
                                </div>

                                <div class="form-check form-switch mx-3">
                                    <input class="form-check-input" type="checkbox" name="auto_assign" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Auto-assign delivery partners</label>
                                </div>

                                <button type="submit" class="btn me-2 btn-primary">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Notification Settings</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form class="form-valide-with-icon needs-validation" novalidate>
                                <!-- <h3 class="h-title mb-0 me-4">Customer Map</h3> -->
                                <div class="form-check form-switch mx-3">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Email notifications</label>
                                </div>
                                <!-- <h3 class="h-title mb-0 me-4">Customer Map</h3> -->
                                <div class="form-check form-switch mx-3">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">SMS notifications</label>
                                </div>
                                <!-- <h3 class="h-title mb-0 me-4">Customer Map</h3> -->
                                <div class="form-check form-switch mx-3">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">
                                        WhatsApp notifications</label>
                                </div>
                                <div class="form-check form-switch mx-3">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">
                                        Play sound for new orders</label>
                                </div>
                                <!-- <div class="mb-3">
                                            <div class="form-check">
											  <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
											  <label class="form-check-label" for="invalidCheck2">
												Check Me out
											  </label>
											</div>
                                        </div> -->
                                <button type="submit" class="btn me-2 btn-primary">Submit</button>
                                <button type="submit" class="btn btn-danger light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->


<?php include 'include/footer.php'; ?>