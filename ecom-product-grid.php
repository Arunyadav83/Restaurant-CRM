<?php include 'include/header.php'; ?>
<?php include 'include/sidebar.php'; ?>


<!-- Add SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<!-- Add Select2 CSS for better dropdowns -->
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery (must be loaded first) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Add SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Add Select2 JS for better dropdowns -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
    
    /* Filter and search controls styling */
    .controls-container {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 20px;
        align-items: center;
    }
    
    .filter-group {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .filter-label {
        font-weight: 600;
        color: #333;
        white-space: nowrap;
    }
    
    .search-container {
        flex-grow: 1;
        min-width: 250px;
    }
    
    .btn-group {
        flex-shrink: 0;
    }
    
    /* Select2 dropdown styling */
    .select2-container--default .select2-selection--single {
        height: 38px;
        border-radius: 4px;
        border: 1px solid #ced4da;
    }
    
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 36px;
    }
    
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 36px;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .controls-container {
            flex-direction: column;
            align-items: stretch;
        }
        
        .filter-group {
            width: 100%;
        }
        
        .search-container {
            width: 100%;
        }
        
        .btn-group {
            width: 100%;
        }
        
        #gridViewBtn, #listViewBtn {
            width: 50%;
        }
    }
</style>
<!--**********************************
    Content body start
***********************************-->

<div class="content-body">
    <div class="container mh-auto">
        <!-- Controls Container -->
        <div class="controls-container">
            <div class="filter-group">
                <span class="filter-label">Filter by:</span>
                <select id="categoryFilter" class="form-select select2" style="width: 180px;">
                    <option value="">All Categories</option>
                    <!-- Categories will be loaded via JavaScript -->
                </select>
                <!-- Add Sub-Category Filter Dropdown -->
                <select id="subCategoryFilter" class="form-select select2" style="width: 180px;" disabled>
                    <option value="">All Sub-Categories</option>
                </select>
            </div>
            
            <div class="search-container">
                <div class="input-group">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search menu items...">
                    <button class="btn btn-primary" type="button" id="searchBtn">
                        <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-outline-secondary" type="button" id="clearSearchBtn">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            
            <div class="btn-group" role="group" aria-label="View toggle">
                <button class="btn btn-outline-secondary active" id="gridViewBtn">
                    <i class="fa-solid fa-th"></i> Grid
                </button>
                <button class="btn btn-outline-secondary" id="listViewBtn">
                    <i class="fa-solid fa-bars"></i> List
                </button>
            </div>
            
            <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newOrderModal">
                <i class="fas fa-plus me-1"></i> New Menu
            </a>

            <!-- Add a button to open the sub-category modal -->
            <button class="btn btn-outline-primary ms-2" data-bs-toggle="modal" data-bs-target="#subCategoryModal">
                <i class="fas fa-plus"></i> Add Sub-Category
            </button>
        </div>


        <!-- Sub-Category Modal -->
<div class="modal fade" id="subCategoryModal" tabindex="-1" aria-labelledby="subCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="subCategoryForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="subCategoryModalLabel">Add Sub-Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="parentCategory" class="form-label">Parent Category*</label>
                        <select class="form-select select2" name="category_id" id="parentCategory" required>
                            <option value="">Select Category</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="subCategoryName" class="form-label">Sub-Category Name*</label>
                        <input type="text" class="form-control" name="name" id="subCategoryName" placeholder="Enter sub-category name" required>
                    </div>
                    <div class="mb-3">
                        <label for="subCategoryDescription" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="subCategoryDescription" placeholder="Enter description (optional)"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
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
                        <select class="form-select select2" name="category_id" id="category" required>
                            <option value="">Select Category</option>
                            <!-- Categories will be loaded via JavaScript -->
                        </select>
                    </div>

                    <!-- Add Sub-Category Dropdown -->
                    <div class="mb-3">
                        <label for="subCategory" class="form-label">Sub-Category</label>
                        <select class="form-select select2" name="sub_category_id" id="subCategory" disabled>
                            <option value="">Select Sub-Category (Optional)</option>
                            
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

<script>
    // Define showError function
    function showError(message) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: message,
        });
    }

    // Global variables
    let menuCategories = [];
    let allMenuItems = [];
    let currentPage = 1;
    const itemsPerPage = 8;
    let currentCategoryFilter = '';
    let currentSearchTerm = '';
    let currentSubCategoryFilter = ''; // Add variable for sub-category filter

    // Initialize Select2 dropdowns
    function initializeSelect2() {
        if (typeof $.fn.select2 === 'function') {
            $('.select2').select2({
                width: '100%',
                theme: 'classic'
            });
            // Select2 initialized successfully
            return true;
        }
        // Select2 not yet available
        return false;
    }

    // Load menu items when page loads and initialize functionality after DOM is ready
    $(document).ready(function() {
        // Initialize Select2 first
        initializeSelect2();

        // Then load other functionality
        fetchMenuItems();
        setupViewToggle();
        setupSearch();
        setupFilter();
        setupSubCategoryFilter(); // Setup sub-category filter
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
        $('#category').val('').trigger('change');
    }

    // Function to fetch and display menu items
   function fetchMenuItems() {
    // Show loading indicator
    const loadingSwal = Swal.fire({
        title: 'Loading...',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    fetch('get_menu_items.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            loadingSwal.close();
            if (data.success) {
                menuCategories = data.categories;
                allMenuItems = data.items;
                populateCategoryDropdowns();
                filterAndRenderItems();
            } else {
                throw new Error(data.message || 'Failed to load menu data');
            }
        })
        .catch(error => {
            loadingSwal.close();
            console.error('Error fetching menu items:', error);
            showError('Failed to load menu items: ' + error.message);
        });
}

    // Function to populate category dropdowns
    function populateCategoryDropdowns() {
    try {
        const modalDropdown = document.getElementById('category');
        const filterDropdown = document.getElementById('categoryFilter');
        const parentCategoryDropdown = document.getElementById('parentCategory');
        
        if (!modalDropdown || !filterDropdown || !parentCategoryDropdown) {
             // Log a warning, but don't throw an error as the page might still render partially
            console.warn('Required dropdown elements not found during population. Select2 initialization might fail for some elements.');
        }

        // Clear existing options
        if (modalDropdown) modalDropdown.innerHTML = '<option value="">Select Category</option>';
        if (filterDropdown) filterDropdown.innerHTML = '<option value="">All Categories</option>';
        if (parentCategoryDropdown) parentCategoryDropdown.innerHTML = '<option value="">Select Category</option>';

        // Add categories to dropdowns
        menuCategories.forEach(category => {
            if (modalDropdown) {
                const modalOption = document.createElement('option');
                modalOption.value = category.id;
                modalOption.textContent = category.name;
                modalDropdown.appendChild(modalOption);
            }

            if (filterDropdown) {
                const filterOption = document.createElement('option');
                filterOption.value = category.id;
                filterOption.textContent = category.name;
                filterDropdown.appendChild(filterOption);
            }
            
            if (parentCategoryDropdown) {
                const parentOption = document.createElement('option');
                parentOption.value = category.id;
                parentOption.textContent = category.name;
                parentCategoryDropdown.appendChild(parentOption);
            }
        });

        // Reinitialize Select2 on all dropdowns AFTER populating, only if Select2 is available
         if (typeof $.fn.select2 === 'function') {
             $('.select2').select2({
                 width: '100%',
                 theme: 'classic'
             });
         } else {
              console.warn('Select2 is not available. Cannot initialize dropdowns.');
         }

    } catch (e) {
        console.error('Error populating category dropdowns:', e);
        // Use the defined showError function
        showError('Failed to load category filters. Please try again.');
    }
}
    // Function to edit menu item
//   Update the editMenuItem function to handle sub-categories
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
                
                // Set category using Select2, only if Select2 is available
                 if (typeof $.fn.select2 === 'function') {
                     $('#category').val(item.category_id).trigger('change');
                 } else {
                     // Fallback if Select2 is not available
                     document.getElementById('category').value = item.category_id;
                 }
                
                // Load sub-categories and set the selected one
                loadSubCategories(item.category_id, item.sub_category_id);
                
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

document.getElementById('menuItemForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    const submitBtn = form.querySelector('button[type="submit"]');
    const itemId = document.getElementById('itemId').value;
    const isEdit = itemId !== '';

    // Add sub_category_id to form data if selected
    const subCategoryId = document.getElementById('subCategory').value;
    if (subCategoryId) {
        formData.append('sub_category_id', subCategoryId);
    }
});


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

    // Function to setup search functionality
    function setupSearch() {
        const searchInput = document.getElementById('searchInput');
        const searchBtn = document.getElementById('searchBtn');
        const clearSearchBtn = document.getElementById('clearSearchBtn');

        // Search on button click
        searchBtn.addEventListener('click', function() {
            currentSearchTerm = searchInput.value.trim().toLowerCase();
            currentPage = 1; // Reset to first page when searching
            filterAndRenderItems();
        });

        // Search on Enter key
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                currentSearchTerm = searchInput.value.trim().toLowerCase();
                currentPage = 1;
                filterAndRenderItems();
            }
        });

        // Clear search
        clearSearchBtn.addEventListener('click', function() {
            searchInput.value = '';
            currentSearchTerm = '';
            currentPage = 1;
            filterAndRenderItems();
        });
    }

    // Function to setup category filter and load sub-categories
    function setupFilter() {
        console.log('Setting up category filter...');
        const categoryFilter = document.getElementById('categoryFilter');
        const subCategoryFilter = document.getElementById('subCategoryFilter');

        if (categoryFilter) {
            console.log('Category filter element found.');
            categoryFilter.addEventListener('change', function() {
                currentCategoryFilter = this.value;
                console.log('Category filter changed to:', currentCategoryFilter);
                currentPage = 1; // Reset to first page when filtering
                
                // Reset and disable sub-category filter when category changes
                if (subCategoryFilter) {
                    console.log('Resetting sub-category filter.');
                    $(subCategoryFilter).val('').trigger('change'); // Reset sub-category selection
                     if ($(subCategoryFilter).data('select2')) { $(subCategoryFilter).select2('destroy'); }
                    subCategoryFilter.innerHTML = '<option value="">All Sub-Categories</option>'; // Clear options
                    subCategoryFilter.disabled = true; // Disable dropdown
                     if (typeof $.fn.select2 === 'function') { $(subCategoryFilter).select2({ width: '100%', theme: 'classic' }); }
                }
                currentSubCategoryFilter = ''; // Reset sub-category filter value

                // Load sub-categories if a specific category is selected
                if (currentCategoryFilter && subCategoryFilter) {
                    console.log('Loading sub-categories for category:', currentCategoryFilter);
                    loadSubCategoryFilter(currentCategoryFilter);
                }

                filterAndRenderItems();
            });
        } else {
            console.error('Category filter element #categoryFilter not found!');
        }
    }

    // Function to load and populate the sub-category filter dropdown
    function loadSubCategoryFilter(categoryId) {
        const subCategoryFilter = document.getElementById('subCategoryFilter');
        if (!subCategoryFilter) {
            console.error('Sub-category filter element not found');
            return;
        }

        // Show loading state
        subCategoryFilter.disabled = true;
        subCategoryFilter.innerHTML = '<option value="">Loading Sub-Categories...</option>';
        
        // Destroy existing Select2 instance if it exists
        if ($(subCategoryFilter).data('select2')) {
            $(subCategoryFilter).select2('destroy');
        }

        // Make the API call
        fetch(`get_sub_categories.php?category_id=${categoryId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Clear existing options
                subCategoryFilter.innerHTML = '<option value="">All Sub-Categories</option>';
                
                if (data.success) {
                    if (data.data && data.data.length > 0) {
                        // Add sub-categories to dropdown
                        data.data.forEach(subCategory => {
                            const option = document.createElement('option');
                            option.value = subCategory.id;
                            option.textContent = subCategory.name;
                            subCategoryFilter.appendChild(option);
                        });
                        subCategoryFilter.disabled = false;
                    } else {
                        // No sub-categories found - this is a valid case
                        subCategoryFilter.innerHTML = '<option value="">No Sub-Categories Available</option>';
                        subCategoryFilter.disabled = true;
                    }
                } else {
                    // API returned an error
                    subCategoryFilter.innerHTML = '<option value="">Error Loading Sub-Categories</option>';
                    subCategoryFilter.disabled = true;
                    console.error('API Error:', data.message);
                }

                // Reinitialize Select2
                if (typeof $.fn.select2 === 'function') {
                    $(subCategoryFilter).select2({
                        width: '100%',
                        theme: 'classic'
                    });
                }
            })
            .catch(error => {
                console.error('Error loading sub-categories:', error);
                subCategoryFilter.innerHTML = '<option value="">Error Loading Sub-Categories</option>';
                subCategoryFilter.disabled = true;
                
                // Reinitialize Select2 even in error state
                if (typeof $.fn.select2 === 'function') {
                    $(subCategoryFilter).select2({
                        width: '100%',
                        theme: 'classic'
                    });
                }
            });
    }

    // Function to setup sub-category filter event listener
    function setupSubCategoryFilter() {
        const subCategoryFilter = document.getElementById('subCategoryFilter');
        if (subCategoryFilter) {
            subCategoryFilter.addEventListener('change', function() {
                currentSubCategoryFilter = this.value;
                currentPage = 1; // Reset to first page when filtering
                filterAndRenderItems();
            });
        }
    }

    // Function to filter and render items based on current filters
    function filterAndRenderItems() {
        console.log('Filtering and rendering items. Current category filter:', currentCategoryFilter, ', sub-category filter:', currentSubCategoryFilter, ', search term:', currentSearchTerm);
        let filteredItems = [...allMenuItems];
        console.log('Total items before filtering:', filteredItems.length);

        // Apply category filter if selected
        if (currentCategoryFilter) {
            filteredItems = filteredItems.filter(item => item.category_id == currentCategoryFilter);
            console.log('Items after category filter:', filteredItems.length);
        }

        // Apply sub-category filter if selected
        if (currentSubCategoryFilter) {
            filteredItems = filteredItems.filter(item => item.sub_category_id == currentSubCategoryFilter);
            console.log('Items after sub-category filter:', filteredItems.length);
        }

        // Apply search filter if search term exists
        if (currentSearchTerm) {
            const searchTermLower = currentSearchTerm.toLowerCase();
            filteredItems = filteredItems.filter(item => 
                (item.item_name && item.item_name.toLowerCase().includes(searchTermLower)) || 
                (item.sub_item && item.sub_item.toLowerCase().includes(searchTermLower)) ||
                (item.category_name && item.category_name.toLowerCase().includes(searchTermLower)) ||
                (item.sub_category_name && item.sub_category_name.toLowerCase().includes(searchTermLower))
            );
             console.log('Items after search filter:', filteredItems.length);
        }

        // Render views with filtered items
        renderGridView(filteredItems);
        renderListView(filteredItems);
         console.log('Rendering', filteredItems.length, 'items.');
    }

    // Function to render grid view
    function renderGridView(items) {
        const container = document.getElementById('menuItemsContainer');
        container.innerHTML = '';

        if (items.length === 0) {
            container.innerHTML = '<div class="col-12 text-center py-5"><h5>No menu items found matching your criteria</h5></div>';
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
                                <span>${item.description || 'No description'}</span>
                                <br>
                                <span class="price">₹${item.price.toFixed(2)}</span>
                                <div class="badge bg-primary mt-2">${item.category_name}</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-top-0 text-center">
                        <button class="btn btn-sm btn-outline-primary me-2" onclick="editMenuItem(${item.id})">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-sm btn-outline-danger" onclick="deleteMenuItem(${item.id})">
                            <i class="fas fa-trash"></i> Delete
                        </button>
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
                            <a class="page-link" href="#" onclick="changePage(${currentPage - 1}) tabindex="-1">Previous</a>
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
            container.innerHTML = '<tr><td colspan="7" class="text-center py-5"><h5>No menu items found matching your criteria</h5></td></tr>';
            return;
        }

        // Add items to the table
        items.forEach(item => {
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
                       class="btn btn-sm btn-outline-primary me-2" 
                       onclick="editMenuItem(${item.id})" 
                       title="Edit">
                        <i class="fas fa-pencil-alt"></i> Edit
                    </a>
                    <a href="javascript:void(0);" 
                       class="btn btn-sm btn-outline-danger" 
                       onclick="deleteMenuItem(${item.id})" 
                       title="Delete">
                        <i class="fa fa-trash"></i> Delete
                    </a>
                </td>
            `;

            container.appendChild(row);
        });
    }

    // Function to change page
    function changePage(newPage) {
        currentPage = newPage;
        filterAndRenderItems();
        // Scroll to top of the container
        document.getElementById('menuItemsContainer').scrollIntoView({ behavior: 'smooth' });
    }

    // Function to load sub-categories based on selected category
    function loadSubCategories(categoryId, selectedSubCategoryId = null) {
        const subCategorySelect = document.getElementById('subCategory');
        
        // Clear existing options
        subCategorySelect.innerHTML = '<option value="">Select Sub-Category (Optional)</option>';
        
        if (!categoryId) {
            subCategorySelect.disabled = true;
            // Destroy Select2 instance if it exists before disabling, only if Select2 is available
            if (typeof $.fn.select2 === 'function' && $(subCategorySelect).data('select2')) {
                $(subCategorySelect).select2('destroy');
            }
            return;
        }
        
        // Show loading state and enable for Select2
        subCategorySelect.disabled = false; // Enable temporarily for Select2
        subCategorySelect.innerHTML = '<option value="">Loading sub-categories...</option>';
        
        // Destroy existing Select2 instance before reinitializing, only if Select2 is available
        if (typeof $.fn.select2 === 'function' && $(subCategorySelect).data('select2')) {
            $(subCategorySelect).select2('destroy');
        }

        fetch(`get_sub_categories.php?category_id=${categoryId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    subCategorySelect.innerHTML = '<option value="">Select Sub-Category (Optional)</option>';
                    
                    if (data.data && data.data.length > 0) {
                        data.data.forEach(subCategory => {
                            const option = document.createElement('option');
                            option.value = subCategory.id;
                            option.textContent = subCategory.name;
                            
                            if (selectedSubCategoryId && subCategory.id == selectedSubCategoryId) {
                                option.selected = true;
                            }
                            
                            subCategorySelect.appendChild(option);
                        });
                    }
                    
                    // Reinitialize Select2 on the sub-category dropdown, only if Select2 is available
                    if (typeof $.fn.select2 === 'function') {
                         $(subCategorySelect).select2({
                            width: '100%',
                            theme: 'classic'
                        });
                    } else {
                         console.warn('Select2 is not available. Cannot initialize sub-category dropdown.');
                    }
                    
                    // If there's a selected sub-category, trigger the change event, only if Select2 is available
                    if (selectedSubCategoryId && typeof $.fn.select2 === 'function') {
                         // Use a small delay to ensure Select2 is fully initialized
                        setTimeout(() => {
                             $(subCategorySelect).val(selectedSubCategoryId).trigger('change');
                        }, 50);
                    }
                } else {
                    // Reinitialize Select2 even on error to show the error state with Select2 styling, only if Select2 is available
                     if (typeof $.fn.select2 === 'function') {
                         $(subCategorySelect).select2({
                            width: '100%',
                            theme: 'classic'
                        });
                     } else {
                          console.warn('Select2 is not available. Cannot initialize sub-category dropdown on error.');
                     }
                    throw new Error(data.message || 'Failed to load sub-categories');
                }
            })
            .catch(error => {
                console.error('Error loading sub-categories:', error);
                const subCategorySelect = document.getElementById('subCategory');
                 if (subCategorySelect) {
                     subCategorySelect.innerHTML = '<option value="">Error loading sub-categories</option>';
                     subCategorySelect.disabled = true;
                      // Reinitialize Select2 on error to show the error state with Select2 styling, only if Select2 is available
                      if (typeof $.fn.select2 === 'function') {
                          $(subCategorySelect).select2({
                             width: '100%',
                             theme: 'classic'
                         });
                      } else {
                           console.warn('Select2 is not available. Cannot initialize sub-category dropdown on error.');
                      }
                 }
                showError('Failed to load sub-categories. Please check console for details.');
            });
    }

    // Add event listener for category change in the modal
document.getElementById('category').addEventListener('change', function() {
    loadSubCategories(this.value);
});

// Function to handle sub-category form submission
document.getElementById('subCategoryForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    const submitBtn = form.querySelector('button[type="submit"]');

    // Disable submit button to prevent double submission
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...';

    fetch('add_sub_category.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: data.message,
                timer: 2000,
                showConfirmButton: false
            });

            // Close modal and reset form
            const modal = bootstrap.Modal.getInstance(document.getElementById('subCategoryModal'));
            modal.hide();
            form.reset();

            // Refresh categories in the menu item modal and filter dropdowns
            fetchMenuItems(); // This function fetches categories and items and populates dropdowns

        } else {
            throw new Error(data.message || 'Failed to add sub-category');
        }
    })
    .catch(error => {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: error.message,
        });
    })
    .finally(() => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = 'Save';
    });
});

// When the sub-category modal is shown, populate the parent category dropdown
document.getElementById('subCategoryModal').addEventListener('show.bs.modal', function() {
    const categorySelect = document.getElementById('parentCategory');
    // Clear and repopulate the parent category dropdown with the latest categories
    categorySelect.innerHTML = '<option value="">Select Category</option>';
     menuCategories.forEach(category => {
        const option = document.createElement('option');
        option.value = category.id;
        option.textContent = category.name;
        categorySelect.appendChild(option);
    });
    // Reinitialize Select2 on the parent category dropdown
    $(categorySelect).select2({
        width: '100%',
        theme: 'classic'
    });
});
</script>

<!--**********************************
    Content body end
***********************************-->

<?php include 'include/footer.php'; ?>