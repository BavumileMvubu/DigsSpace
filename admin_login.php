<?php
session_start();

// To check if the admin is already logged in
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: admin_panel.php'); // Goes to the admin dashboard
    exit;
}

// To check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate admin credentials
    $admin_username = 'admin'; // 
    $admin_password = 'adminpassword'; 
    
    if ($_POST['username'] === $admin_username && $_POST['password'] === $admin_password) {
        // Valid admin credentials; set a session variable
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin_panel.php'); // goes to the admin dashboard
        exit;
    } else {
        $error_message = 'Invalid credentials';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
    <link rel= "stylesheet" type="text/css" href="admin_login.css">
</head>
<body>
<div class="login-container">
        <div class="login-header">
            <h2>Admin Login</h2>
        </div>
        <?php if (isset($error_message)) echo '<p>' . $error_message . '</p>'; ?>
        <form method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>
            </div>
            <div class="form-group">
                <label for="admin_password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>
            </div>
            <div class="form-group">
                <input type="submit" class="login-btn" value="Login">
            </div>
        </form>
    </div>
</script>
</body>
</html>
