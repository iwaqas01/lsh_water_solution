<?php require 'connect.php';
session_start();
include 'nav.php'; ?>
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
.signup-content
{
    padding-top: 150px;
}
table 
{
    width: 100%;
    border-collapse: collapse;
}

table, td, th 
{
    border: 1px solid black;
    padding: 5px;
}

th 
{
  text-align: left;
}
td
{
    text-align: center;
    font-weight: bold;
}
.container-fluid
{
    padding-right: 300px;
    padding-left: 300px;
}
    </style>
</head>
<body>

    <div class="main">

         <section class="signup">
            <div class="container-fluid">
                <div class="signup-content2">
                    <form method="POST" id="signup-form" class="signup-form" action="user.php">
                        <h2 class="form-title">User Information</h2>
                        <div class="row">
              <?php
              if (isset($_SESSION['name'])) 
              {
                $sql="SELECT * FROM `customer`,customer_details LIMIT 1";
$result=$connection->query($sql);
if ($result) 
{
    echo "<table class='table table-striped table-hover'>
                            <tr>
                            <th> Username </th>";
    while ($row=$result->fetch_assoc()) 
    {

     echo '<th>'.$row['username'].'</th> </tr>';

    }
}

 $sql="SELECT * FROM `customer`,customer_details LIMIT 1";
$result=$connection->query($sql);
if ($result) 
{
    echo "<tr> <th> Email </th>";
    while ($row=$result->fetch_assoc()) 
    {

     echo '<th>'.$row['email'].'</th> </tr>';
     
    }
}

$sql="SELECT * FROM `customer`,customer_details LIMIT 1";
$result=$connection->query($sql);
if ($result) 
{
    echo "<tr> <th> CNIC </th>";
    while ($row=$result->fetch_assoc()) 
    {

     echo '<th>'.$row['cnic'].'</th> </tr>';
     
    }
}


$sql="SELECT * FROM `customer`,customer_details  LIMIT 1";
$result=$connection->query($sql);
if ($result) 
{
    echo "<tr> <th> Contact </th>";
    while ($row=$result->fetch_assoc()) 
    {

     echo '<th>'.$row['contact'].'</th> </tr>';
     
    }
}

$sql="SELECT * FROM `customer`,customer_details LIMIT 1";
$result=$connection->query($sql);
if ($result) 
{
    echo "<tr> <th> Alternate Contact </th>";
    while ($row=$result->fetch_assoc()) 
    {

     echo '<th>'.$row['alt_contact'].'</th> </tr>';
     
    }
}


$sql="SELECT * FROM `customer`,customer_details  LIMIT 1";
$result=$connection->query($sql);
if ($result) 
{
    echo "<tr> <th> Landline </th>";
    while ($row=$result->fetch_assoc()) 
    {

     echo '<th>'.$row['res_contact'].'</th> </tr>';
     
    }
}


$sql="SELECT * FROM `customer`,customer_details LIMIT 1";
$result=$connection->query($sql);
if ($result) 
{
    echo "<tr> <th> Address </th>";
    while ($row=$result->fetch_assoc()) 
    {

     echo '<th>'.$row['address'].'</th> </tr>';
     
    }
}


$sql="SELECT * FROM `customer`,customer_details LIMIT 1";
$result=$connection->query($sql);
if ($result) 
{
    echo "<tr> <th> Area </th>";
    while ($row=$result->fetch_assoc()) 
    {

     echo '<th>'.$row['area'].'</th> </tr>';
     
    }
}


$sql="SELECT * FROM `customer`,customer_details LIMIT 1";
$result=$connection->query($sql);
if ($result) 
{
    echo "<tr> <th> City </th>";
    while ($row=$result->fetch_assoc()) 
    {

     echo '<th>'.$row['city'].'</th> </tr>';
     
    }
}


$sql="SELECT * FROM `customer`,customer_details LIMIT 1";
$result=$connection->query($sql);
if ($result) 
{
    echo "<tr> <th> ZIP Code </th>";
    while ($row=$result->fetch_assoc()) 
    {

     echo '<th>'.$row['zip'].'</th> </tr> </table>';
     
    }
}


$sql="SELECT * FROM `customer`,customer_details LIMIT 1";
$result=$connection->query($sql);
if ($result) 
{
    while ($row=$result->fetch_assoc()) 
    {

     echo  '<a href="edit.php?user='.$row['id'].'" class="form-submit btn btn-danger"> Edit Details </a>';
     
    }
}
   

              }
              elseif (!isset($_SESSION['name'])) 
              {
                echo '<section class="signup">
                <div class="container-fluid">
                <div class="signup-content2">
                <p class="loginhere">
                    Haven&apos;t logged in yet ? <a href="login.php" class="loginhere-link">Login here</a>
                </p>
                </div>
                </div>
                </section>';
                            }
              ?>          
                        
                     
                       
                    </form>
                    
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>