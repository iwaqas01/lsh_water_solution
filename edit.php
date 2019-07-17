<?php 
require 'connect.php';
session_start();
                     
                         $value =$_GET['user'];
                         $sql = "SELECT * FROM `customer`,`customer_details` WHERE `id`='".$value."' ";
                            $stmt = $connection->query($sql);
                            if( $stmt) 
                            {
                               $row = $stmt->fetch_assoc();
                            }
                            else
                            {
                                echo "Error: " .$connection->connect_error;
                            }
                            if (isset($_POST['submit'])) 
                            {
                                 function testdate($data)
                                    {
                                        $data=trim($data);
                                        $data=stripcslashes($data);
                                        $data=htmlspecialchars($data);
                                        return $data;
                                    }
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
                                $name = testdate($_POST['name']);
                                $email = testdate($_POST['email']);
                                $password = testdate($_POST['password']);
                                $sql ="UPDATE `customer`,`customer_details` SET `customer_details.contact`='$phone',`customer_details.alt_contact`='$phone2',`customer_details.res_contact`='$phone3',`customer_details.city`='$city',`customer_details.address`='$address',`customer_details.area`='$area',`customer_details.zip`='$zip',`customer.username`='$name',`customer.email`='$email',`customer.password`='$password' WHERE `customer.id`='$value'  ";
                                $result = $connection->query($sql);
                                if ($result) 
                                {
                                    echo "Done";
                                    header("Location : index.php");
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
        .signup-content1
        {
            padding-top: 60px;
        }
    </style>
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content1">
                    <form method="POST" id="signup-form" class="signup-form" action="edit.php">
                        <h2 class="form-title">Update Details</h2>
                        <div class="row">
                                       
                            <div class="form-group col-md-12">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Name" value="<?php echo $row["username"] ?>" >
                        </div>
                        <div class="form-group col-md-12">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Email" value="<?php echo $row["email"] ?>">
                        </div>
                               <div class="form-group col-md-12">
                            <input type="Number" class="form-input" name="cnic" id="phone" placeholder="CNIC" required readonly value="<?php echo $row["cnic"] ?>">
                        </div>
                        
                          <div class="form-group col-md-6">
                            <input type="Number" class="form-input" name="phone" id="phone" placeholder="Phone" required value="<?php echo $row["contact"] ?>"/>
                        </div>
                         <div class="form-group col-md-6">
                            <input type="Number" class="form-input" name="phone2" id="phone" placeholder="Alternate Phone" value="<?php echo $row["alt_contact"] ?>"/>
                        </div>

                         <div class="form-group col-md-6">
                            <input type="Number" class="form-input" name="phone3" id="phone" placeholder="Landline Number" value="<?php echo $row["res_contact"] ?>"/>
                        </div>

                        <div class="form-group col-md-6">
                            <input type="text" class="form-input" name="city" id="city" placeholder="City" required value="<?php echo $row["city"] ?>"/>
                        </div>
                         <div class="form-group col-md-12">
                            <input type="text" class="form-input" name="address" id="address" placeholder="Residential Address" required value="<?php echo $row["address"] ?>"/>
                        </div>
                        <div class="form-group col-md-12 text-muted">
                            <label>Area:</label>
                            <select class="form-control col-md-12 text-muted" name="area" required>
                                <option value="<?php echo  $row['area']  ?>" ><?php echo  $row['area']  ?> </option>  
                            </select>
                        </div>
                        
                         <div class="form-group col-md-12">
                            <input type="Number" class="form-input" name="zip" id="branch" placeholder="ZIP Code" required value="<?php echo $row["zip"] ?>"/>
                        </div>
                      <div class="form-group col-md-12">
                            <input type="text" class="form-input" name="password" id="password" placeholder="Password" value="<?php echo $row["password"] ?>">
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>

                     </div>
                      <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Update"/>
                        </div>
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