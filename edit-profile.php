<?php 
ob_start(); 
session_start(); 
include 'include/header.php'; 
include 'include/sidebar.php'; 

$conn = new mysqli("localhost", "root", "", "arogya");
if ($conn->connect_error) {
    die("DB Error: " . $conn->connect_error);
}

// Check if session ID exists and is numeric
if (!isset($_SESSION['id']) || !is_numeric($_SESSION['id'])) {
    header("Location: page-login.php");
    exit();
}

$admin_id = intval($_SESSION['id']);

$admin = null;
$sql = "SELECT * FROM admin WHERE id = ?";
$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("i", $admin_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $admin = $result->fetch_assoc();
    }
    $stmt->close();
}
?>

<div class="content-body">
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4">
				<div class="clearfix">
					<div class="card card-bx profile-card author-profile m-b30">
						<div class="card-body">
							<div class="p-5">
								<div class="author-profile">
									<div class="author-media">
										<img src="images/user.jpg" alt="Profile">
										<div class="upload-link" data-toggle="tooltip" data-placement="right" title="Update">
											<input type="file" class="update-flie">
											<i class="fa fa-camera"></i>
										</div>
									</div>
									<div class="author-info">
										<h6 class="title">Sri Arogya Hotel</h6>
										<span>Superadmin</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-9 col-lg-8">
				<div class="card profile-card card-bx m-b30">
					<div class="card-header">
						<h3 class="h-title">Profile</h3>
					</div>

					<form method="POST" action="save_profile.php" class="profile-form">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-6 m-b30">
									<label class="form-label">Firstname</label>
									<input type="text" name="firstname" class="form-control" value="<?= htmlspecialchars($admin['firstname'] ?? '') ?>" placeholder="Enter your Firstname">
								</div>
								<div class="col-sm-6 m-b30">
									<label class="form-label">Lastname</label>
									<input type="text" name="lastname" class="form-control" value="<?= htmlspecialchars($admin['lastname'] ?? '') ?>" placeholder="Enter your Lastname">
								</div>
								<div class="col-sm-6 m-b30">
									<label class="form-label">Email</label>
									<input type="email" name="email" class="form-control" value="<?= htmlspecialchars($admin['email'] ?? '') ?>" placeholder="Enter your Email">
								</div>
								<div class="col-sm-6 m-b30">
									<label class="form-label">Gender</label>
									<select name="gender" class="default-select form-control">
										<option value="">Please select</option>
										<option value="Male" <?= (isset($admin['gender']) && $admin['gender'] === 'Male') ? 'selected' : '' ?>>Male</option>
										<option value="Female" <?= (isset($admin['gender']) && $admin['gender'] === 'Female') ? 'selected' : '' ?>>Female</option>
										<option value="Other" <?= (isset($admin['gender']) && $admin['gender'] === 'Other') ? 'selected' : '' ?>>Other</option>
									</select>
								</div>
								<div class="col-sm-6 m-b30">
									<label class="form-label">DOB</label>
									<input type="date" name="dob" class="form-control" value="<?= htmlspecialchars($admin['dob'] ?? '') ?>">
								</div>
								<div class="col-sm-6 m-b30">
									<label class="form-label">Phone</label>
									<input type="number" name="phone" class="form-control" value="<?= htmlspecialchars($admin['phone'] ?? '') ?>" placeholder="Enter your Number">
								</div>
							</div>
							<button type="submit" class="btn me-2 btn-primary"><?= $admin ? 'Update' : 'Submit' ?></button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'include/footer.php'; ?>
