<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arogya";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check DB connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Configuration for SMTP
require 'vendor/autoload.php'; // Include PHPMailer

$loginError = "";
$resetError = "";
$resetSuccess = false;
$showOtpForm = false;
$showResetForm = false;
$emailSent = false;

// Login Logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['register']) && !isset($_POST['forgot_password'])) {
 
    $email = trim($_POST['email'] ?? '');
    $pass = trim($_POST['password'] ?? '');

    // Prepare SQL
    $stmt = $conn->prepare("SELECT id, email, password FROM admin WHERE email = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($pass, $row['password'])) {
            // Login success
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            header("Location: index.php");
            exit();
        } else {
            $loginError = "Invalid email or password.";
        }
    } else {
        $loginError = "Invalid email or password.";
    }
    $stmt->close();
}

// Registration Logic
if (isset($_POST['register'])) {
    $fullname = trim($_POST['fullname'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirmPassword = trim($_POST['confirm_password'] ?? '');

    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match.');</script>";
    } else {
        $checkStmt = $conn->prepare("SELECT id FROM admin WHERE email = ?");
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            echo "<script>alert('Email already registered.');</script>";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insertStmt = $conn->prepare("INSERT INTO admin (name, username, email, password) VALUES (?, ?, ?, ?)");
            $insertStmt->bind_param("ssss", $fullname, $username, $email, $hashedPassword);

            if ($insertStmt->execute()) {
                echo "<script>alert('Account created successfully. You can now login.');</script>";
            } else {
                echo "<script>alert('Error: " . $insertStmt->error . "');</script>";
            }
            $insertStmt->close();
        }
        $checkStmt->close();
    }
}

// Forgot Password Logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['forgot_password'])) {
    $email = trim($_POST['email'] ?? '');
    
    if (empty($email)) {
        $resetError = "Please enter an email.";
    } else {
        $stmt = $conn->prepare("SELECT id FROM admin WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Generate OTP (6 digits)
            $otp = rand(100000, 999999);
            $_SESSION['reset_otp'] = $otp;
            $_SESSION['reset_email'] = $email;
            $_SESSION['otp_expiry'] = time() + (5 * 60); // OTP valid for 5 minutes
            
            // Send OTP via email using SMTP
            $mail = new PHPMailer\PHPMailer\PHPMailer(true);
            
            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host       = 'smtp.hostinger.com'; // Your SMTP server
                $mail->SMTPAuth   = true;
                $mail->Username   = 'arun.bhairi@ultrakeyit.com'; // SMTP username
                $mail->Password   = 'Arun@1234'; // SMTP password
                $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;
                
                //Recipients
                $mail->setFrom('arun.bhairi@ultrakeyit.com', 'Sri Arogya Hotel');
                $mail->addAddress($email);
                
                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Password Reset OTP';
                $mail->Body    = "Your OTP for password reset is: <b>$otp</b><br>This OTP is valid for 5 minutes.";
                $mail->AltBody = "Your OTP for password reset is: $otp\nThis OTP is valid for 5 minutes.";
                
                $mail->send();
                $emailSent = true;
                $showOtpForm = true;
            } catch (Exception $e) {
                $resetError = "Failed to send OTP. Please try again later.";
                error_log("Mailer Error: " . $mail->ErrorInfo);
            }
        } else {
            $resetError = "Email not found.";
        }
        $stmt->close();
    }
}

// OTP Verification Logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verify_otp'])) {
    $userOtp = trim($_POST['otp'] ?? '');
    $storedOtp = $_SESSION['reset_otp'] ?? null;
    $otpExpiry = $_SESSION['otp_expiry'] ?? 0;
    
    if (empty($userOtp)) {
        $resetError = "Please enter the OTP.";
        $showOtpForm = true;
    } elseif ($otpExpiry < time()) {
        $resetError = "OTP has expired. Please request a new one.";
        unset($_SESSION['reset_otp'], $_SESSION['otp_expiry']);
        $showOtpForm = false;
    } elseif ($userOtp != $storedOtp) {
        $resetError = "Invalid OTP. Please try again.";
        $showOtpForm = true;
    } else {
        // OTP verified successfully
        $showResetForm = true;
        unset($_SESSION['reset_otp'], $_SESSION['otp_expiry']);
    }
}

// Password Reset Logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reset_password'])) {
    $newPassword = trim($_POST['new_password'] ?? '');
    $confirmPassword = trim($_POST['confirm_password'] ?? '');
    $email = $_SESSION['reset_email'] ?? '';
    
    if (empty($newPassword) || empty($confirmPassword)) {
        $resetError = "Please enter both password fields.";
        $showResetForm = true;
    } elseif ($newPassword !== $confirmPassword) {
        $resetError = "Passwords do not match.";
        $showResetForm = true;
    } elseif (empty($email)) {
        $resetError = "Session expired. Please start the process again.";
        $showResetForm = false;
    } else {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE admin SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $hashedPassword, $email);
        
        if ($stmt->execute()) {
            $resetSuccess = true;
            unset($_SESSION['reset_email']);
        } else {
            $resetError = "Error updating password.";
            $showResetForm = true;
        }
        $stmt->close();
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

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
    <title>Sri Arogya Hotel</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/avatar/favicon.png">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        /* Custom styles for better tab navigation */
        .nav-tabs {
            display: none; /* Hide the tab headers */
        }
        
        .tab-content {
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .forgot-password-link {
            cursor: pointer;
            color: #0d6efd;
            text-decoration: none;
        }
        
        .forgot-password-link:hover {
            text-decoration: underline;
        }
        
        .back-to-login {
            cursor: pointer;
            color: #0d6efd;
            margin-top: 15px;
            display: inline-block;
        }
        
        .dz-form {
            max-width: 400px;
            margin: 0 auto;
        }
        
        .logo-header {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>

<body class="vh-100">
    <div class="page-wraper">
        <!-- Content -->
        <div class="browse-job login-style3">
            <div class="bg-img-fix overflow-hidden" style="background:#fff url(images/background/bg6.jpg); height: 100vh;">
                <div class="row gx-0">
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 vh-100 bg-login">
                        <div class="login-form style-2">
                            <div class="card-body">
                                <div class="logo-header">
                                    <a href="index.html" class="logo">
                                        <img src="images/avatar/logo_3.png" width="200" alt="" class="width-230 light-logo">
                                    </a>
                                </div>

                                <!-- Login Form (Default View) -->
                                <div id="login-form" class="tab-content <?php echo (!isset($_POST['forgot_password']) && !isset($_POST['verify_otp']) && !isset($_POST['reset_password']) && !isset($_POST['register'])) ? 'active' : ''; ?>">
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="dz-form pb-3">
                                        <h3 class="form-title m-t0">Sri Arogya Hotel</h3>
                                        <div class="dz-separator-outer m-b5">
                                            <div class="dz-separator bg-primary style-liner"></div>
                                        </div>
                                        <p>Enter your e-mail address and your password.</p>

                                        <?php if (!empty($loginError)): ?>
                                            <div class="alert alert-danger"><?php echo $loginError; ?></div>
                                        <?php endif; ?>

                                        <div class="form-group mb-3">
                                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                                        </div>

                                        <div class="form-group text-left mb-5 forget-main">
                                            <button type="submit" class="btn btn-primary">Sign Me In</button>
                                            <span class="form-check d-inline-block">
                                                <input type="checkbox" class="form-check-input" id="check1" name="remember">
                                                <label class="form-check-label" for="check1">Remember me</label>
                                            </span>

                                            <p class="text-end"><a class="forgot-password-link">Forgot Password?</a></p>
                                        </div>

                                        <div class="dz-social">
                                            <h5 class="form-title fs-20">Sign In With</h5>
                                            <ul class="dz-social-icon dz-border dz-social-icon-lg text-white">
                                                <li><a target="_blank" href="https://www.facebook.com/" class="fab fa-facebook-f btn-facebook"></a></li>
                                                <li><a target="_blank" href="https://www.google.com/" class="fab fa-google-plus-g btn-google-plus"></a></li>
                                                <li><a target="_blank" href="https://www.linkedin.com/" class="fab fa-linkedin-in btn-linkedin"></a></li>
                                                <li><a target="_blank" href="https://twitter.com/" class="fab fa-twitter btn-twitter"></a></li>
                                            </ul>
                                        </div>
                                    </form>

                                    <div class="text-center bottom">
                                        <button class="btn btn-primary button-md btn-block show-register">Create an account</button>
                                    </div>
                                </div>

                                <!-- Forgot Password Form -->
                                <div id="forgot-password-form" class="tab-content <?php echo (isset($_POST['forgot_password']) && !$showOtpForm && !$showResetForm) ? 'active' : ''; ?>" style="display: none;">
                                    <form class="dz-form" method="POST" action="">
                                        <h3 class="form-title m-t0">Forgot Password</h3>
                                        <div class="dz-separator-outer m-b5">
                                            <div class="dz-separator bg-primary style-liner"></div>
                                        </div>
                                        <p>Enter your e-mail address to receive a password reset OTP.</p>
                                        
                                        <?php if (!empty($resetError) && !$showOtpForm): ?>
                                            <div class="alert alert-danger"><?php echo $resetError; ?></div>
                                        <?php endif; ?>
                                        
                                        <div class="form-group mb-4">
                                            <input name="email" required class="form-control" placeholder="Email Address" type="email">
                                        </div>
                                        <div class="form-group clearfix text-left">
                                            <button class="btn btn-secondary back-to-login-btn" type="button">Back</button>
                                            <button class="btn btn-primary float-end" type="submit" name="forgot_password">Send OTP</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- OTP Verification Form -->
                                <div id="otp-form" class="tab-content <?php echo ($showOtpForm) ? 'active' : ''; ?>" style="display: none;">
                                    <form class="dz-form" method="POST" action="">
                                        <input type="hidden" name="verify_otp" value="1">
                                        <h3 class="form-title m-t0">Verify OTP</h3>
                                        <div class="dz-separator-outer m-b5">
                                            <div class="dz-separator bg-primary style-liner"></div>
                                        </div>
                                        
                                        <?php if ($emailSent): ?>
                                            <div class="alert alert-success">OTP has been sent to your email!</div>
                                        <?php endif; ?>
                                        
                                        <?php if (!empty($resetError) && $showOtpForm): ?>
                                            <div class="alert alert-danger"><?php echo $resetError; ?></div>
                                        <?php endif; ?>
                                        
                                        <p>We've sent a 6-digit OTP to your email. Please enter it below.</p>
                                        
                                        <div class="form-group mb-4">
                                            <input name="otp" required class="form-control" placeholder="Enter OTP" type="text" maxlength="6">
                                        </div>
                                        <div class="form-group clearfix text-left">
                                            <button class="btn btn-secondary back-to-forgot-btn" type="button">Back</button>
                                            <button class="btn btn-primary float-end" type="submit">Verify OTP</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Reset Password Form -->
                                <div id="reset-password-form" class="tab-content <?php echo ($showResetForm) ? 'active' : ''; ?>" style="display: none;">
                                    <form class="dz-form" method="POST" action="">
                                        <input type="hidden" name="reset_password" value="1">
                                        <h3 class="form-title m-t0">Reset Password</h3>
                                        <div class="dz-separator-outer m-b5">
                                            <div class="dz-separator bg-primary style-liner"></div>
                                        </div>
                                        
                                        <?php if ($resetSuccess): ?>
                                            <div class="alert alert-success">
                                                Password updated successfully! Redirecting to login page...
                                            </div>
                                            <script>
                                                setTimeout(function() {
                                                    showLoginForm();
                                                }, 3000);
                                            </script>
                                        <?php else: ?>
                                            <?php if (!empty($resetError)): ?>
                                                <div class="alert alert-danger"><?php echo $resetError; ?></div>
                                            <?php endif; ?>
                                            
                                            <div class="form-group mb-3">
                                                <input name="new_password" required class="form-control" placeholder="New Password" type="password">
                                            </div>
                                            <div class="form-group mb-4">
                                                <input name="confirm_password" required class="form-control" placeholder="Confirm New Password" type="password">
                                            </div>
                                            <div class="form-group clearfix text-left">
                                                <button class="btn btn-secondary back-to-login-btn" type="button">Cancel</button>
                                                <button class="btn btn-primary float-end" type="submit">Update Password</button>
                                            </div>
                                        <?php endif; ?>
                                    </form>
                                </div>

                                <!-- Registration Form -->
                                <div id="register-form" class="tab-content <?php echo (isset($_POST['register'])) ? 'active' : ''; ?>" style="display: none;">
                                    <form class="dz-form py-2" method="POST" action="">
                                        <h3 class="form-title">Sign Up</h3>
                                        <div class="form-group mt-3">
                                            <input name="fullname" required class="form-control" placeholder="Full Name" type="text">
                                        </div>
                                        <div class="form-group mt-3">
                                            <input name="username" required class="form-control" placeholder="User Name" type="text">
                                        </div>
                                        <div class="form-group mt-3">
                                            <input name="email" required class="form-control" placeholder="Email Address" type="email">
                                        </div>
                                        <div class="form-group mt-3">
                                            <input name="password" required class="form-control" placeholder="Password" type="password">
                                        </div>
                                        <div class="form-group mt-3 mb-3">
                                            <input name="confirm_password" required class="form-control" placeholder="Re-type Your Password" type="password">
                                        </div>
                                        <div class="form-group clearfix text-left">
                                            <button class="btn btn-secondary back-to-login-btn" type="button">Back to Login</button>
                                            <button class="btn btn-primary float-end" type="submit" name="register">Create Account</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="bottom-footer clearfix m-t10 m-b20 row text-center">
                                    <div class="col-lg-12 text-center">
                                        <span> © Copyright by <span class="heart"></span>
                                            <a href="javascript:void(0);">Ultrakey IT Solutions Private Limited </a> All rights reserved.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to show login form
        function showLoginForm() {
            document.getElementById('login-form').style.display = 'block';
            document.getElementById('forgot-password-form').style.display = 'none';
            document.getElementById('otp-form').style.display = 'none';
            document.getElementById('reset-password-form').style.display = 'none';
            document.getElementById('register-form').style.display = 'none';
        }
        
        // Function to show forgot password form
        function showForgotPasswordForm() {
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('forgot-password-form').style.display = 'block';
            document.getElementById('otp-form').style.display = 'none';
            document.getElementById('reset-password-form').style.display = 'none';
            document.getElementById('register-form').style.display = 'none';
        }
        
        // Function to show OTP form
        function showOtpForm() {
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('forgot-password-form').style.display = 'none';
            document.getElementById('otp-form').style.display = 'block';
            document.getElementById('reset-password-form').style.display = 'none';
            document.getElementById('register-form').style.display = 'none';
        }
        
        // Function to show reset password form
        function showResetPasswordForm() {
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('forgot-password-form').style.display = 'none';
            document.getElementById('otp-form').style.display = 'none';
            document.getElementById('reset-password-form').style.display = 'block';
            document.getElementById('register-form').style.display = 'none';
        }
        
        // Function to show register form
        function showRegisterForm() {
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('forgot-password-form').style.display = 'none';
            document.getElementById('otp-form').style.display = 'none';
            document.getElementById('reset-password-form').style.display = 'none';
            document.getElementById('register-form').style.display = 'block';
        }
        
        // Event listeners
        document.addEventListener('DOMContentLoaded', function() {
            <?php if (isset($_POST['forgot_password']) && !$showOtpForm && !$showResetForm): ?>
                showForgotPasswordForm();
            <?php elseif ($showOtpForm): ?>
                showOtpForm();
            <?php elseif ($showResetForm): ?>
                showResetPasswordForm();
            <?php elseif (isset($_POST['register'])): ?>
                showRegisterForm();
            <?php endif; ?>
            
            // Forgot password link
            document.querySelector('.forgot-password-link').addEventListener('click', function(e) {
                e.preventDefault();
                showForgotPasswordForm();
            });
            
            // Back to login buttons
            document.querySelectorAll('.back-to-login-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    showLoginForm();
                });
            });
            
            // Back to forgot password button
            document.querySelector('.back-to-forgot-btn')?.addEventListener('click', function() {
                showForgotPasswordForm();
            });
            
            // Show register form button
            document.querySelector('.show-register')?.addEventListener('click', function() {
                showRegisterForm();
            });
        });
    </script>

    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/deznav-init.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>
</html>