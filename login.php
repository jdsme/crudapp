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
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    
    // Check if user exists in database
    $query = "SELECT * FROM users WHERE email = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    
   

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if ($row["is_admin"] == 1) {
        $_SESSION['username'] = $username;
        header('Location: viewusers.php');
    } else {
        echo "User is not an administrator.";
        $_SESSION['username'] = $username;
        header('Location: viewusers1.php');
    }
} else {
    echo "Invalid username or password.";
}

// Close the database connection
mysqli_close($conn);

}

?>

<!DOCTYPE html>
<html>
<head>

<style>
body {
    background-color: #e9f2f9;
    font-family: Arial, Helvetica, sans-serif
}

h1 {
    text-align: center;
    color: #0d6efd;
    margin-top: 20px;
}

form {
    width: 350px;
    margin: 80px auto;
    padding: 25px;
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}
input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #0d6efd;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0b5ed7;
}

h4 {
    text-align: center;
    margin-top: 15px;
}

a {
    color: #0d6efd;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}
</style>
    
    <title>Login</title>
</head>
<body>
    <h1>Login Now</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label>Username (must be email):</label>
        <input type="text" name="username"><br><br>
        <label>Password:</label>
        <input type="password" name="password"><br><br>
        <input type="submit" value="Login"><br><br>

        <h4>No Account Yet? <a href="registernow.php">Register Now</a></h4>

  

    </form>
</body>
</html>
