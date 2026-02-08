<?php
include_once("config.php");

if(isset($_POST['submit'])) {	
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $emp_desc = $_POST['emp_desc'];
    
    // Insert user data into database
    $result = mysqli_query($conn, "INSERT INTO users(first_name, last_name, email, mobile, emp_desc) VALUES('$first_name','$last_name','$email','$mobile','$emp_desc')");
    
    // Show message when user added
    echo "<div class='alert alert-success'>User added successfully! Redirecting...</div>";
    header('Refresh: 1; URL = viewusers.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add New User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-header">
        <div class="header-content">
            <a href="viewusers.php" class="logo">
                <div class="logo-icon">📊</div>
                User Management
            </a>
            <div class="user-info">
                <span class="user-badge">Administrator</span>
            </div>
        </div>
    </div>

    <div class="form-container">
        <form method="post" action="add.php">
            <h1 class="form-title">Add New User</h1>
            
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" required>
            </div>
            
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" required>
            </div>
            
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label>Mobile Number</label>
                <input type="text" name="mobile" required>
            </div>
            
            <div class="form-group">
                <label>Employee Description</label>
                <textarea name="emp_desc" placeholder="e.g., Expert in programming and systems analysis" required></textarea>
            </div>
            
            <input type="submit" name="submit" value="Add User" class="btn btn-primary">
            
            <div class="text-center mt-3">
                <a href="viewusers.php" class="home-link">← Back to Dashboard</a>
            </div>
        </form>
    </div>

    <div class="footer">
        <p>&copy; 2024 CRUD Dashboard System. All rights reserved.</p>
    </div>
</body>
</html>