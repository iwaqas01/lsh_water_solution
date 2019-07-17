<?php require 'connect.php'; 
session_start();
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

th {text-align: left;}
    </style>
</head>
<body>

    <div class="main">

        <section class="signup">
            
            <div class="container">
               
            </div>
        </section>

    </div>          
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
<?php
$q = intval($_GET['q']);
$sql = "SELECT customer.username AS name, customer.email AS email,customer_details.cnic AS cnic,customer_details.contact AS contact,customer_details.alt_contact AS alt,customer_details.address AS address,customer_details.res_contact AS res,customer_details.city AS city,customer_details.area AS area,customer_details.zip AS zip FROM customer,customer_details WHERE area='".$q."' ";
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
                           


?>
</body>
</html>