<?php 
require 'connect.php';
session_start();
if (isset($_POST['submit'])) 
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $select="SELECT * FROM `customer` WHERE email='".$email."' AND password='".$password."' ";
     $stmt = $connection->query($select);
   if( $stmt === false) 
    {
     
     echo "Error: " .$connection->connect_error;
    }
    if ($stmt->num_rows != 1) 
    {
        echo "Email/Password not found";
    }
    else
    {
       while( $row = $stmt->fetch_assoc() ) 
       {
           $_SESSION['id'] =$row['id'];
           $_SESSION['name'] =$row['username'];
           $_SESSION['email'] =$row['email'];
       }
       header("Location: cart.php");
    }
}
include 'nav.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blood Bank | Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .signup-content1
        {
            padding-top: 130px;
        }

    </style>
</head>
<body>

    <div class="main">

        <section class="signup">
            <div class="container">
                <div class="signup-content1">
                    <form method="POST" id="signup-form" class="signup-form" action="login.php">
                        <h2 class="form-title">Customer Login</h2>
                       <div class="form-group">
                            <input type="text" class="form-input" name="email" id="email" placeholder="Email" required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="password" id="password" placeholder="Password" required />
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Login"/>
                        </div>
                    </form>
                   
                    <p class="loginhere">
                        Don't have an account ? <a href="index.php" class="loginhere-link">Signup here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>