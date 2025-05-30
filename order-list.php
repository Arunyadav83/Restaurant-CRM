 <?php include 'include/header.php'; ?>
	<?php include 'include/sidebar.php'; ?>
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container">
				<div class="d-flex justify-content-between mb-4 flex-wrap">
					<ul class="revnue-tab nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" id="status-tab" data-bs-toggle="tab" data-bs-target="#status-tab-pane" type="button" role="tab" aria-controls="status-tab-pane" aria-selected="true">All Status</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="delivery-tab" data-bs-toggle="tab" data-bs-target="#delivery-tab-pane" type="button" role="tab" aria-controls="delivery-tab-pane" aria-selected="false">On Delivery</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="delivered-tab" data-bs-toggle="tab" data-bs-target="#delivered-tab-pane" type="button" role="tab" aria-controls="delivered-tab-pane" aria-selected="false">Delivered</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="canceled-tab" data-bs-toggle="tab" data-bs-target="#canceled-tab-pane" type="button" role="tab" aria-controls="canceled-tab-pane" aria-selected="false">Canceled</button>
						</li>
					</ul>
					<div>
<!-- Button to open modal -->
<a href="javascript:void(0)" class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#newOrderModal">
  + New Order
</a>

<!-- Modal -->
<div class="modal fade" id="newOrderModal" tabindex="-1" aria-labelledby="newOrderModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="orderForm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newOrderModalLabel">New Order</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Input fields -->
          <div class="mb-3">
            <label class="form-label">Order ID</label>
            <input type="text" class="form-control" name="order_id" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="datetime-local" class="form-control" name="date" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Customer</label>
            <input type="text" class="form-control" name="customer" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" class="form-control" name="location" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Amount (₹)</label>
            <input type="number" class="form-control" name="amount" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Status</label>
            <select class="form-select" name="status" required>
              <option value="On Delivery">On Delivery</option>
              <option value="Canceled">Canceled</option>
              <option value="Delivered">Delivered</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Order</button>
        </div>
      </div>
    </form>
  </div>
</div>





						
						<select class="default-select h-select ms-1" aria-label="Default select example">
						  <option selected>Week</option>
						  <option value="1">Month</option>
						  <option value="2">Daily</option>
						  
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="status-tab-pane" role="tabpanel" aria-labelledby="status-tab" tabindex="0">
								<div class="card mt-2">
									<div class="card-body p-0">
										<div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting ">
											<table id="empoloyees-tbl" class="table">
												<thead>
													<tr>
														<th class="d-flex align-items-center">
															<div class="form-check custom-checkbox ms-0">
																<input type="checkbox" class="form-check-input checkAllInput" id="checkAll2" required="">
																<label class="form-check-label" for="checkAll2"></label>
															</div>
														</th>
														<th>Order ID</th>
														<th>Date</th>
														<th>Customer</th>
														<th>Location</th>
														<th>Amount</th>
														<th>Status</th>
														<th>Action</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000123456</span></td>
														<td><span>Nov 21th 2020 09:21 AM</span></td>
														<td><span>James Sitepu</span></td>
														<td><span>Corner One St<br> Park London</span></td>
														<td><span>₹ 21,4</span></td>
														<td><span class="badge badge-rounded badge-outline-primary badge-lg">On Delivery</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">Track</a>
																<a href="javascript:void(0)" class="btn-link text-dark ms-1">Cancel</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000123545</span></td>
														<td><span>Nov 22th 2023 09:21 AM</span></td>
														<td><span>Marquez Silaban</span></td>
														<td><span>Park, Orange St</span></td>
														<td><span>₹ 87,4</span></td>
														<td><span class="badge badge-rounded badge-outline-danger badge-lg">Canceled</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">View details</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000123583</span></td>
														<td><span>Nov 22th 2023 09:21 AM</span></td>
														<td><span>Joseph David</span></td>
														<td><span>Center Park St</span></td>
														<td><span>₹ 88,4</span></td>
														<td><span class="badge badge-rounded badge-outline-success badge-lg">Delivered</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">View details</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#002123456</span></td>
														<td><span>Nov 21th 2020 09:21 AM</span></td>
														<td><span>Richard Elijah</span></td>
														<td><span>NA</span></td>
														<td><span>₹ 87,4</span></td>
														<td><span class="badge badge-rounded badge-outline-primary badge-lg">On Delivery</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">Track</a>
																<a href="javascript:void(0)" class="btn-link text-dark ms-1">Cancel</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000223543</span></td>
														<td><span>Nov 22th 2023 09:21 AM</span></td>
														<td><span>Robert Silaban</span></td>
														<td><span>CA</span></td>
														<td><span>₹ 58,4</span></td>
														<td><span class="badge badge-rounded badge-outline-danger badge-lg">Canceled</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">View details</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000123553</span></td>
														<td><span>Nov 22th 2023 09:21 AM</span></td>
														<td><span>James John</span></td>
														<td><span>USA</span></td>
														<td><span>₹ 85,4</span></td>
														<td><span class="badge badge-rounded badge-outline-success badge-lg">Delivered</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">View details</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000123456</span></td>
														<td><span>Nov 21th 2020 09:21 AM</span></td>
														<td><span>James Sitepu</span></td>
														<td><span>Corner One St<br> Park London</span></td>
														<td><span>₹ 21,4</span></td>
														<td><span class="badge badge-rounded badge-outline-primary badge-lg">On Delivery</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">Track</a>
																<a href="javascript:void(0)" class="btn-link text-dark ms-1">Cancel</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000123545</span></td>
														<td><span>Nov 22th 2023 09:21 AM</span></td>
														<td><span>Marquez Silaban</span></td>
														<td><span>Park, Orange St</span></td>
														<td><span>₹ 87,4</span></td>
														<td><span class="badge badge-rounded badge-outline-danger badge-lg">Canceled</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">View details</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000123583</span></td>
														<td><span>Nov 22th 2023 09:21 AM</span></td>
														<td><span>Joseph David</span></td>
														<td><span>Center Park St</span></td>
														<td><span>₹ 88,4</span></td>
														<td><span class="badge badge-rounded badge-outline-success badge-lg">Delivered</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">View details</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#002123456</span></td>
														<td><span>Nov 21th 2020 09:21 AM</span></td>
														<td><span>Richard Elijah</span></td>
														<td><span>NA</span></td>
														<td><span>₹ 87,4</span></td>
														<td><span class="badge badge-rounded badge-outline-primary badge-lg">On Delivery</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">Track</a>
																<a href="javascript:void(0)" class="btn-link text-dark ms-1">Cancel</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000223543</span></td>
														<td><span>Nov 22th 2023 09:21 AM</span></td>
														<td><span>Robert Silaban</span></td>
														<td><span>CA</span></td>
														<td><span>₹ 58,4</span></td>
														<td><span class="badge badge-rounded badge-outline-danger badge-lg">Canceled</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">View details</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000123553</span></td>
														<td><span>Nov 22th 2023 09:21 AM</span></td>
														<td><span>James John</span></td>
														<td><span>USA</span></td>
														<td><span>₹ 85,4</span></td>
														<td><span class="badge badge-rounded badge-outline-success badge-lg">Delivered</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">View details</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000123583</span></td>
														<td><span>Nov 22th 2023 09:21 AM</span></td>
														<td><span>Joseph David</span></td>
														<td><span>Center Park St</span></td>
														<td><span>₹ 88,4</span></td>
														<td><span class="badge badge-rounded badge-outline-success badge-lg">Delivered</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">View details</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#002123456</span></td>
														<td><span>Nov 21th 2020 09:21 AM</span></td>
														<td><span>Richard Elijah</span></td>
														<td><span>NA</span></td>
														<td><span>₹ 87,4</span></td>
														<td><span class="badge badge-rounded badge-outline-primary badge-lg">On Delivery</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">Track</a>
																<a href="javascript:void(0)" class="btn-link text-dark ms-1">Cancel</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000223543</span></td>
														<td><span>Nov 22th 2023 09:21 AM</span></td>
														<td><span>Robert Silaban</span></td>
														<td><span>CA</span></td>
														<td><span>₹ 58,4</span></td>
														<td><span class="badge badge-rounded badge-outline-danger badge-lg">Canceled</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">View details</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000123553</span></td>
														<td><span>Nov 22th 2023 09:21 AM</span></td>
														<td><span>James John</span></td>
														<td><span>USA</span></td>
														<td><span>₹ 85,4</span></td>
														<td><span class="badge badge-rounded badge-outline-success badge-lg">Delivered</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">View details</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade show" id="delivery-tab-pane" role="tabpanel" aria-labelledby="delivery-tab" tabindex="0">
								<div class="card mt-2">
									<div class="card-body p-0">
										<div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting ">
											<table id="empoloyees-tblA" class="table">
												<thead>
													<tr>
														<th>
															<div class="form-check custom-checkbox ms-0">
																<input type="checkbox" class="form-check-input checkAllInput" id="checkAll2" required="">
																<label class="form-check-label" for="checkAll2"></label>
															</div>
														</th>
														<th>Order ID</th>
														<th>Date</th>
														<th>Customer</th>
														<th>Location</th>
														<th>Amount</th>
														<th>Status</th>
														<th>Action</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#002123456</span></td>
														<td><span>Nov 21th 2020 09:21 AM</span></td>
														<td><span>Richard Elijah</span></td>
														<td><span>NA</span></td>
														<td><span>₹ 87,4</span></td>
														<td><span class="badge badge-rounded badge-outline-primary badge-lg">On Delivery</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">Track</a>
																<a href="javascript:void(0)" class="btn-link text-dark ms-1">Cancel</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000223543</span></td>
														<td><span>Nov 22th 2023 09:21 AM</span></td>
														<td><span>Robert Silaban</span></td>
														<td><span>CA</span></td>
														<td><span>₹ 58,4</span></td>
														<td><span class="badge badge-rounded badge-outline-danger badge-lg">Canceled</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">View details</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000123553</span></td>
														<td><span>Nov 22th 2023 09:21 AM</span></td>
														<td><span>James John</span></td>
														<td><span>USA</span></td>
														<td><span>₹ 85,4</span></td>
														<td><span class="badge badge-rounded badge-outline-success badge-lg">Delivered</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">View details</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000123456</span></td>
														<td><span>Nov 21th 2020 09:21 AM</span></td>
														<td><span>James Sitepu</span></td>
														<td><span>Corner One St<br> Park London</span></td>
														<td><span>₹ 21,4</span></td>
														<td><span class="badge badge-rounded badge-outline-primary badge-lg">On Delivery</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">Track</a>
																<a href="javascript:void(0)" class="btn-link text-dark ms-1">Cancel</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000123545</span></td>
														<td><span>Nov 22th 2023 09:21 AM</span></td>
														<td><span>Marquez Silaban</span></td>
														<td><span>Park, Orange St</span></td>
														<td><span>₹ 87,4</span></td>
														<td><span class="badge badge-rounded badge-outline-danger badge-lg">Canceled</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">View details</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000123583</span></td>
														<td><span>Nov 22th 2023 09:21 AM</span></td>
														<td><span>Joseph David</span></td>
														<td><span>Center Park St</span></td>
														<td><span>₹ 88,4</span></td>
														<td><span class="badge badge-rounded badge-outline-success badge-lg">Delivered</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">View details</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#002123456</span></td>
														<td><span>Nov 21th 2020 09:21 AM</span></td>
														<td><span>Richard Elijah</span></td>
														<td><span>NA</span></td>
														<td><span>₹ 87,4</span></td>
														<td><span class="badge badge-rounded badge-outline-primary badge-lg">On Delivery</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">Track</a>
																<a href="javascript:void(0)" class="btn-link text-dark ms-1">Cancel</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000223543</span></td>
														<td><span>Nov 22th 2023 09:21 AM</span></td>
														<td><span>Robert Silaban</span></td>
														<td><span>CA</span></td>
														<td><span>₹ 58,4</span></td>
														<td><span class="badge badge-rounded badge-outline-danger badge-lg">Canceled</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">View details</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade show" id="delivered-tab-pane" role="tabpanel" aria-labelledby="delivered-tab" tabindex="0">
								<div class="card mt-2">
									<div class="card-body p-0">
										<div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting ">
											<table id="empoloyees-tblB" class="table">
												<thead>
													<tr>
														<th>
															<div class="form-check custom-checkbox ms-0">
																<input type="checkbox" class="form-check-input checkAllInput" id="checkAll2" required="">
																<label class="form-check-label" for="checkAll2"></label>
															</div>
														</th>
														<th>Order ID</th>
														<th>Date</th>
														<th>Customer</th>
														<th>Location</th>
														<th>Amount</th>
														<th>Status</th>
														<th>Action</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#002123456</span></td>
														<td><span>Nov 21th 2020 09:21 AM</span></td>
														<td><span>Richard Elijah</span></td>
														<td><span>NA</span></td>
														<td><span>₹ 87,4</span></td>
														<td><span class="badge badge-rounded badge-outline-primary badge-lg">On Delivery</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">Track</a>
																<a href="javascript:void(0)" class="btn-link text-dark ms-1">Cancel</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000223543</span></td>
														<td><span>Nov 22th 2023 09:21 AM</span></td>
														<td><span>Robert Silaban</span></td>
														<td><span>CA</span></td>
														<td><span>₹ 58,4</span></td>
														<td><span class="badge badge-rounded badge-outline-danger badge-lg">Canceled</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">View details</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000123553</span></td>
														<td><span>Nov 22th 2023 09:21 AM</span></td>
														<td><span>James John</span></td>
														<td><span>USA</span></td>
														<td><span>₹ 85,4</span></td>
														<td><span class="badge badge-rounded badge-outline-success badge-lg">Delivered</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">View details</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000123456</span></td>
														<td><span>Nov 21th 2020 09:21 AM</span></td>
														<td><span>James Sitepu</span></td>
														<td><span>Corner One St<br> Park London</span></td>
														<td><span>₹ 21,4</span></td>
														<td><span class="badge badge-rounded badge-outline-primary badge-lg">On Delivery</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">Track</a>
																<a href="javascript:void(0)" class="btn-link text-dark ms-1">Cancel</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000123545</span></td>
														<td><span>Nov 22th 2023 09:21 AM</span></td>
														<td><span>Marquez Silaban</span></td>
														<td><span>Park, Orange St</span></td>
														<td><span>₹ 87,4</span></td>
														<td><span class="badge badge-rounded badge-outline-danger badge-lg">Canceled</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">View details</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000123583</span></td>
														<td><span>Nov 22th 2023 09:21 AM</span></td>
														<td><span>Joseph David</span></td>
														<td><span>Center Park St</span></td>
														<td><span>₹ 88,4</span></td>
														<td><span class="badge badge-rounded badge-outline-success badge-lg">Delivered</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">View details</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#002123456</span></td>
														<td><span>Nov 21th 2020 09:21 AM</span></td>
														<td><span>Richard Elijah</span></td>
														<td><span>NA</span></td>
														<td><span>₹ 87,4</span></td>
														<td><span class="badge badge-rounded badge-outline-primary badge-lg">On Delivery</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">Track</a>
																<a href="javascript:void(0)" class="btn-link text-dark ms-1">Cancel</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
																<label class="form-check-label" for="customCheckBox100"></label>
															</div>
														</td>
														<td><span>#000223543</span></td>
														<td><span>Nov 22th 2023 09:21 AM</span></td>
														<td><span>Robert Silaban</span></td>
														<td><span>CA</span></td>
														<td><span>₹ 58,4</span></td>
														<td><span class="badge badge-rounded badge-outline-danger badge-lg">Canceled</span></td>
														<td>
															<div>
																<a href="javascript:void(0)" class="btn-link me-1">View details</a>
															</div>
														</td>
														<td>
															<div class="dropdown">
																<div class="btn-link" data-bs-toggle="dropdown" >
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-right" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																	<a class="dropdown-item" href="javascript:void(0);">Delete</a>
																</div>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								
							</div>
							<div class="tab-pane fade show" id="canceled-tab-pane" role="tabpanel" aria-labelledby="canceled-tab" tabindex="0">
							<div class="card mt-2">
								<div class="card-body p-0">
									<div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting ">
										<table id="empoloyees-tblC" class="table">
											<thead>
												<tr>
													<th>
														<div class="form-check custom-checkbox ms-0">
															<input type="checkbox" class="form-check-input checkAllInput" id="checkAll2" required="">
															<label class="form-check-label" for="checkAll2"></label>
														</div>
													</th>
													<th>Order ID</th>
													<th>Date</th>
													<th>Customer</th>
													<th>Location</th>
													<th>Amount</th>
													<th>Status</th>
													<th>Action</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												
												<tr>
													<td>
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
															<label class="form-check-label" for="customCheckBox100"></label>
														</div>
													</td>
													<td><span>#002123456</span></td>
													<td><span>Nov 21th 2020 09:21 AM</span></td>
													<td><span>Richard Elijah</span></td>
													<td><span>NA</span></td>
													<td><span>₹ 87,4</span></td>
													<td><span class="badge badge-rounded badge-outline-primary badge-lg">On Delivery</span></td>
													<td>
														<div>
															<a href="javascript:void(0)" class="btn-link me-1">Track</a>
															<a href="javascript:void(0)" class="btn-link text-dark ms-1">Cancel</a>
														</div>
													</td>
													<td>
														<div class="dropdown">
															<div class="btn-link" data-bs-toggle="dropdown" >
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																</svg>
															</div>
															<div class="dropdown-menu dropdown-menu-right" style="">
																<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																<a class="dropdown-item" href="javascript:void(0);">Delete</a>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
															<label class="form-check-label" for="customCheckBox100"></label>
														</div>
													</td>
													<td><span>#000223543</span></td>
													<td><span>Nov 22th 2023 09:21 AM</span></td>
													<td><span>Robert Silaban</span></td>
													<td><span>CA</span></td>
													<td><span>₹ 58,4</span></td>
													<td><span class="badge badge-rounded badge-outline-danger badge-lg">Canceled</span></td>
													<td>
														<div>
															<a href="javascript:void(0)" class="btn-link me-1">View details</a>
														</div>
													</td>
													<td>
														<div class="dropdown">
															<div class="btn-link" data-bs-toggle="dropdown" >
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																</svg>
															</div>
															<div class="dropdown-menu dropdown-menu-right" style="">
																<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																<a class="dropdown-item" href="javascript:void(0);">Delete</a>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
															<label class="form-check-label" for="customCheckBox100"></label>
														</div>
													</td>
													<td><span>#000123553</span></td>
													<td><span>Nov 22th 2023 09:21 AM</span></td>
													<td><span>James John</span></td>
													<td><span>USA</span></td>
													<td><span>₹ 85,4</span></td>
													<td><span class="badge badge-rounded badge-outline-success badge-lg">Delivered</span></td>
													<td>
														<div>
															<a href="javascript:void(0)" class="btn-link me-1">View details</a>
														</div>
													</td>
													<td>
														<div class="dropdown">
															<div class="btn-link" data-bs-toggle="dropdown" >
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																</svg>
															</div>
															<div class="dropdown-menu dropdown-menu-right" style="">
																<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																<a class="dropdown-item" href="javascript:void(0);">Delete</a>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
															<label class="form-check-label" for="customCheckBox100"></label>
														</div>
													</td>
													<td><span>#000123456</span></td>
													<td><span>Nov 21th 2020 09:21 AM</span></td>
													<td><span>James Sitepu</span></td>
													<td><span>Corner One St<br> Park London</span></td>
													<td><span>₹ 21,4</span></td>
													<td><span class="badge badge-rounded badge-outline-primary badge-lg">On Delivery</span></td>
													<td>
														<div>
															<a href="javascript:void(0)" class="btn-link me-1">Track</a>
															<a href="javascript:void(0)" class="btn-link text-dark ms-1">Cancel</a>
														</div>
													</td>
													<td>
														<div class="dropdown">
															<div class="btn-link" data-bs-toggle="dropdown" >
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																</svg>
															</div>
															<div class="dropdown-menu dropdown-menu-right" style="">
																<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																<a class="dropdown-item" href="javascript:void(0);">Delete</a>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
															<label class="form-check-label" for="customCheckBox100"></label>
														</div>
													</td>
													<td><span>#000123545</span></td>
													<td><span>Nov 22th 2023 09:21 AM</span></td>
													<td><span>Marquez Silaban</span></td>
													<td><span>Park, Orange St</span></td>
													<td><span>₹ 87,4</span></td>
													<td><span class="badge badge-rounded badge-outline-danger badge-lg">Canceled</span></td>
													<td>
														<div>
															<a href="javascript:void(0)" class="btn-link me-1">View details</a>
														</div>
													</td>
													<td>
														<div class="dropdown">
															<div class="btn-link" data-bs-toggle="dropdown" >
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																</svg>
															</div>
															<div class="dropdown-menu dropdown-menu-right" style="">
																<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																<a class="dropdown-item" href="javascript:void(0);">Delete</a>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
															<label class="form-check-label" for="customCheckBox100"></label>
														</div>
													</td>
													<td><span>#000123583</span></td>
													<td><span>Nov 22th 2023 09:21 AM</span></td>
													<td><span>Joseph David</span></td>
													<td><span>Center Park St</span></td>
													<td><span>₹ 88,4</span></td>
													<td><span class="badge badge-rounded badge-outline-success badge-lg">Delivered</span></td>
													<td>
														<div>
															<a href="javascript:void(0)" class="btn-link me-1">View details</a>
														</div>
													</td>
													<td>
														<div class="dropdown">
															<div class="btn-link" data-bs-toggle="dropdown" >
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																</svg>
															</div>
															<div class="dropdown-menu dropdown-menu-right" style="">
																<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																<a class="dropdown-item" href="javascript:void(0);">Delete</a>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
															<label class="form-check-label" for="customCheckBox100"></label>
														</div>
													</td>
													<td><span>#002123456</span></td>
													<td><span>Nov 21th 2020 09:21 AM</span></td>
													<td><span>Richard Elijah</span></td>
													<td><span>NA</span></td>
													<td><span>₹ 87,4</span></td>
													<td><span class="badge badge-rounded badge-outline-primary badge-lg">On Delivery</span></td>
													<td>
														<div>
															<a href="javascript:void(0)" class="btn-link me-1">Track</a>
															<a href="javascript:void(0)" class="btn-link text-dark ms-1">Cancel</a>
														</div>
													</td>
													<td>
														<div class="dropdown">
															<div class="btn-link" data-bs-toggle="dropdown" >
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																</svg>
															</div>
															<div class="dropdown-menu dropdown-menu-right" style="">
																<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																<a class="dropdown-item" href="javascript:void(0);">Delete</a>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="customCheckBox100" required="">
															<label class="form-check-label" for="customCheckBox100"></label>
														</div>
													</td>
													<td><span>#000223543</span></td>
													<td><span>Nov 22th 2023 09:21 AM</span></td>
													<td><span>Robert Silaban</span></td>
													<td><span>CA</span></td>
													<td><span>₹ 58,4</span></td>
													<td><span class="badge badge-rounded badge-outline-danger badge-lg">Canceled</span></td>
													<td>
														<div>
															<a href="javascript:void(0)" class="btn-link me-1">View details</a>
														</div>
													</td>
													<td>
														<div class="dropdown">
															<div class="btn-link" data-bs-toggle="dropdown" >
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																</svg>
															</div>
															<div class="dropdown-menu dropdown-menu-right" style="">
																<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																<a class="dropdown-item" href="javascript:void(0);">Delete</a>
															</div>
														</div>
													</td>
												</tr>
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
	</div>
		
        <!--**********************************
            Content body end
        ***********************************-->
		
      <?php include 'include/footer.php'; ?>
 