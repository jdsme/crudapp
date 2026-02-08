<?php
/**
Crud operation by: Felipe Ante Jr 2023
**/

// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Management Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-header">
        <div class="header-content">
            <a href="#" class="logo">
                <div class="logo-icon">📊</div>
                User Management
            </a>
            <div class="user-info">
                <span class="user-badge">Administrator</span>
                <div class="date-display" id="currentDate"></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="welcome-section">
            <h1 class="welcome-title">Welcome Administrator</h1>
            <p class="welcome-subtitle">Manage your users efficiently</p>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <span class="card-icon">👥</span>
                    All Users
                </h3>
                <form method="POST" action="add.php" style="margin: 0;">
                    <button type="submit" name="submit" class="btn btn-primary">+ Add New User</button>
                </form>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Description</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                        while($user_data = mysqli_fetch_array($result)) {         
                            echo "<tr>";
                            echo "<td>".$user_data['first_name']."</td>";
                            echo "<td>".$user_data['last_name']."</td>";
                            echo "<td>".$user_data['mobile']."</td>";
                            echo "<td>".$user_data['email']."</td>";
                            echo "<td class='description-cell'>".($user_data['emp_desc'] ? $user_data['emp_desc'] : '<em style="color: #ccc;">No description</em>')."</td>";
                            echo "<td class='operations'><a href='edit.php?id=$user_data[id]' class='edit-link'>Edit</a> | <a href='delete.php?id=$user_data[id]' class='delete-link'>Delete</a></td>";
                            echo "</tr>";        
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="action-links">
                <button onclick="location.href='logout.php'" class="logout-btn">🚪 Logout</button>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 CRUD Dashboard System. All rights reserved.</p>
    </div>

    <script>
        // Display current date in the header
        function updateDate() {
            const dateElement = document.getElementById('currentDate');
            const now = new Date();
            
            const options = { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            };
            
            dateElement.textContent = now.toLocaleDateString('en-US', options);
        }
        
        // Update date when page loads
        updateDate();
        
        // Update date every minute
        setInterval(updateDate, 60000);
    </script>
</body>
</html>