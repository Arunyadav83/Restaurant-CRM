<?php
// include 'db.php';

// Database configuration
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'arogya';

// Create connection
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check connection
if ($conn->connect_error) {
	error_log("Database connection failed: " . $conn->connect_error);
	die(json_encode(['success' => false, 'message' => 'Database connection failed']));
}


// include your DB connection file

$logoPath = 'uploads/default_logo.png'; // fallback logo

$query = "SELECT logo FROM settings LIMIT 1";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
	if (!empty($row['logo'])) {
		$logoPath = $row['logo'];
	}
}

$faviconPath = 'uploads/default-favicon.png';

$query = "SELECT favicon FROM settings LIMIT 1";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (!empty($row['favicon'])) {
        $faviconPath = $row['favicon'];
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Salero:Restaurant Admin Bootstrap 5 Template">
	<meta property="og:title" content="Salero:Restaurant Admin Bootstrap 5 Template">
	<meta property="og:description" content="Salero:Restaurant Admin Bootstrap 5 Template">
	<meta property="og:image" content="page-error-404.html">
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>Sri Arogya Hotel</title><link rel="shortcut icon" type="image/png" href="<?php echo htmlspecialchars($faviconPath); ?>">


	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="vendor/swiper/css/swiper-bundle.min.css" rel="stylesheet">
	<link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

	<link rel="stylesheet" href="vendor/swiper/css/swiper-bundle.min.css">
	<link rel="stylesheet" href="vendor/dotted-map/css/contrib/jquery.smallipop-0.3.0.min.css" type="text/css" media="all" />
	<link href="vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<!-- Bootstrap CSS -->
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->

	<!-- Bootstrap JS Bundle (includes Popper) -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->

	<!-- tagify-css -->

	<!-- Style css -->
	<link href="css/style.css" rel="stylesheet">
	<style>
	/* .nav-header {
			display: flex;
			align-items: center;
			justify-content: space-between;
			height: 60px;
			/* adjust navbar height as needed */
			padding: 0 15px;
			background-color: #fff;
			/* or your navbar color */
			box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
		} */

		.brand-logo img {
			width: 45px;
			height: 45px;
			object-fit: cover;
			border-radius: 50%;
			display: block;
		}
	</style>

</head>

<body>

	<!--*******************
        Preloader start
    ********************-->
	<!-- <div id="preloader">
		<div class="loader-wrapper">
			<div class="loader-box">
				<div class="icon">
				  <i class="fas fa-utensils"></i>
				</div>
			</div>
		</div>
	</div>	 -->
	<div id="preloader">
		<div class="loader-wrapper">
			<div class="loader-box">
				<div class="icon">
					<i class="fas fa-utensils"></i>
				</div>
			</div>
		</div>
	</div>

	<!--*******************
        Preloader end
    ********************-->

	<!--**********************************
        Main wrapper start
    ***********************************-->
	<div id="main-wrapper">
		<!--**********************************
            Nav header start
        ***********************************-->
		<div class="nav-header">
			<a href="index.php" class="brand-logo">
				<img src="<?php echo htmlspecialchars($logoPath); ?>" width="200" class="rounded-circle user_img" alt="Logo">
			</a>
			<div class="nav-control">
				<div class="hamburger">
					<span class="line"></span><span class="line"></span><span class="line"></span>
				</div>
			</div>
		</div>



		<!--**********************************
            Nav header end
        ***********************************-->

		<!--**********************************
            Chat box start
        ***********************************-->
		<div class="chatbox">
			<div class="chatbox-close"></div>
			<div class="custom-tab-1">

				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="tab" href="#notes">Notes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="tab" href="#alerts">Alerts</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" data-bs-toggle="tab" href="#chat">Chat</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade active show" id="chat">
						<div class="card mb-sm-3 mb-md-0 contacts_card dz-chat-user-box">
							<div class="card-header chat-list-header text-center">
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
											<rect fill="#000000" opacity="1.0" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1" />
										</g>
									</svg></a>
								<div>
									<h6 class="mb-1">Chat List</h6>
									<p class="mb-0">Show All</p>
								</div>
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<circle fill="#000000" cx="5" cy="12" r="2" />
											<circle fill="#000000" cx="12" cy="12" r="2" />
											<circle fill="#000000" cx="19" cy="12" r="2" />
										</g>
									</svg></a>
							</div>
							<div class="card-body contacts_body p-0 dz-scroll  " id="DZ_W_Contacts_Body">
								<ul class="contacts">
									<li class="name-first-letter">A</li>
									<li class="active dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Archie Parker</span>
												<p>Kalid is online</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Alfie Mason</span>
												<p>Taherah left 7 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>AharlieKane</span>
												<p>Sami is online</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Athan Jacoby</span>
												<p>Nargis left 30 mins ago</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">B</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Bashid Samim</span>
												<p>Rashid left 50 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dz- -user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Breddie Ronan</span>
												<p>Kalid is online</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Ceorge Carson</span>
												<p>Taherah left 7 mins ago</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">D</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Darry Parker</span>
												<p>Sami is online</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Denry Hunter</span>
												<p>Nargis left 30 mins ago</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">J</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Jack Ronan</span>
												<p>Rashid left 50 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Jacob Tucker</span>
												<p>Kalid is online</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>James Logan</span>
												<p>Taherah left 7 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Joshua Weston</span>
												<p>Sami is online</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">O</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Oliver Acker</span>
												<p>Nargis left 30 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Oscar Weston</span>
												<p>Rashid left 50 mins ago</p>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="card chat dz-chat-history-box d-none">
							<div class="card-header chat-list-header text-center">
								<a href="javascript:void(0);" class="dz-chat-history-back">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24" />
											<rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1" />
											<path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) " />
										</g>
									</svg>
								</a>
								<div>
									<h6 class="mb-1">Chat with Khelesh</h6>
									<p class="mb-0 text-success">Online</p>
								</div>
								<div class="dropdown">
									<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<circle fill="#000000" cx="5" cy="12" r="2" />
												<circle fill="#000000" cx="12" cy="12" r="2" />
												<circle fill="#000000" cx="19" cy="12" r="2" />
											</g>
										</svg></a>
									<ul class="dropdown-menu dropdown-menu-end">
										<li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> View profile</li>
										<li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to btn-close friends</li>
										<li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to group</li>
										<li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
									</ul>
								</div>
							</div>
							<div class="card-body msg_card_body dz-scroll" id="DZ_W_Contacts_Body3">
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
									<div class="msg_cotainer">
										Hi, how are you samim?
										<span class="msg_time">8:40 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										Hi Khalid i am good tnx how about you?
										<span class="msg_time_send">8:55 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
									<div class="msg_cotainer">
										I am good too, thank you for your chat template
										<span class="msg_time">9:00 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										You are welcome
										<span class="msg_time_send">9:05 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
									<div class="msg_cotainer">
										I am looking for your next templates
										<span class="msg_time">9:07 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										Ok, thank you have a good day
										<span class="msg_time_send">9:10 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
									<div class="msg_cotainer">
										Bye, see you
										<span class="msg_time">9:12 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
									<div class="msg_cotainer">
										Hi, how are you samim?
										<span class="msg_time">8:40 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										Hi Khalid i am good tnx how about you?
										<span class="msg_time_send">8:55 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
									<div class="msg_cotainer">
										I am good too, thank you for your chat template
										<span class="msg_time">9:00 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										You are welcome
										<span class="msg_time_send">9:05 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
									<div class="msg_cotainer">
										I am looking for your next templates
										<span class="msg_time">9:07 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										Ok, thank you have a good day
										<span class="msg_time_send">9:10 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
									<div class="msg_cotainer">
										Bye, see you
										<span class="msg_time">9:12 AM, Today</span>
									</div>
								</div>
							</div>
							<div class="card-footer type_msg">
								<div class="input-group">
									<textarea class="form-control" placeholder="Type your message..."></textarea>
									<div class="input-group-append">
										<button type="button" class="btn btn-primary"><i class="fa fa-location-arrow"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="alerts">
						<div class="card mb-sm-3 mb-md-0 contacts_card">
							<div class="card-header chat-list-header text-center">
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<circle fill="#000000" cx="5" cy="12" r="2" />
											<circle fill="#000000" cx="12" cy="12" r="2" />
											<circle fill="#000000" cx="19" cy="12" r="2" />
										</g>
									</svg></a>
								<div>
									<h6 class="mb-1">Notications</h6>
									<p class="mb-0">Show All</p>
								</div>
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="1" />
											<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
										</g>
									</svg></a>
							</div>
							<div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body1">
								<ul class="contacts">
									<li class="name-first-letter">SEVER STATUS</li>
									<li class="active">
										<div class="d-flex bd-highlight">
											<div class="img_cont primary">KK</div>
											<div class="user_info">
												<span>David Nester Birthday</span>
												<p class="text-primary">Today</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">SOCIAL</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="img_cont success">RU</div>
											<div class="user_info">
												<span>Perfection Simplified</span>
												<p>Jame Smith commented on your status</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">SEVER STATUS</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="img_cont primary">AU</div>
											<div class="user_info">
												<span>AharlieKane</span>
												<p>Sami is online</p>
											</div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="img_cont info">MO</div>
											<div class="user_info">
												<span>Athan Jacoby</span>
												<p>Nargis left 30 mins ago</p>
											</div>
										</div>
									</li>
								</ul>
							</div>
							<div class="card-footer"></div>
						</div>
					</div>
					<div class="tab-pane fade" id="notes">
						<div class="card mb-sm-3 mb-md-0 note_card">
							<div class="card-header chat-list-header text-center">
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
											<rect fill="#000000" opacity="1.0" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1" />
										</g>
									</svg></a>
								<div>
									<h6 class="mb-1">Notes</h6>
									<p class="mb-0">Add New Nots</p>
								</div>
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="1" />
											<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
										</g>
									</svg></a>
							</div>
							<div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body2">
								<ul class="contacts">
									<li class="active">
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>New order placed..</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ms-auto">
												<a href="javascript:void(0);" class="btn btn-primary btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
												<a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>Youtube, a video-sharing website..</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ms-auto">
												<a href="javascript:void(0);" class="btn btn-primary btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
												<a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>john just buy your product..</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ms-auto">
												<a href="javascript:void(0);" class="btn btn-primary btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
												<a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>Athan Jacoby</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ms-auto">
												<a href="javascript:void(0);" class="btn btn-primary btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
												<a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--**********************************
            Chat box End
        ***********************************-->

		<!--**********************************
            Header start
        ***********************************-->
		<div class="header">
			<div class="header-content">
				<nav class="navbar navbar-expand">
					<div class="collapse navbar-collapse justify-content-between">
						<div class="header-left">
							<div class="dashboard_bar">
								Dashboard
							</div>
						</div>
						<div class="header-right d-flex align-items-center">
							<div class="input-group search-area">
								<input type="text" class="form-control" placeholder="Search here...">
								<span class="input-group-text"><a href="javascript:void(0)">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_1_450)">
												<path opacity="0.3" d="M14.2929 16.7071C13.9024 16.3166 13.9024 15.6834 14.2929 15.2929C14.6834 14.9024 15.3166 14.9024 15.7071 15.2929L19.7071 19.2929C20.0976 19.6834 20.0976 20.3166 19.7071 20.7071C19.3166 21.0976 18.6834 21.0976 18.2929 20.7071L14.2929 16.7071Z" fill="#452B90" />
												<path d="M11 16C13.7614 16 16 13.7614 16 11C16 8.23859 13.7614 6.00002 11 6.00002C8.23858 6.00002 6 8.23859 6 11C6 13.7614 8.23858 16 11 16ZM11 18C7.13401 18 4 14.866 4 11C4 7.13402 7.13401 4.00002 11 4.00002C14.866 4.00002 18 7.13402 18 11C18 14.866 14.866 18 11 18Z" fill="#452B90" />
											</g>
											<defs>
												<clipPath id="clip0_1_450">
													<rect width="24" height="24" fill="white" />
												</clipPath>
											</defs>
										</svg>
									</a></span>
							</div>
							<ul class="navbar-nav">
								<li class="nav-item dropdown notification_dropdown">
									<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
										<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M17.5 12H19C19.8284 12 20.5 12.6716 20.5 13.5C20.5 14.3284 19.8284 15 19 15H6C5.17157 15 4.5 14.3284 4.5 13.5C4.5 12.6716 5.17157 12 6 12H7.5L8.05827 6.97553C8.30975 4.71226 10.2228 3 12.5 3C14.7772 3 16.6903 4.71226 16.9417 6.97553L17.5 12Z" fill="#222B40" />
											<path opacity="0.3" d="M14.5 18C14.5 16.8954 13.6046 16 12.5 16C11.3954 16 10.5 16.8954 10.5 18C10.5 19.1046 11.3954 20 12.5 20C13.6046 20 14.5 19.1046 14.5 18Z" fill="#222B40" />
										</svg>
										<span class="badge light text-white bg-primary rounded-circle">18</span>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<div id="DZ_W_Notification1" class="widget-media dz-scroll p-2" style="height:380px;">
											<ul class="timeline">
												<li>
													<div class="timeline-panel">
														<div class="media me-2">
															<img alt="image" width="50" src="images/avatar/1.jpg">
														</div>
														<div class="media-body">
															<h6 class="mb-1">Dr sultads Send you Photo</h6>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="media me-2 media-info">
															KG
														</div>
														<div class="media-body">
															<h6 class="mb-1">Resport created successfully</h6>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="media me-2 media-success">
															<i class="fa fa-home"></i>
														</div>
														<div class="media-body">
															<h6 class="mb-1">Reminder : Treatment Time!</h6>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="media me-2">
															<img alt="image" width="50" src="images/avatar/1.jpg">
														</div>
														<div class="media-body">
															<h6 class="mb-1">Dr sultads Send you Photo</h6>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="media me-2 media-danger">
															KG
														</div>
														<div class="media-body">
															<h6 class="mb-1">Resport created successfully</h6>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="media me-2 media-primary">
															<i class="fa fa-home"></i>
														</div>
														<div class="media-body">
															<h6 class="mb-1">Reminder : Treatment Time!</h6>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="media me-2">
															<img alt="image" width="50" src="images/avatar/1.jpg">
														</div>
														<div class="media-body">
															<h6 class="mb-1">Dr sultads Send you Photo</h6>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="media me-2 media-info">
															KG
														</div>
														<div class="media-body">
															<h6 class="mb-1">Resport created successfully</h6>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="media me-2 media-success">
															<i class="fa fa-home"></i>
														</div>
														<div class="media-body">
															<h6 class="mb-1">Reminder : Treatment Time!</h6>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="media me-2">
															<img alt="image" width="50" src="images/avatar/1.jpg">
														</div>
														<div class="media-body">
															<h6 class="mb-1">Dr sultads Send you Photo</h6>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="media me-2 media-danger">
															KG
														</div>
														<div class="media-body">
															<h6 class="mb-1">Resport created successfully</h6>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="media me-2 media-primary">
															<i class="fa fa-home"></i>
														</div>
														<div class="media-body">
															<h6 class="mb-1">Reminder : Treatment Time!</h6>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li>
											</ul>
										</div>
										<a class="all-notification" href="javascript:void(0);">See all notifications <i class="ti-arrow-end"></i></a>
									</div>
								</li>
								<li class="nav-item dropdown notification_dropdown">
									<a class="nav-link bell-link" href="javascript:void(0);">
										<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_1_463)">
												<path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M6.5 2H18.5C19.0523 2 19.5 2.44772 19.5 3V13C19.5 13.5523 19.0523 14 18.5 14H6.5C5.94772 14 5.5 13.5523 5.5 13V3C5.5 2.44772 5.94772 2 6.5 2ZM14.3 4C13.6562 4 12.9033 4.72985 12.5 5.2C12.0967 4.72985 11.3438 4 10.7 4C9.5604 4 8.9 4.88887 8.9 6.02016C8.9 7.27339 10.1 8.6 12.5 10C14.9 8.6 16.1 7.3 16.1 6.1C16.1 4.96871 15.4396 4 14.3 4Z" fill="#222B40" />
												<path fill-rule="evenodd" clip-rule="evenodd" d="M4.29275 6.57254L12.5 12.5L20.7073 6.57254C20.9311 6.41086 21.2437 6.46127 21.4053 6.68514C21.4669 6.77034 21.5 6.87278 21.5 6.97788V17C21.5 18.1046 20.6046 19 19.5 19H5.5C4.39543 19 3.5 18.1046 3.5 17V6.97788C3.5 6.70174 3.72386 6.47788 4 6.47788C4.10511 6.47788 4.20754 6.511 4.29275 6.57254Z" fill="#222B40" />
											</g>
											<defs>
												<clipPath id="clip0_1_463">
													<rect width="24" height="24" fill="white" transform="translate(0.5)" />
												</clipPath>
											</defs>
										</svg>
										<span class="badge light text-white bg-secondary rounded-circle">01</span>
									</a>
								</li>
								<li class="nav-item dropdown notification_dropdown">
									<a class="nav-link " href="javascript:void(0);" data-bs-toggle="dropdown">
										<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M3.5 16.87V9.257H21.5V16.931C21.5 20.07 19.5241 22 16.3628 22H8.62733C5.49561 22 3.5 20.03 3.5 16.87ZM8.45938 14.41C8.00494 14.431 7.62953 14.07 7.60977 13.611C7.60977 13.151 7.96542 12.771 8.41987 12.75C8.86443 12.75 9.22997 13.101 9.23985 13.55C9.2596 14.011 8.90395 14.391 8.45938 14.41ZM12.5198 14.41C12.0653 14.431 11.6899 14.07 11.6701 13.611C11.6701 13.151 12.0258 12.771 12.4802 12.75C12.9248 12.75 13.2903 13.101 13.3002 13.55C13.32 14.011 12.9643 14.391 12.5198 14.41ZM16.5505 18.09C16.096 18.08 15.7305 17.7 15.7305 17.24C15.7206 16.78 16.0862 16.401 16.5406 16.391H16.5505C17.0148 16.391 17.3902 16.771 17.3902 17.24C17.3902 17.71 17.0148 18.09 16.5505 18.09ZM11.6701 17.24C11.6899 17.7 12.0653 18.061 12.5198 18.04C12.9643 18.021 13.32 17.641 13.3002 17.181C13.2903 16.731 12.9248 16.38 12.4802 16.38C12.0258 16.401 11.6701 16.78 11.6701 17.24ZM7.59989 17.24C7.61965 17.7 7.99506 18.061 8.44951 18.04C8.89407 18.021 9.24973 17.641 9.22997 17.181C9.22009 16.731 8.85456 16.38 8.40999 16.38C7.95554 16.401 7.59989 16.78 7.59989 17.24ZM15.7404 13.601C15.7404 13.141 16.096 12.771 16.5505 12.761C16.9951 12.761 17.3507 13.12 17.3705 13.561C17.3804 14.021 17.0247 14.401 16.5801 14.41C16.1257 14.42 15.7503 14.07 15.7404 13.611V13.601Z" fill="#222B40" />
											<path opacity="0.4" d="M3.50336 9.2569C3.5162 8.6699 3.5656 7.5049 3.65846 7.1299C4.13267 5.0209 5.74298 3.6809 8.04485 3.4899H16.9559C19.238 3.6909 20.8681 5.0399 21.3423 7.1299C21.4342 7.4949 21.4836 8.6689 21.4964 9.2569H3.50336Z" fill="#222B40" />
											<path d="M8.80489 6.59C9.23958 6.59 9.56559 6.261 9.56559 5.82V2.771C9.56559 2.33 9.23958 2 8.80489 2C8.3702 2 8.04419 2.33 8.04419 2.771V5.82C8.04419 6.261 8.3702 6.59 8.80489 6.59Z" fill="#222B40" />
											<path d="M16.195 6.59C16.6198 6.59 16.9557 6.261 16.9557 5.82V2.771C16.9557 2.33 16.6198 2 16.195 2C15.7603 2 15.4343 2.33 15.4343 2.771V5.82C15.4343 6.261 15.7603 6.59 16.195 6.59Z" fill="#222B40" />
										</svg>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<div id="DZ_W_TimeLine02" class="widget-timeline dz-scroll style-1 p-3 height370">
											<ul class="timeline">
												<li>
													<div class="timeline-badge primary"></div>
													<a class="timeline-panel text-muted" href="javascript:void(0);">
														<span>10 minutes ago</span>
														<h6 class="mb-0">Youtube, a video-sharing website, goes live <strong class="text-primary">$500</strong>.</h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge info">
													</div>
													<a class="timeline-panel text-muted" href="javascript:void(0);">
														<span>20 minutes ago</span>
														<h6 class="mb-0">New order placed <strong class="text-info">#XF-2356.</strong></h6>
														<p class="mb-0">Quisque a consequat ante Sit amet magna at volutapt...</p>
													</a>
												</li>
												<li>
													<div class="timeline-badge danger">
													</div>
													<a class="timeline-panel text-muted" href="javascript:void(0);">
														<span>30 minutes ago</span>
														<h6 class="mb-0">john just buy your product <strong class="text-warning">Sell $250</strong></h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge success">
													</div>
													<a class="timeline-panel text-muted" href="javascript:void(0);">
														<span>15 minutes ago</span>
														<h6 class="mb-0">StumbleUpon is acquired by eBay. </h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge warning">
													</div>
													<a class="timeline-panel text-muted" href="javascript:void(0);">
														<span>20 minutes ago</span>
														<h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge dark">
													</div>
													<a class="timeline-panel text-muted" href="javascript:void(0);">
														<span>20 minutes ago</span>
														<h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</li>
								<li class="nav-item ps-3">
									<div class="dropdown header-profile2">
										<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											<div class="header-info2 d-flex align-items-center">
												<div class="header-media">
													<img src="images/user.jpg" alt="">
												</div>
											</div>
										</a>
										<div class="dropdown-menu dropdown-menu-end" style="">
											<div class="card border-0 mb-0">
												<div class="card-header py-2">
													<div class="products">
														<img src="images/user.jpg" class="avatar avatar-md" alt="">
														<div>
															<h6>Arogya Hotel</h6>
															<span>Admin</span>
														</div>
													</div>
												</div>
												<div class="card-body px-0 py-2">
													<a href="edit-profile.php" class="dropdown-item ai-icon ">
														<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path fill-rule="evenodd" clip-rule="evenodd" d="M11.9848 15.3462C8.11714 15.3462 4.81429 15.931 4.81429 18.2729C4.81429 20.6148 8.09619 21.2205 11.9848 21.2205C15.8524 21.2205 19.1543 20.6348 19.1543 18.2938C19.1543 15.9529 15.8733 15.3462 11.9848 15.3462Z" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
															<path fill-rule="evenodd" clip-rule="evenodd" d="M11.9848 12.0059C14.5229 12.0059 16.58 9.94779 16.58 7.40969C16.58 4.8716 14.5229 2.81445 11.9848 2.81445C9.44667 2.81445 7.38857 4.8716 7.38857 7.40969C7.38 9.93922 9.42381 11.9973 11.9524 12.0059H11.9848Z" stroke="var(--primary)" stroke-width="1.42857" stroke-linecap="round" stroke-linejoin="round" />
														</svg>

														<span class="ms-2">Profile </span>
													</a>

													<!-- <a href="javascript:void(0);" class="dropdown-item ai-icon ">
														<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M17.9026 8.85114L13.4593 12.4642C12.6198 13.1302 11.4387 13.1302 10.5992 12.4642L6.11844 8.85114" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
														<path fill-rule="evenodd" clip-rule="evenodd" d="M16.9089 21C19.9502 21.0084 22 18.5095 22 15.4384V8.57001C22 5.49883 19.9502 3 16.9089 3H7.09114C4.04979 3 2 5.49883 2 8.57001V15.4384C2 18.5095 4.04979 21.0084 7.09114 21H16.9089Z" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>

														<span class="ms-2">Message </span>
													</a> -->
													<a href="email-inbox.html" class="dropdown-item ai-icon ">
														<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path fill-rule="evenodd" clip-rule="evenodd" d="M12 17.8476C17.6392 17.8476 20.2481 17.1242 20.5 14.2205C20.5 11.3188 18.6812 11.5054 18.6812 7.94511C18.6812 5.16414 16.0452 2 12 2C7.95477 2 5.31885 5.16414 5.31885 7.94511C5.31885 11.5054 3.5 11.3188 3.5 14.2205C3.75295 17.1352 6.36177 17.8476 12 17.8476Z" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
															<path d="M14.3888 20.8572C13.0247 22.372 10.8967 22.3899 9.51947 20.8572" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
														</svg>

														<span class="ms-2">Notification </span>
													</a>
												</div>
												<div class="card-footer px-0 py-2">
													<a href="javascript:void(0);" class="dropdown-item ai-icon ">
														<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path fill-rule="evenodd" clip-rule="evenodd" d="M20.8066 7.62355L20.1842 6.54346C19.6576 5.62954 18.4907 5.31426 17.5755 5.83866V5.83866C17.1399 6.09528 16.6201 6.16809 16.1307 6.04103C15.6413 5.91396 15.2226 5.59746 14.9668 5.16131C14.8023 4.88409 14.7139 4.56833 14.7105 4.24598V4.24598C14.7254 3.72916 14.5304 3.22834 14.17 2.85761C13.8096 2.48688 13.3145 2.2778 12.7975 2.27802H11.5435C11.0369 2.27801 10.5513 2.47985 10.194 2.83888C9.83666 3.19791 9.63714 3.68453 9.63958 4.19106V4.19106C9.62457 5.23686 8.77245 6.07675 7.72654 6.07664C7.40418 6.07329 7.08843 5.98488 6.8112 5.82035V5.82035C5.89603 5.29595 4.72908 5.61123 4.20251 6.52516L3.53432 7.62355C3.00838 8.53633 3.31937 9.70255 4.22997 10.2322V10.2322C4.82187 10.574 5.1865 11.2055 5.1865 11.889C5.1865 12.5725 4.82187 13.204 4.22997 13.5457V13.5457C3.32053 14.0719 3.0092 15.2353 3.53432 16.1453V16.1453L4.16589 17.2345C4.41262 17.6797 4.82657 18.0082 5.31616 18.1474C5.80575 18.2865 6.33061 18.2248 6.77459 17.976V17.976C7.21105 17.7213 7.73116 17.6515 8.21931 17.7821C8.70746 17.9128 9.12321 18.233 9.37413 18.6716C9.53867 18.9488 9.62708 19.2646 9.63043 19.5869V19.5869C9.63043 20.6435 10.4869 21.5 11.5435 21.5H12.7975C13.8505 21.5 14.7055 20.6491 14.7105 19.5961V19.5961C14.7081 19.088 14.9088 18.6 15.2681 18.2407C15.6274 17.8814 16.1154 17.6806 16.6236 17.6831C16.9451 17.6917 17.2596 17.7797 17.5389 17.9393V17.9393C18.4517 18.4653 19.6179 18.1543 20.1476 17.2437V17.2437L20.8066 16.1453C21.0617 15.7074 21.1317 15.1859 21.0012 14.6963C20.8706 14.2067 20.5502 13.7893 20.111 13.5366V13.5366C19.6717 13.2839 19.3514 12.8665 19.2208 12.3769C19.0902 11.8872 19.1602 11.3658 19.4153 10.9279C19.5812 10.6383 19.8213 10.3981 20.111 10.2322V10.2322C21.0161 9.70283 21.3264 8.54343 20.8066 7.63271V7.63271V7.62355Z" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
															<circle cx="12.175" cy="11.889" r="2.63616" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
														</svg>

														<span class="ms-2">Settings </span>
													</a>
													<a href="page-login.php" class="dropdown-item ai-icon">
														<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
															<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
															<polyline points="16 17 21 12 16 7"></polyline>
															<line x1="21" y1="12" x2="9" y2="12"></line>
														</svg>
														<span class="ms-2">Logout </span>
													</a>
												</div>
											</div>

										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
		<!--**********************************
            Header end ti-comment-alt
        ***********************************-->