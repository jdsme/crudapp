<?php
include_once("config.php");

$error_message = '';

// Check if the form was actually submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    
    // Use ?? '' to provide an empty string if the key is missing
    // This prevents the "Undefined array key" and "Deprecated" errors
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name'] ?? '');
    $last_name  = mysqli_real_escape_string($conn, $_POST['last_name'] ?? '');
    $email      = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
    $mobile     = mysqli_real_escape_string($conn, $_POST['mobile'] ?? '');
    $emp_desc   = mysqli_real_escape_string($conn, $_POST['emp_desc'] ?? '');
    
    // Basic validation: ensure required fields aren't just empty strings
    if (!empty($first_name) && !empty($email)) {
        $sql = "INSERT INTO users(first_name, last_name, email, mobile, emp_desc) 
                VALUES('$first_name', '$last_name', '$email', '$mobile', '$emp_desc')";
        
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            header('Location: viewusers.php');
            exit(); // Always call exit() after a header redirect
        } else {
            $error_message = "Database Error: " . mysqli_error($conn);
        }
    } else {
        $error_message = "Please fill in all required fields.";
    }
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
        <?php if(!empty($error_message)): ?>
            <div class="alert alert-error">
                <?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>

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
