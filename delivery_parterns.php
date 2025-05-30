<?php include 'include/header.php'; ?>
<?php include 'include/sidebar.php'; ?>

<?php
$mysqli = new mysqli("localhost", "root", "", "arogya");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$result = $mysqli->query("SELECT * FROM delivery_partners");
?>x



<style>
	.table-responsive {
		overflow-x: auto;
	}

	.rounded-circle {
		border: 1px solid #eee;
	}

	.d-flex a {
		margin-right: 5px;
	}

	.btn-xs {
		padding: 0.25rem 0.5rem;
		font-size: 0.75rem;
		line-height: 1.5;
		border-radius: 0.2rem;
	}

	.card-header {
		padding: 1rem 1.5rem;
		background-color: #fff;
		border-bottom: 1px solid rgba(0, 0, 0, .125);
	}

	.nav-tabs .nav-link {
		border: none;
		color: #495057;
		font-weight: 500;
	}

	.nav-tabs .nav-link.active {
		color: #7367F0;
		border-bottom: 2px solid #7367F0;
	}
</style>

<div class="content-body">
	<div class="container-fluid">
		<div class="row page-titles mx-0">
			<div class="col-sm-6 p-md-0">
				<div class="welcome-text">
					<h4>Delivery Partners</h4>
					<p class="mb-0">Manage all your delivery partners</p>
				</div>
			</div>
			<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#active">Active</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#inactive">Inactive</a>
					</li>
				</ul>
				<div class="ms-3">
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newOrderModal">
						<i class="fas fa-plus me-2"></i>Add New
					</button>
				</div>
			</div>
		</div>

		<!-- Add New Partner Modal -->
		<div class="modal fade" id="newOrderModal" tabindex="-1">
			<div class="modal-dialog">
				<form id="deliveryPartnerForm" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Delivery Partner</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<div class="mb-3">
								<label class="form-label">Partner Name</label>
								<input type="text" class="form-control" name="partner_name" required>
							</div>
							<div class="row">
								<div class="col-md-6 mb-3">
									<label class="form-label">Phone Number</label>
									<input type="tel" class="form-control" name="phone_number" pattern="[0-9]{10}" required>
								</div>
								<div class="col-md-6 mb-3">
									<label class="form-label">Bike Number</label>
									<input type="text" class="form-control" name="bike_number" required>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mb-3">
									<label class="form-label">Driving Licence</label>
									<input type="text" class="form-control" name="licence_number" required>
								</div>
								<div class="col-md-6 mb-3">
									<label class="form-label">Email</label>
									<input type="email" class="form-control" name="email" required>
								</div>
								<div class="col-md-6 mb-3">
									<label class="form-label">password</label>
									<input type="password" class="form-control" name="password" required>
								</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Address</label>
								<textarea class="form-control" name="address" rows="2" required></textarea>
							</div>
							<div class="mb-3">
								<label class="form-label">Profile Image</label>
								<input type="file" class="form-control" name="partner_image" accept="image/*" required>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save Partner</button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example3" class="display table" style="min-width: 845px">
								<thead>
									<tr>
										<th>Image</th>
										<th>Partner Name</th>
										<th>Phone</th>
										<th>Bike Number</th>
										<th>Licence</th>
										<th>Email</th>
										<th>Address</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody>
									<?php
									while ($row = $result->fetch_assoc()):
										// Construct the image path - prepend 'uploads/' if it's not already in the path
										$imagePath = !empty($row['image_path']) ?
											(strpos($row['image_path'], 'uploads/') === 0 ? $row['image_path'] : 'uploads/' . $row['image_path']) :
											'uploads/default.png';

										// Ensure the path doesn't have double slashes
										$imagePath = str_replace('//', '/', $imagePath);
									?>
										<tr id="partner-row-<?= $row['id'] ?>">
											<td>
												<img src="<?= htmlspecialchars($imagePath) ?>"
													alt="<?= htmlspecialchars($row['partner_name'] ?? 'Delivery Partner') ?>"
													class="rounded-circle"
													width="50" height="50"
													style="object-fit: cover; border: 1px solid #eee;">
											</td>
											<td><?= htmlspecialchars($row['partner_name'] ?? '') ?></td>
											<td><a href="tel:<?= htmlspecialchars($row['phone_number'] ?? '') ?>"><strong><?= htmlspecialchars($row['phone_number'] ?? '') ?></strong></a></td>
											<td><?= htmlspecialchars($row['bike_number'] ?? '') ?></td>
											<td><?= htmlspecialchars($row['licence_number'] ?? '') ?></td>
											<td><a href="mailto:<?= htmlspecialchars($row['email'] ?? '') ?>"><strong><?= htmlspecialchars($row['email'] ?? '') ?></strong></a></td>
											<td><?= htmlspecialchars(substr($row['address'] ?? '', 0, 20)) ?>...</td>
											<td>
												<div class="d-flex">
													<a href="edit_partner.php?id=<?= $row['id'] ?>" class="btn btn-primary shadow btn-xs sharp me-1">
														<i class="fas fa-pencil-alt"></i>
													</a>
													<a href="javascript:void(0);"
														class="btn btn-danger shadow btn-xs sharp"
														onclick="deletePartner(<?= $row['id'] ?>)">
														<i class="fa fa-trash"></i>
													</a>
												</div>
											</td>
										</tr>
									<?php endwhile; ?>
								</tbody>

							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Load Libraries First -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
	function deletePartner(id) {
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#7367F0',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.isConfirmed) {
				fetch('delete_partner.php?id=' + id)
					.then(response => response.json())
					.then(data => {
						if (data.success) {
							// Show SweetAlert toast at top-right
							Swal.fire({
								toast: true,
								position: 'top-end',
								icon: 'success',
								title: data.message,
								showConfirmButton: false,
								timer: 2000
							});

							// Remove row from DOM
							const row = document.getElementById('partner-row-' + id);
							if (row) row.remove();

						} else {
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: data.message
							});
						}
					})
					.catch(error => {
						console.error(error);
						Swal.fire({
							icon: 'error',
							title: 'Error!',
							text: 'An error occurred while deleting the partner.'
						});
					});
			}
		});
	}
</script>


<script>
	document.getElementById('deliveryPartnerForm').addEventListener('submit', function(e) {
		e.preventDefault();

		const form = e.target;
		const formData = new FormData(form);

		fetch('add_partner.php', {
				method: 'POST',
				body: formData
			})
			.then(response => response.text())
			.then(data => {
				console.log("Server Response: ", data); // For debugging

				if (data.includes("successfully")) {
					Swal.fire({
						icon: 'success',
						title: 'Success',
						text: 'Delivery partner added successfully!',
					});
					form.reset();
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: data, // Shows the error from PHP
					});
				}
			})
			.catch(error => {
				console.error('Error:', error);
				Swal.fire({
					icon: 'error',
					title: 'Request Failed',
					text: 'Could not send request to server.',
				});
			});
	});
</script>

<?php include 'include/footer.php'; ?>