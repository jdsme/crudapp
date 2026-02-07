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

   echo "<b>Registration successful!<b>";
   header('Refresh: 1; URL = login.php');

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>

<html lang="en">  
<head>  
  <meta charset="utf-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
  <title> Admin Registration Form  </title>  
  <style>  
body {
    background-color: #e9f2f9;
    font-family: Arial, Helvetica, sans-serif;
} 

h1 {
    text-align: center;
    color: #0d6efd;
    margin-bottom: 20px;
}

form {
    width: 400px;
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
input[type="password"], 
input[type="email"] {
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
</style>  
</head>  
<body>    


<form method="post" action="">
<h1>Admin Registration Form </h1><br><br>

    <label>Username:</label>
    <input type="text" name="username"><br>
    <label>Firstname:</label>
    <input type="text" name="firstname"><br>
    <label>Lastname:</label>
    <input type="text" name="lastname"><br>
    <label>Password:</label>
    <input type="password" name="password"><br>
    <label>Email:</label>
    <input type="email" name="email"><br>
    <input type="submit" name="submit" value="Submit">



</form>

</body>
</head>


