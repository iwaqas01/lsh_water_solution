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
    border: 3px solid grey;
    padding: 5px;
    font-weight: bold;
}

th {text-align: left;}
    </style>
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" name="form" action="search.php">
                        <h2 class="form-title">Search</h2>
                         <div class="form-group col-md-12">
                            <input type="Number" class="form-input" name="cnic" id="phone" placeholder="CNIC" required/>
                        </div>
                         <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Search"/>
                        </div>
                      
                       
                    </form>
                    <p class="loginhere">
                        
                    </p>
                   
                </div>
            </div>
             <div id="myresult">
                        <?php
                        if (isset($_POST['submit'])) 
                        {
                          $value = $_POST['cnic'];
$sql = "SELECT customer.username AS name, customer.email AS email,customer_details.cnic AS cnic,customer_details.contact AS contact,customer_details.alt_contact AS alt,customer_details.address AS address,customer_details.res_contact AS res,customer_details.city AS city,customer_details.area AS area,customer_details.zip AS zip FROM customer,customer_details WHERE cnic='".$value."' ";
                            $stmt = $connection->query($sql);
                            if( $stmt === false) 
                            {
                            echo "Error:" .$connection->connect_error;
                            }
                             if ($stmt->num_rows > 0) 
                            {
                                echo "<table>
                            <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>CNIC</th>
                            <th>Contact </th>
                            <th>Alternate Contact</th>
                            <th>Landline</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Area</th>
                            <th>ZIP Code</th>
                            </tr>";
                           while( $row = $stmt->fetch_assoc() )
                            {
                            
                            echo "<tr>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['cnic'] . "</td>";
                            echo "<td>" . $row['contact'] . "</td>";
                            echo "<td>" . $row['alt'] . "</td>";
                            echo "<td>" . $row['res'] . "</td>";
                            echo "<td>" . $row['address'] . "</td>";
                            echo "<td>" . $row['city'] . "</td>";
                            echo "<td>" . $row['area'] . "</td>";
                            echo "<td>" . $row['zip'] . "</td>";
                            echo "</tr>";
                            }
                            echo "</table>";
                            }
                        }

                           


?>
                    </div>
        </section>

    </div>          
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script>
function showUser(str) 
{
    if (str == "") 
    {
        document.getElementById("myresult").innerHTML = "";
        return;
    } else 
    { 
        if (window.XMLHttpRequest) 
        {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else 
        {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200) 
            {
                document.getElementById("myresult").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","result.php?q="+str,true);
        xmlhttp.send();
    }
}

</script>

</body>
</html>