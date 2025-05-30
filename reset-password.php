<?php
session_start();
if (!isset($_SESSION['reset_email'])) {
    header("Location: page-login.php");
    exit();
}
?>

<form method="post" action="update-password.php">
    <h3>Reset Password</h3>
    <input type="password" name="new_password" placeholder="New Password" required><br><br>
    <input type="password" name="confirm_password" placeholder="Confirm Password" required><br><br>
    <button type="submit">Reset Password</button>
</form>
