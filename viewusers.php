<?php
/**
Crud operation by: Felipe Ante Jr 2023
**/

// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>

<html>
<head>    
    <title>Homepage</title>
    <style>
         body {
            background-color: #e9f2f9;
            font-family: Arial, Helvetica, sans-serif;
        }

        h2 {
            text-align: center;
            color: #0d6efd;
            margin-top: 20px;
        }

        .container {
            width: 90%;
            margin: 30px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #0d6efd;
            color: white;
        }

        a, input[type="submit"] {
            text-decoration: none;
            color: white;
            background-color: #0d6efd;
            padding: 8px 12px;
            border-radius: 5px;
            margin-right: 5px;
            border: none;
            cursor: pointer;
        }

        a:hover, input[type="submit"]:hover {
            background-color: #0b5ed7;
        }

        .logout {
            float: right;
            margin-top: 10px;
        }
    </style>
</head>
<form method="POST" action="add.php">
<body>
    <h2>Welcome Administrator</h2><br />
 <input type="submit" name="submit" value="Add New User"> <br /><br />

    <table width='80%' border=1>

    <tr>
        <th>Firstname</th> <th>Lastname</th> <th>Mobile</th> <th>Email</th> <th>Operations</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['first_name']."</td>";
        echo "<td>".$user_data['last_name']."</td>";
        echo "<td>".$user_data['mobile']."</td>";
        echo "<td>".$user_data['email']."</td>";    
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>


<a href="logout.php">Log out </a>


</body>
</html>
