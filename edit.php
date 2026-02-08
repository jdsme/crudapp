<?php

include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $emp_desc = $_POST['emp_desc'];
        
    // update user data
    $result = mysqli_query($conn, "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email', mobile='$mobile', emp_desc='$emp_desc' WHERE id=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: viewusers.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetch user data based on id
$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
    $first_name = $user_data['first_name'];
    $last_name = $user_data['last_name'];
    $email = $user_data['email'];
    $mobile = $user_data['mobile'];
    $emp_desc = $user_data['emp_desc'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit User Data</title>
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
        <form name="update_user" method="post" action="edit.php">
            <h1 class="form-title">Edit User</h1>
            
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" value="<?php echo htmlspecialchars($first_name);?>" required>
            </div>
            
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" value="<?php echo htmlspecialchars($last_name);?>" required>
            </div>
            
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($email);?>" required>
            </div>
            
            <div class="form-group">
                <label>Mobile Number</label>
                <input type="text" name="mobile" value="<?php echo htmlspecialchars($mobile);?>" required>
            </div>
            
            <div class="form-group">
                <label>Employee Description</label>
                <textarea name="emp_desc" required><?php echo htmlspecialchars($emp_desc);?></textarea>
            </div>
            
            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
            <input type="submit" name="update" value="Update User" class="btn btn-primary">
            
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