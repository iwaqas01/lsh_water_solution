<?php require 'connect.php';
session_start();
include 'nav.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blood Bank </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
<style>
    .signup-content2
    {
        padding-top: 40px;
    }
</style>
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content2">
                    <form method="POST" id="signup-form" class="signup-form" action="index.php">
                        <h2 class="form-title">Additional Information</h2>
                        <div class="row">
                            <?php 
                            $sql = "SELECT * FROM `customer` WHERE `username`='".$_SESSION['username']."' ";
                            $stmt = $connection->query($sql);
                            if( $stmt === false) 
                            {
                                echo "Error: " .$connection->connect_error;
                            }
                            else

                            while( $row = $stmt->fetch_assoc() ) 
                            {
                            echo '<div class="form-group col-md-12">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Name" readonly value='.$row["username"].'>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Email" readonly value='.$row["email"].'>
                        </div>';
                            }
                            ?>                     
                            
                               <div class="form-group col-md-12">
                            <input type="Number" class="form-input" name="cnic" id="phone" placeholder="CNIC" required/>
                        </div>
                        
                          <div class="form-group col-md-6">
                            <input type="Number" class="form-input" name="phone" id="phone" placeholder="Phone" required/>
                        </div>
                         <div class="form-group col-md-6">
                            <input type="Number" class="form-input" name="phone2" id="phone" placeholder="Alternate Phone"/>
                        </div>

                         <div class="form-group col-md-6">
                            <input type="Number" class="form-input" name="phone3" id="phone" placeholder="Landline Number"/>
                        </div>

                        <div class="form-group col-md-6">
                            <input type="text" class="form-input" name="city" id="city" placeholder="City" required/>
                        </div>
                         <div class="form-group col-md-12">
                            <input type="text" class="form-input" name="address" id="address" placeholder="Residential Address" required/>
                        </div>
                        <div class="form-group col-md-12 text-muted">
                            <label>Area:</label>
                            <select class="form-control col-md-12 text-muted" name="area" required>
                                <option value=" " selected>Choose..</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                        
                         <div class="form-group col-md-12">
                            <input type="Number" class="form-input" name="zip" id="branch" placeholder="ZIP Code" required/>
                        </div>
                        <?php 
                            $sql = "SELECT * FROM `customer` WHERE `username`='".$_SESSION['username']."' ";
                            $stmt = $connection->query($sql);
                            if( $stmt === false) 
                            {
                                echo "Error: " .$connection->connect_error;
                            }

                            while( $row = $stmt->fetch_assoc()) 
                            {
                            echo '<div class="form-group col-md-12">
                            <input type="text" class="form-input" name="password" id="password" placeholder="Password" readonly value='.$row["password"].'>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>';
                            }

                            ?>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Submit"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Already have an account ? <a href="login.php" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>
 <?php
if (isset($_POST['submit'])) 
{
$cnic = testdate($_POST['cnic']);
$phone = testdate($_POST['phone']);
if (isset($_POST['phone2'])) 
{
    $phone2 = testdate($_POST['phone2']);
}
if (isset($_POST['phone3'])) 
{
    $phone3 = testdate($_POST['phone3']);
}
$city = testdate($_POST['city']);
$address = testdate($_POST['address']);
$area = testdate($_POST['area']);
$zip = testdate($_POST['zip']);
$sql = "INSERT INTO `customer_details` (`cnic`,`contact`,`alt_contact`,`res_contact`,`city`,`address`,`area`,`zip`) VALUES ('".$cnic."','".$phone."','".$phone2."','".$phone3."','".$city."','".$address."','".$area."','".$zip."')";
$stmt = $connection->query($sql);
if( $stmt === false ) 
{
     echo "Error: " .$connection->connect->error ;
}
else
{
    echo "done";
}
    
}
function testdate($data)
{
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
?>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>