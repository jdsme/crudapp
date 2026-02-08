<?php

include_once("config.php");

// Check if the form was submitted
if (isset($_POST["submit"])) {
    // Retrieve the form data
    $username = $_POST["username"];
    $is_admin = 1;
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $password = $_POST["password"];
    $email = $_POST["email"];


    // Insert the user into the database
    $sql = "INSERT INTO users (username, is_admin, first_name, last_name, password, email) VALUES ('$username', '$is_admin','$firstname','$lastname','$password', '$email')";
    if (mysqli_query($conn, $sql)) {

   echo "<div class='alert alert-success'>Registration successful! Redirecting to login...</div>";
   header('Refresh: 1; URL = login.php');

    } else {
        echo "<div class='alert alert-error'>Error: " . mysqli_error($conn) . "</div>";
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">  
<head>  
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
    <title>Admin Registration | Dashboard</title>  
    <link rel="stylesheet" href="style.css">
</head>  
<body>    
    <div class="dashboard-header">
        <div class="header-content">
            <a href="#" class="logo">
                <div class="logo-icon">🔐</div>
                Admin Portal
            </a>
        </div>
    </div>

    <div class="form-container">
        <form method="post" action="">
            <h1 class="form-title">Admin Registration</h1>
            
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="firstname" required>
            </div>
            
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="lastname" required>
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" required>
            </div>
            
            <input type="submit" name="submit" value="Create Admin Account" class="btn btn-primary">
            
            <div class="text-center mt-3">
                <a href="login.php" style="color: var(--primary-light); text-decoration: none; font-weight: 600;">Already have an account? Login</a>
            </div>
        </form>
    </div>

    <div class="footer">
        <p>&copy; 2024 CRUD Dashboard System. All rights reserved.</p>
    </div>
</body>
</html>
