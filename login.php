<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Database credentials
    $host = 'localhost';
    $db_username = 'root';
    $db_password = 'root1234';
    $database = 'test';
    
    // Connect to the database
    $conn = mysqli_connect($host, $db_username, $db_password, $database);
    
    // Check for errors
    if (mysqli_connect_errno()) {
        $error_message = "Failed to connect to MySQL: " . mysqli_connect_error();
    } else {
        // Check if user exists in database
        $query = "SELECT * FROM users WHERE email = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $username;
            
            if ($row["is_admin"] == 1) {
                header('Location: viewusers.php');
                exit();
            } else {
                header('Location: viewusers1.php');
                exit();
            }
        } else {
            $error_message = "Invalid email or password. Please try again.";
        }
        
        // Close the database connection
        mysqli_close($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | CRUD Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Additional login-specific styles */
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 2rem;
        }
        
        .login-card {
            max-width: 450px;
            width: 100%;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-xl);
            padding: 3rem;
            border: 1px solid var(--border-color);
            animation: fadeInUp 0.6s ease-out;
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        
        .login-logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--accent-teal), var(--primary-light));
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2.5rem;
            box-shadow: 0 8px 20px rgba(0, 212, 170, 0.3);
        }
        
        .login-title {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light), var(--accent-teal));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .login-subtitle {
            color: var(--text-secondary);
            font-size: 1rem;
        }
        
        .login-form .form-group {
            margin-bottom: 1.5rem;
        }
        
        .login-form label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text-primary);
            font-size: 0.9rem;
        }
        
        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--bg-main);
        }
        
        .login-form input[type="text"]:focus,
        .login-form input[type="password"]:focus {
            outline: none;
            border-color: var(--border-focus);
            background: var(--bg-card);
            box-shadow: 0 0 0 4px rgba(0, 212, 170, 0.1);
            transform: translateY(-1px);
        }
        
        .login-form input[type="submit"] {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--accent-teal), var(--primary-light));
            color: white;
            border: none;
            border-radius: var(--radius-md);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 212, 170, 0.3);
            margin-top: 0.5rem;
        }
        
        .login-form input[type="submit"]:hover {
            box-shadow: 0 6px 20px rgba(0, 212, 170, 0.4);
            transform: translateY(-2px);
        }
        
        .login-footer {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border-color);
        }
        
        .login-footer p {
            color: var(--text-secondary);
            margin-bottom: 0.5rem;
        }
        
        .register-link {
            color: var(--primary-light);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        
        .register-link:hover {
            color: var(--accent-teal);
            text-decoration: underline;
        }
        
        .error-alert {
            background: #fee2e2;
            border-left: 4px solid #ef4444;
            color: #991b1b;
            padding: 1rem 1.5rem;
            border-radius: var(--radius-md);
            margin-bottom: 1.5rem;
            font-weight: 500;
            animation: slideDown 0.4s ease-out;
        }
        
        .input-icon {
            position: relative;
        }
        
        .input-icon input {
            padding-left: 2.5rem;
        }
        
        .input-icon::before {
            content: attr(data-icon);
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.2rem;
            color: var(--text-light);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="login-logo">🔐</div>
                <h1 class="login-title">Welcome Back</h1>
                <p class="login-subtitle">Sign in to access your dashboard</p>
            </div>
            
            <?php if (isset($error_message)): ?>
                <div class="error-alert">
                    ⚠️ <?php echo $error_message; ?>
                </div>
            <?php endif; ?>
            
            <form class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="form-group">
                    <label for="username">Email Address</label>
                    <div class="input-icon" data-icon="📧">
                        <input type="text" id="username" name="username" placeholder="Enter your email" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-icon" data-icon="🔒">
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                </div>
                
                <input type="submit" value="Sign In">
            </form>
            
            <div class="login-footer">
                <p>Don't have an account yet?</p>
                <a href="registernow.php" class="register-link">Register Now →</a>
            </div>
        </div>
    </div>
    
    <div class="footer" style="position: fixed; bottom: 0; left: 0; right: 0; background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px);">
        <p>&copy; 2024 CRUD Dashboard System. All rights reserved.</p>
    </div>
</body>
</html>