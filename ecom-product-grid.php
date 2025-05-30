<?php include 'include/header.php'; ?>
<?php include 'include/sidebar.php'; ?>

<!-- Add SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


<style>
	/* Replace your existing card CSS with this perfect solution */

	/* Force consistent grid layout */
	#menuItemsContainer .row {
		display: flex;
		flex-wrap: wrap;
		margin-right: -15px;
		margin-left: -15px;
	}

	/* Fixed column widths - this is crucial */
	#menuItemsContainer .col-xl-3,
	#menuItemsContainer .col-lg-4,
	#menuItemsContainer .col-md-6,
	#menuItemsContainer .col-sm-6 {
		padding-right: 15px;
		padding-left: 15px;
		flex: 0 0 auto;
		width: 100%;
		min-height: 420px;
		/* Force minimum height for entire column */
	}

	/* Responsive column widths - FIXED */
	@media (min-width: 576px) {
		#menuItemsContainer .col-sm-6 {
			flex: 0 0 50% !important;
			max-width: 50% !important;
			width: 50% !important;
		}
	}

	@media (min-width: 768px) {
		#menuItemsContainer .col-md-6 {
			flex: 0 0 50% !important;
			max-width: 50% !important;
			width: 50% !important;
		}
	}

	@media (min-width: 992px) {
		#menuItemsContainer .col-lg-4 {
			flex: 0 0 33.333333% !important;
			max-width: 33.333333% !important;
			width: 33.333333% !important;
		}
	}

	@media (min-width: 1200px) {
		#menuItemsContainer .col-xl-3 {
			flex: 0 0 25% !important;
			max-width: 25% !important;
			width: 25% !important;
		}
	}

	/* PERFECT CARD SIZING - This is the key */
	#menuItemsContainer .card {
		height: 400px !important;
		min-height: 400px !important;
		max-height: 400px !important;
		width: 100% !important;
		display: flex !important;
		flex-direction: column !important;
		transition: transform 0.3s ease;
		box-sizing: border-box;
	}

	#menuItemsContainer .card:hover {
		transform: translateY(-5px);
		box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
	}

	/* Card body - fixed structure */
	#menuItemsContainer .card-body {
		flex: 1 !important;
		display: flex !important;
		flex-direction: column !important;
		padding: 15px !important;
		height: 100% !important;
	}

	/* Product container - fixed layout */
	#menuItemsContainer .new-arrival-product {
		flex: 1 !important;
		display: flex !important;
		flex-direction: column !important;
		height: 100% !important;
	}

	/* Image container - FIXED HEIGHT */
	#menuItemsContainer .new-arrivals-img-contnent {
		flex: 0 0 180px !important;
		height: 180px !important;
		overflow: hidden !important;
		width: 100% !important;
	}

	#menuItemsContainer .new-arrivals-img-contnent img {
		width: 100% !important;
		height: 180px !important;
		object-fit: cover !important;
		border-radius: 5px 5px 0 0 !important;
	}

	/* Content area - takes remaining space */
	#menuItemsContainer .new-arrival-content {
		flex: 1 !important;
		display: flex !important;
		flex-direction: column !important;
		justify-content: space-between !important;
		padding: 15px 0 !important;
		text-align: center !important;
		height: calc(100% - 180px) !important;
		/* Remaining height after image */
	}

	/* Title - fixed height to prevent layout shifts */
	#menuItemsContainer .new-arrival-content h4 {
		font-size: 1.1rem !important;
		margin-bottom: 8px !important;
		line-height: 1.3 !important;
		height: 2.6em !important;
		/* Fixed height for 2 lines */
		overflow: hidden !important;
		display: -webkit-box !important;
		-webkit-line-clamp: 2 !important;
		-webkit-box-orient: vertical !important;
		text-overflow: ellipsis !important;
	}

	/* Description - fixed height */
	#menuItemsContainer .new-arrival-content span:not(.price):not(.badge) {
		font-size: 0.9rem !important;
		color: #666 !important;
		margin-bottom: 10px !important;
		height: 3em !important;
		/* Fixed height */
		overflow: hidden !important;
		display: -webkit-box !important;
		-webkit-line-clamp: 2 !important;
		-webkit-box-orient: vertical !important;
		line-height: 1.5 !important;
		text-overflow: ellipsis !important;
	}

	/* Price - consistent spacing */
	#menuItemsContainer .new-arrival-content .price {
		font-weight: bold !important;
		color: #2ecc71 !important;
		font-size: 1.2rem !important;
		margin: 10px 0 !important;
		flex: 0 0 auto !important;
	}

	/* Add to your existing styles */
#imagePreviewContainer {
    border: 1px dashed #ddd;
    padding: 10px;
    border-radius: 5px;
    background-color: #f9f9f9;
}

#imagePreview {
    max-width: 100%;
    height: auto;
    margin: 0 auto;
    display: block;
}

#noImageText {
    padding: 20px;
    text-align: center;
}

	/* Badge - consistent positioning */
	#menuItemsContainer .new-arrival-content .badge {
		margin-top: auto !important;
		align-self: center !important;
		white-space: nowrap !important;
		overflow: hidden !important;
		text-overflow: ellipsis !important;
		max-width: 100% !important;
		flex: 0 0 auto !important;
	}

	/* Prevent any layout shifts */
	#menuItemsContainer .mb-4 {
		margin-bottom: 1.5rem !important;
	}

	/* Container fixes */
	#menuItemsContainer {
		width: 100% !important;
	}

	/* Additional fixes for responsive behavior */
	@media (max-width: 1199px) {
		#menuItemsContainer .card {
			height: 380px !important;
			min-height: 380px !important;
			max-height: 380px !important;
		}

		#menuItemsContainer .new-arrivals-img-contnent {
			flex: 0 0 160px !important;
			height: 160px !important;
		}

		#menuItemsContainer .new-arrivals-img-contnent img {
			height: 160px !important;
		}

		#menuItemsContainer .new-arrival-content {
			height: calc(100% - 160px) !important;
		}
	}

	@media (max-width: 991px) {
		#menuItemsContainer .card {
			height: 360px !important;
			min-height: 360px !important;
			max-height: 360px !important;
		}

		#menuItemsContainer .new-arrivals-img-contnent {
			flex: 0 0 150px !important;
			height: 150px !important;
		}

		#menuItemsContainer .new-arrivals-img-contnent img {
			height: 150px !important;
		}

		#menuItemsContainer .new-arrival-content {
			height: calc(100% - 150px) !important;
		}
	}

	@media (max-width: 767px) {
		#menuItemsContainer .card {
			height: 340px !important;
			min-height: 340px !important;
			max-height: 340px !important;
		}
	}

	/* Force consistent spacing */
	.card-body {
		flex-direction: column !important;
		display: flex !important;
		gap: 0 !important;
		/* Remove gap to maintain consistent spacing */
	}
</style>
<!--**********************************
    Content body start
***********************************-->

<div class="content-body">
	<div class="container mh-auto">
		<div class="d-flex justify-content-between align-items-center mb-3">
			<a href="javascript:void(0)" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#newOrderModal">
				+ New Menu
			</a>

			<div class="btn-group" role="group" aria-label="View toggle">
				<button class="btn btn-outline-secondary active" id="gridViewBtn">
					<i class="fa-solid fa-th"></i> Grid
				</button>
				<button class="btn btn-outline-secondary" id="listViewBtn">
					<i class="fa-solid fa-bars"></i> List
				</button>
			</div>
		</div>

		<!-- New Menu Modal -->
		<div class="modal fade" id="newOrderModal" tabindex="-1" aria-labelledby="newOrderModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<form id="menuItemForm" enctype="multipart/form-data">
						<input type="hidden" name="item_id" id="itemId" value="">
						<div class="modal-header">
							<h5 class="modal-title" id="newOrderModalLabel">New Menu</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>

						<div class="modal-body">
							<!-- Image Preview Section -->
							<div class="mb-3 text-center" id="imagePreviewContainer">
								<img id="imagePreview" src="" alt="Current Image" class="img-thumbnail mb-2" style="max-height: 200px; display: none;">
								<div id="noImageText" class="text-muted">No image selected</div>
							</div>

							<div class="mb-3">
								<label for="itemImage" class="form-label">Image</label>
								<input type="file" class="form-control" name="item_image" id="itemImage" accept="image/*">
							</div>

							<div class="mb-3">
								<label for="itemName" class="form-label">Item Name*</label>
								<input type="text" class="form-control" name="item_name" id="itemName" placeholder="Enter item name" required>
							</div>

							<div class="mb-3">
								<label for="subItem" class="form-label">Sub Item/Description</label>
								<input type="text" class="form-control" name="sub_item" id="subItem" placeholder="Enter sub item">
							</div>

							<div class="mb-3">
								<label for="price" class="form-label">Price*</label>
								<input type="number" step="0.01" class="form-control" name="price" id="price" placeholder="Enter price" required>
							</div>

							<div class="mb-3">
								<label for="category" class="form-label">Category*</label>
								<select class="form-select" name="category_id" id="category" required>
									<option value="">Select Category</option>
									<!-- Categories will be loaded via JavaScript -->
								</select>
							</div>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Grid View Section -->
		<div id="gridView">
			<div id="menuItemsContainer" class="container-fluid" style="display:flex">
				<!-- Menu items will be injected here -->
			</div>
		</div>

		<!-- List View Section -->
		<div id="listView" class="d-none">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table id="example3" class="display table" style="min-width: 845px">
									<thead>
										<tr>
											<th>Id</th>
											<th>Image</th>
											<th>Item Name</th>
											<th>Sub Item</th>
											<th>Price</th>
											<th>Category</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="listViewContent">
										<!-- List view content will be loaded here -->
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Add SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
	// Global variables
	let menuCategories = [];
	let currentPage = 1;
	const itemsPerPage = 8;

	// Load menu items when page loads
	document.addEventListener('DOMContentLoaded', function() {
		fetchMenuItems();
		setupViewToggle();
	});

	// Form submission handler
	document.getElementById('menuItemForm').addEventListener('submit', function(e) {
		e.preventDefault();

		const form = e.target;
		const formData = new FormData(form);
		const submitBtn = form.querySelector('button[type="submit"]');
		const itemId = document.getElementById('itemId').value;
		const isEdit = itemId !== '';

		// Disable submit button to prevent double submission
		submitBtn.disabled = true;
		submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...';

		// Determine the URL and method based on whether we're editing or creating
		const url = isEdit ? 'update_menu_item.php' : 'add_menu_item.php';
		const method = 'POST'; // Using POST for both since we're handling file uploads

		// If editing, append the ID to the form data
		if (isEdit) {
			formData.append('id', itemId);
		}

		fetch(url, {
				method: method,
				body: formData
			})
			.then(response => {
				if (!response.ok) {
					return response.text().then(text => {
						throw new Error(text || 'Network response was not ok');
					});
				}
				return response.json();
			})
			.then(data => {
				if (data.success) {
					Swal.fire({
						icon: 'success',
						title: 'Success',
						text: data.message,
						timer: 2000,
						showConfirmButton: false
					});

					// Close modal and refresh menu items
					const modal = bootstrap.Modal.getInstance(document.getElementById('newOrderModal'));
					modal.hide();
					resetForm();

					// Refresh menu items list
					fetchMenuItems();
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: data.message || (isEdit ? 'Failed to update menu item' : 'Failed to add menu item'),
					});
				}
			})
			.catch(error => {
				console.error('Error:', error);
				try {
					const errorData = JSON.parse(error.message);
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: errorData.message || error.message,
					});
				} catch (e) {
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: error.message || 'An error occurred while processing your request',
					});
				}
			})
			.finally(() => {
				submitBtn.disabled = false;
				submitBtn.innerHTML = 'Submit';
			});
	});

	// Function to reset the form
	function resetForm() {
		const form = document.getElementById('menuItemForm');
		form.reset();
		document.getElementById('itemId').value = '';
		document.getElementById('newOrderModalLabel').textContent = 'New Menu';
		document.getElementById('imagePreview').style.display = 'none';
		document.getElementById('noImageText').style.display = 'block';
		document.getElementById('imagePreview').src = '';
	}

	// Function to fetch and display menu items
	function fetchMenuItems() {
		fetch('get_menu_items.php')
			.then(response => {
				if (!response.ok) {
					throw new Error('Network response was not ok');
				}
				return response.json();
			})
			.then(data => {
				if (data.success) {
					// Store categories for later use
					menuCategories = data.categories;

					// Populate category dropdown
					populateCategoryDropdown();

					// Render views
					renderGridView(data.items);
					renderListView(data.items);
				} else {
					showError('Failed to load menu items: ' + (data.message || 'Unknown error'));
				}
			})
			.catch(error => {
				console.error('Error fetching menu items:', error);
				showError('Failed to load menu items. Please check console for details.');
			});
	}

	// Function to populate category dropdown
	function populateCategoryDropdown() {
		const dropdown = document.getElementById('category');
		dropdown.innerHTML = '<option value="">Select Category</option>';

		menuCategories.forEach(category => {
			const option = document.createElement('option');
			option.value = category.id;
			option.textContent = category.name;
			dropdown.appendChild(option);
		});
	}

	// Function to edit menu item
	function editMenuItem(id) {
		// Show loading indicator
		Swal.fire({
			title: 'Loading...',
			allowOutsideClick: false,
			didOpen: () => {
				Swal.showLoading();
			}
		});

		// Fetch the item details
		fetch(`get_menu_item.php?id=${id}`)
			.then(response => {
				if (!response.ok) {
					throw new Error('Network response was not ok');
				}
				return response.json();
			})
			.then(data => {
				Swal.close();
				if (data.success) {
					// Populate the modal with the item data
					const item = data.item;
					const modal = new bootstrap.Modal(document.getElementById('newOrderModal'));
					
					// Set modal title to "Edit Menu"
					document.getElementById('newOrderModalLabel').textContent = 'Edit Menu';
					document.getElementById('itemId').value = item.id;
					
					// Populate form fields
					document.getElementById('itemName').value = item.item_name;
					document.getElementById('subItem').value = item.sub_item || '';
					document.getElementById('price').value = item.price;
					document.getElementById('category').value = item.category_id;
					
					// Handle image preview
					const imagePreview = document.getElementById('imagePreview');
					const noImageText = document.getElementById('noImageText');
					
					if (item.image_path) {
						imagePreview.src = item.image_path;
						imagePreview.style.display = 'block';
						noImageText.style.display = 'none';
					} else {
						imagePreview.style.display = 'none';
						noImageText.style.display = 'block';
					}
					
					// Show the modal
					modal.show();
				} else {
					throw new Error(data.message || 'Failed to load menu item');
				}
			})
			.catch(error => {
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: error.message || 'Failed to load menu item details',
				});
			});
	}

	// Function to delete menu item
	function deleteMenuItem(id) {
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.isConfirmed) {
				// Show loading indicator
				Swal.fire({
					title: 'Deleting...',
					allowOutsideClick: false,
					didOpen: () => {
						Swal.showLoading();
					}
				});

				fetch(`delete_menu_item.php?id=${id}`, {
						method: 'DELETE',
						headers: {
							'Accept': 'application/json'
						}
					})
					.then(async response => {
						const data = await response.json();

						if (!response.ok) {
							throw new Error(data.message || `Server returned ${response.status}`);
						}

						return data;
					})
					.then(data => {
						Swal.fire(
							'Deleted!',
							data.message || 'Menu item deleted successfully.',
							'success'
						);
						// Refresh the menu items
						fetchMenuItems();
					})
					.catch(error => {
						console.error('Delete error:', error);
						Swal.fire(
							'Error!',
							error.message || 'An error occurred while deleting the menu item.',
							'error'
						);
					});
			}
		});
	}

	// Image preview handler
	document.getElementById('itemImage').addEventListener('change', function(e) {
		const file = e.target.files[0];
		const imagePreview = document.getElementById('imagePreview');
		const noImageText = document.getElementById('noImageText');
		
		if (file) {
			const reader = new FileReader();
			
			reader.onload = function(event) {
				imagePreview.src = event.target.result;
				imagePreview.style.display = 'block';
				noImageText.style.display = 'none';
			}
			
			reader.readAsDataURL(file);
		} else {
			// If no file selected but there's an existing image, keep showing it
			if (imagePreview.src && !imagePreview.src.includes('data:')) {
				imagePreview.style.display = 'block';
				noImageText.style.display = 'none';
			} else {
				imagePreview.style.display = 'none';
				noImageText.style.display = 'block';
			}
		}
	});

	// Reset form when modal is closed
	document.getElementById('newOrderModal').addEventListener('hidden.bs.modal', function() {
		resetForm();
	});

	// Function to setup view toggle buttons
	function setupViewToggle() {
		const gridViewBtn = document.getElementById("gridViewBtn");
		const listViewBtn = document.getElementById("listViewBtn");
		const gridView = document.getElementById("gridView");
		const listView = document.getElementById("listView");

		gridViewBtn.addEventListener("click", function() {
			gridView.classList.remove("d-none");
			listView.classList.add("d-none");
			this.classList.add("active");
			listViewBtn.classList.remove("active");
		});

		listViewBtn.addEventListener("click", function() {
			listView.classList.remove("d-none");
			gridView.classList.add("d-none");
			this.classList.add("active");
			gridViewBtn.classList.remove("active");
		});
	}

	// Function to render grid view
	function renderGridView(items) {
		const container = document.getElementById('menuItemsContainer');
		container.innerHTML = '';

		if (items.length === 0) {
			container.innerHTML = '<div class="col-12"><p>No menu items found</p></div>';
			return;
		}

		// Calculate pagination
		const totalPages = Math.ceil(items.length / itemsPerPage);
		const startIndex = (currentPage - 1) * itemsPerPage;
		const paginatedItems = items.slice(startIndex, startIndex + itemsPerPage);

		// Create grid container with proper structure
		const gridContainer = document.createElement('div');
		gridContainer.className = 'row';

		// Add actual items
		paginatedItems.forEach(item => {
			const colDiv = document.createElement('div');
			colDiv.className = 'col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4';

			colDiv.innerHTML = `
            <div class="card h-100">
                <div class="card-body">
                    <div class="new-arrival-product">
                        <div class="new-arrivals-img-contnent">
                            <img class="img-fluid" src="${item.image_path || 'images/product/default.jpg'}" alt="${item.item_name}">
                        </div>
                        <div class="new-arrival-content text-center mt-3">
                            <h4>${item.item_name}</h4>
                            <span>${item.sub_item || 'No description'}</span>
                            <br>
                            <span class="price">₹${item.price.toFixed(2)}</span>
                            <div class="badge bg-primary mt-2">${item.category_name}</div>
                        </div>
                    </div>
                </div>
            </div>
        `;
			gridContainer.appendChild(colDiv);
		});

		container.appendChild(gridContainer);

		// Add pagination controls
		if (items.length > itemsPerPage) {
			const paginationDiv = document.createElement('div');
			paginationDiv.className = 'col-12 mt-4';
			paginationDiv.innerHTML = `
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                        <a class="page-link" href="#" onclick="changePage(${currentPage - 1})" tabindex="-1">Previous</a>
                    </li>
                    ${Array.from({length: totalPages}, (_, i) => `
                        <li class="page-item ${i + 1 === currentPage ? 'active' : ''}">
                            <a class="page-link" href="#" onclick="changePage(${i + 1})">${i + 1}</a>
                        </li>
                    `).join('')}
                    <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                        <a class="page-link" href="#" onclick="changePage(${currentPage + 1})">Next</a>
                    </li>
                </ul>
            </nav>
        `;
			container.appendChild(paginationDiv);
		}
	}
// Function to render list view with reverse order (newest at bottom)
function renderListView(items) {
    const container = document.getElementById('listViewContent');
    container.innerHTML = '';

    if (items.length === 0) {
        container.innerHTML = '<tr><td colspan="7" class="text-center">No menu items found</td></tr>';
        return;
    }

    // Reverse the array to show newest at bottom
    const reversedItems = [...items].reverse();

    // Add items to the table in reverse order
    reversedItems.forEach(item => {
        const row = document.createElement('tr');

        row.innerHTML = `
            <td>${item.id}</td>
            <td><img src="${item.image_path || 'images/product/default.jpg'}" alt="${item.item_name}" style="width: 50px; height: 50px; object-fit: cover;"></td>
            <td>${item.item_name}</td>
            <td>${item.sub_item || '-'}</td>
            <td>₹${item.price.toFixed(2)}</td>
            <td>${item.category_name}</td>
            <td>
                <a href="javascript:void(0);" 
                   class="text-primary me-3" 
                   onclick="editMenuItem(${item.id})" 
                   title="Edit">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                <a href="javascript:void(0);" 
                   class="text-danger" 
                   onclick="deleteMenuItem(${item.id})" 
                   title="Delete">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        `;

        container.appendChild(row);
    });
}
</script>

<!--**********************************
    Content body end
***********************************-->

<?php include 'include/footer.php'; ?>