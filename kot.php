<?php include 'include/header.php'; ?>
<?php include 'include/sidebar.php'; ?>

<!-- Add SweetAlert2 CSS in header.php -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header pb-0 border-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="h-title mb-0">Kitchen Order Ticket</h3>
                            <div>
                                <button id="gridViewBtn" class="btn btn-outline-secondary btn-sm me-2 active">
                                    <i class="fas fa-th-large"></i> Grid
                                </button>
                                <button id="listViewBtn" class="btn btn-outline-secondary btn-sm me-2">
                                    <i class="fas fa-list"></i> List
                                </button>
                                <a href="javascript:void(0)" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newOrderModal">
                                    <i class="fas fa-plus"></i> New Order
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- New Kitchen Order Modal -->
                    <div class="modal fade" id="newOrderModal" tabindex="-1" aria-labelledby="newOrderModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form id="kitchenOrderForm" enctype="multipart/form-data">
                                    <input type="hidden" name="order_id" id="editOrderId" value="">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="newOrderModalLabel">New Kitchen Order</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="itemImage" class="form-label">Item Image</label>
                                            <input type="file" class="form-control" name="item_image" id="itemImage" accept="image/*">
                                            <div class="form-text">Upload an image of the item (optional)</div>
                                            <div id="imagePreviewContainer" class="mt-2" style="display:none;">
                                                <img id="imagePreview" src="#" alt="Image Preview" style="max-height: 100px;">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="itemName" class="form-label">Item Name*</label>
                                            <input type="text" class="form-control" name="item_name" id="itemName" placeholder="Enter item name" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="subItem" class="form-label">Sub Item/Description</label>
                                            <input type="text" class="form-control" name="sub_item" id="subItem" placeholder="Enter sub item or description">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="quantity" class="form-label">Quantity*</label>
                                                <input type="number" class="form-control" name="quantity" id="quantity" min="1" value="1" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="status" class="form-label">Status*</label>
                                                <select class="form-select" name="status" id="status" required>
                                                    <option value="preparing">Preparing</option>
                                                    <option value="pending" selected>Pending</option>
                                                    <option value="completed">Completed</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="submitOrderBtn">Submit Order</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Delivery Assignment Modal -->
                    <div class="modal fade" id="assignDeliveryModal" tabindex="-1" aria-labelledby="assignDeliveryModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form id="assignDeliveryForm">
                                    <input type="hidden" name="order_id" id="deliveryOrderId" value="">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="assignDeliveryModalLabel">Assign Delivery Partner</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="deliveryPartner" class="form-label">Select Delivery Partner*</label>
                                            <select class="form-select" name="delivery_partner" id="deliveryPartner" required>
                                                <option value="">-- Select Partner --</option>
                                                <!-- Options will be loaded via AJAX -->
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="deliveryNotes" class="form-label">Delivery Notes</label>
                                            <textarea class="form-control" name="delivery_notes" id="deliveryNotes" rows="3" placeholder="Any special instructions..."></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="assignDeliveryBtn">Assign Delivery</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body border-0 pb-0">
                        <!-- Active Orders Section -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4>Active Orders</h4>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary filter-btn active" data-status="all">All</button>
                                    <button type="button" class="btn btn-sm btn-outline-primary filter-btn" data-status="preparing">Preparing</button>
                                    <button type="button" class="btn btn-sm btn-outline-warning filter-btn" data-status="pending">Pending</button>
                                    <button type="button" class="btn btn-sm btn-outline-success filter-btn" data-status="completed">Completed</button>
                                </div>
                            </div>
                            
                            <!-- Grid View -->
                            <div class="row" id="activeOrdersGridContainer">
                                <!-- Orders will be loaded here via AJAX -->
                            </div>
                            
                            <!-- List View (hidden by default) -->
                            <div class="table-responsive d-none" id="activeOrdersListContainer">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th width="100px">Image</th>
                                            <th>Item Name</th>
                                            <th>Description</th>
                                            <th>Qty</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th width="180px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="activeOrdersListBody">
                                        <!-- Orders will be loaded here via AJAX -->
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Menu Items Swiper -->
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <!-- Your existing menu items here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add SweetAlert2 JS before your scripts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Add Swiper JS if not already included -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script>
// Global variable to store current view type
let currentView = 'grid';
let currentFilter = 'all';

// Load orders when page loads
document.addEventListener('DOMContentLoaded', function() {
    fetchKitchenOrders();
    
    // Initialize Swiper
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
        }
    });
    
    // Image preview handler
    document.getElementById('itemImage').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
                document.getElementById('imagePreviewContainer').style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            document.getElementById('imagePreviewContainer').style.display = 'none';
        }
    });
    
    // View toggle buttons
    document.getElementById('gridViewBtn').addEventListener('click', function() {
        currentView = 'grid';
        this.classList.add('active');
        document.getElementById('listViewBtn').classList.remove('active');
        document.getElementById('activeOrdersGridContainer').classList.remove('d-none');
        document.getElementById('activeOrdersListContainer').classList.add('d-none');
        fetchKitchenOrders();
    });
    
    document.getElementById('listViewBtn').addEventListener('click', function() {
        currentView = 'list';
        this.classList.add('active');
        document.getElementById('gridViewBtn').classList.remove('active');
        document.getElementById('activeOrdersGridContainer').classList.add('d-none');
        document.getElementById('activeOrdersListContainer').classList.remove('d-none');
        fetchKitchenOrders();
    });
    
    // Filter buttons
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            currentFilter = this.dataset.status;
            fetchKitchenOrders();
        });
    });
});

// Form submission handler
document.getElementById('kitchenOrderForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const form = e.target;
    const formData = new FormData(form);
    const submitBtn = form.querySelector('#submitOrderBtn');
    const isEdit = document.getElementById('editOrderId').value !== '';
    
    // Disable submit button to prevent double submission
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...';
    
    // Use the same endpoint for both add and update
    const url = 'handle_kitchen_order.php';
    formData.append('is_edit', isEdit ? '1' : '0');
    
    fetch(url, {
        method: 'POST',
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
            
            // Close modal and refresh orders
            const modal = bootstrap.Modal.getInstance(document.getElementById('newOrderModal'));
            modal.hide();
            form.reset();
            document.getElementById('imagePreviewContainer').style.display = 'none';
            document.getElementById('editOrderId').value = '';
            document.getElementById('newOrderModalLabel').textContent = 'New Kitchen Order';
            document.getElementById('submitOrderBtn').textContent = 'Submit Order';
            
            // Refresh orders list
            fetchKitchenOrders();
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: data.message || 'Failed to process order',
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
        submitBtn.innerHTML = isEdit ? 'Update Order' : 'Submit Order';
    });
});

// Function to fetch and display kitchen orders
function fetchKitchenOrders() {
    const url = `get_kitchen_orders.php?filter=${currentFilter}`;
    
    fetch(url)
    
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            if (currentView === 'grid') {
                renderGridView(data.orders);
            } else {
                renderListView(data.orders);
            }
        } else {
            console.error('Failed to fetch orders:', data.message);
            document.getElementById('activeOrdersGridContainer').innerHTML = 
                '<div class="col-12"><div class="alert alert-danger">Failed to load orders: ' + data.message + '</div></div>';
        }
    })
    .catch(error => {
        console.error('Error fetching orders:', error);
        document.getElementById('activeOrdersGridContainer').innerHTML = 
            '<div class="col-12"><div class="alert alert-danger">Error loading orders. Please try again.</div></div>';
    });
}

// Function to render grid view
function renderGridView(orders) {
    const container = document.getElementById('activeOrdersGridContainer');
    container.innerHTML = '';
    
    if (orders.length === 0) {
        container.innerHTML = '<div class="col-12"><div class="alert alert-info">No orders found</div></div>';
        return;
    }
    
    orders.forEach(order => {
        const orderCard = createOrderCard(order);
        container.appendChild(orderCard);
    });
}

// Function to render list view
function renderListView(orders) {
    const container = document.getElementById('activeOrdersListBody');
    container.innerHTML = '';
    
    if (orders.length === 0) {
        container.innerHTML = '<tr><td colspan="7" class="text-center py-4"><div class="alert alert-info">No orders found</div></td></tr>';
        return;
    }
    
    orders.forEach(order => {
        const orderRow = createOrderRow(order);
        container.appendChild(orderRow);
    });
}

// Function to create order card HTML for grid view
function createOrderCard(order) {
    const col = document.createElement('div');
    col.className = 'col-md-4 mb-4';
    
    const card = document.createElement('div');
    card.className = 'card h-100';
    
    let imageHtml = '';
    if (order.image_path) {
        imageHtml = `<img src="${order.image_path}" class="card-img-top" alt="${order.item_name}" style="height: 180px; object-fit: cover;">`;
    }
    
    card.innerHTML = `
        <div class="card-body">
            ${imageHtml}
            <h5 class="card-title mt-3">${order.item_name}</h5>
            <p class="card-text">${order.sub_item || 'No description'}</p>
            <p><strong>Quantity:</strong> ${order.quantity}</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="badge bg-${getStatusBadgeColor(order.status)}">${order.status}</span>
                <small class="text-muted">${formatDate(order.created_at)}</small>
            </div>
        </div>
        <div class="card-footer bg-transparent">
            <select class="form-select form-select-sm status-select mb-2" data-order-id="${order.id}">
                <option value="preparing" ${order.status === 'preparing' ? 'selected' : ''}>Preparing</option>
                <option value="pending" ${order.status === 'pending' ? 'selected' : ''}>Pending</option>
                <option value="completed" ${order.status === 'completed' ? 'selected' : ''}>Completed</option>
            </select>
            <button class="btn btn-sm btn-success w-100 assign-delivery-btn" data-order-id="${order.id}" ${order.status !== 'completed' ? 'disabled' : ''}>
                <i class="fas fa-truck"></i> Assign Delivery
            </button>
        </div>
    `;
    
    col.appendChild(card);
    
    // Add event listeners
    col.querySelector('.status-select').addEventListener('change', function() {
        updateOrderStatus(order.id, this.value);
    });
    
    col.querySelector('.assign-delivery-btn').addEventListener('click', function() {
        assignOrderToDelivery(order.id);
    });
    
    return col;
}

// Function to create order row HTML for list view
function createOrderRow(order) {
    const row = document.createElement('tr');
    
    let imageHtml = '<i class="fas fa-image text-muted" style="font-size: 2rem;"></i>';
    if (order.image_path) {
        imageHtml = `<img src="${order.image_path}" alt="${order.item_name}" style="height: 50px; width: 50px; object-fit: cover;">`;
    }
    
    row.innerHTML = `
        <td class="align-middle">${imageHtml}</td>
        <td class="align-middle">${order.item_name}</td>
        <td class="align-middle">${order.sub_item || '-'}</td>
        <td class="align-middle">${order.quantity}</td>
        <td class="align-middle">
            <span class="badge bg-${getStatusBadgeColor(order.status)}">${order.status}</span>
        </td>
        <td class="align-middle">${formatDate(order.created_at)}</td>
        <td class="align-middle">
            <div class="d-flex">
                <select class="form-select form-select-sm status-select me-2" data-order-id="${order.id}">
                    <option value="preparing" ${order.status === 'preparing' ? 'selected' : ''}>Preparing</option>
                    <option value="pending" ${order.status === 'pending' ? 'selected' : ''}>Pending</option>
                    <option value="completed" ${order.status === 'completed' ? 'selected' : ''}>Completed</option>
                </select>
                <button class="btn btn-sm btn-success assign-delivery-btn me-1" data-order-id="${order.id}" ${order.status !== 'completed' ? 'disabled' : ''}>
                    <i class="fas fa-truck"></i>
                </button>
                <button class="btn btn-sm btn-outline-primary edit-btn me-1" data-order-id="${order.id}">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-outline-danger delete-btn" data-order-id="${order.id}">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </td>
    `;
    
    // Add event listeners for list view
    row.querySelector('.status-select').addEventListener('change', function() {
        updateOrderStatus(order.id, this.value);
    });
    
    row.querySelector('.assign-delivery-btn').addEventListener('click', function() {
        assignOrderToDelivery(order.id);
    });
    
    row.querySelector('.edit-btn').addEventListener('click', function() {
        editOrder(order.id);
    });
    
    row.querySelector('.delete-btn').addEventListener('click', function() {
        deleteOrder(order.id);
    });
    
    return row;
}

// Function to assign order to delivery
function assignOrderToDelivery(orderId) {
    // Set the order ID in the form
    document.getElementById('deliveryOrderId').value = orderId;
    
    // Fetch available delivery partners
    fetch('get_delivery_partners.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const select = document.getElementById('deliveryPartner');
                select.innerHTML = '<option value="">-- Select Partner --</option>';
                
                data.partners.forEach(partner => {
                    const option = document.createElement('option');
                    option.value = partner.id;
                    option.textContent = `${partner.partner_name} (${partner.phone_number})`;
                    select.appendChild(option);
                });
                
                // Show the modal
                const modal = new bootstrap.Modal(document.getElementById('assignDeliveryModal'));
                modal.show();
            } else {
                throw new Error(data.message || 'Failed to load delivery partners');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: error.message || 'Failed to load delivery partners',
            });
        });
}

/// Updated delivery assignment form submission
document.getElementById('assignDeliveryForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const form = e.target;
    const formData = new FormData(form);
    const submitBtn = form.querySelector('#assignDeliveryBtn');
    
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Assigning...';
    
    fetch('assign_delivery.php', {
        method: 'POST',
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
            }).then(() => {
                // Close modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('assignDeliveryModal'));
                modal.hide();
                form.reset();
                
                // Remove the assigned order from UI immediately
                const orderCard = document.querySelector(`[data-order-id="${formData.get('order_id')}"]`);
                if (orderCard) {
                    orderCard.remove();
                }
                
                // Refresh the entire orders list
                fetchKitchenOrders();
            });
        } else {
            throw new Error(data.message || 'Failed to assign delivery');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: error.message || 'An error occurred while assigning delivery',
        });
    })
    .finally(() => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = 'Assign Delivery';
    });
});
// Function to edit an order
function editOrder(orderId) {
    fetch(`get_order_details.php?id=${orderId}`)
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        const contentType = response.headers.get('content-type');
        if (!contentType || !contentType.includes('application/json')) {
            throw new TypeError("Response is not JSON");
        }
        
        return response.json();
    })
    .then(data => {
        if (data.success) {
            const order = data.order;
            const modal = new bootstrap.Modal(document.getElementById('newOrderModal'));
            
            // Fill the form with order details
            document.getElementById('editOrderId').value = order.id;
            document.getElementById('itemName').value = order.item_name;
            document.getElementById('subItem').value = order.sub_item || '';
            document.getElementById('quantity').value = order.quantity;
            document.getElementById('status').value = order.status;
            
            // Handle image preview if exists
            if (order.image_path) {
                document.getElementById('imagePreview').src = order.image_path;
                document.getElementById('imagePreviewContainer').style.display = 'block';
            } else {
                document.getElementById('imagePreviewContainer').style.display = 'none';
            }
            
            // Update modal title and button text
            document.getElementById('newOrderModalLabel').textContent = 'Edit Kitchen Order';
            document.getElementById('submitOrderBtn').textContent = 'Update Order';
            
            // Show modal
            modal.show();
        } else {
            throw new Error(data.message || 'Failed to load order details');
        }
    })
    .catch(error => {
        console.error('Error fetching order details:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: error.message.includes('JSON') 
                ? 'Server returned invalid response. Please check your backend code.' 
                : error.message,
        });
    });
}

// Function to delete an order
function deleteOrder(orderId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch('delete_order.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    order_id: orderId
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const contentType = response.headers.get('content-type');
                if (!contentType || !contentType.includes('application/json')) {
                    throw new TypeError("Response is not JSON");
                }
                
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: data.message,
                        timer: 2000,
                        showConfirmButton: false
                    });
                    fetchKitchenOrders();
                } else {
                    throw new Error(data.message || 'Failed to delete order');
                }
            })
            .catch(error => {
                console.error('Error deleting order:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: error.message.includes('JSON') 
                        ? 'Server returned invalid response. Please check your backend code.' 
                        : error.message,
                });
            });
        }
    });
}

// Helper function to get badge color based on status
function getStatusBadgeColor(status) {
    switch(status) {
        case 'preparing': return 'primary';
        case 'pending': return 'warning';
        case 'completed': return 'success';
        default: return 'secondary';
    }
}

// Helper function to format date
function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleString();
}

// In your status update function
function updateOrderStatus(orderId, newStatus) {
    // Validate status value first
    const validStatuses = ['preparing', 'pending', 'completed', 'assigned'];
    if (!validStatuses.includes(newStatus)) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Invalid status value',
        });
        return;
    }

    fetch('update_order_status.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            order_id: orderId,
            status: newStatus
        })
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
            fetchKitchenOrders();
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: data.message || 'Failed to update status',
            });
        }
    })
    .catch(error => {
        console.error('Error updating status:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: error.message || 'Failed to update status',
        });
    });
}
</script>

<!--**********************************
    Content body end
***********************************-->

<?php include 'include/footer.php'; ?>