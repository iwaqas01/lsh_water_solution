<?php require 'connect.php';
session_start();
  if (isset($_POST['submit'])) 
    {
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$date=date("Y-m-d");
$sql = "INSERT INTO `customer`(`username`,`email`,`password`,`date`) VALUES ('".$name."','".$email."','".$password."','".$date."')";
$stmt = $connection->query($sql);
if( $stmt === false ) 
{
     echo "Error: " .$connection->connect_error;
}
else
{
    $_SESSION['username'] = $name;
    header("Location: details.php");
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
    <title>Blood Bank</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        
    </style>
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" action="index.php">
                        <h2 class="form-title">Customer Registration</h2>
                        <div class="form-group">
                         <input type="text" class="form-input" name="name" id="name" placeholder="Name" required />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Email" required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="password" id="password" placeholder="Password" required />
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Already have an account ? <a href="login.php" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <?php

    ?>
</body>
</html>