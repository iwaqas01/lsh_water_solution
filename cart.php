<?php
require 'connect.php';
session_start();
include 'nav.php';
//    if (isset($_POST['submit'])) 
// {
//     $id = $_SESSION['id'];
//     $name = $_SESSION['name'];
//     $qty1= $_POST['aqua'];
//     $price1 = $_POST['price1'];
//     $qty2 = $_POST['nestle'];
//     $price2 = $_POST['price2'];
//     $qty3 = $_POST['water'];
//     $price3 = $_POST['price3'];
//     $sub = $_POST['sub'];
//     $total = $_POST['total'];
//     $sql = "INSERT INTO `cart` (`customer_id`,`customer_name`,`quatity1`,`price1`,`quatity2`,`price2`,`quatity3`,`price3`,`sub`,`total`)
//     VALUES ('$id','$name','$qty1','$price1','$qty2','$price2','$qty3','$price3','$sub','$total')";
//     $result = $connection->query($sql);
//     if ($result) 
//     {
//         echo "Order placed";
//     }
// }
?>
<!DOCTYPE html>
<html>
<head>
	
<!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>-->
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="cart.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/js/bootstrap.js">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">

	<title>
	 Logistico | Cart
	</title>
</head>


<body>
<script>
    function cart()
    {
        var x = document.getElementById('aqua').value;
        var y = document.getElementById('nestle').value;
        var z = document.getElementById('ftwater').value;
        var ship = x+y+z;
        var show = x * 70;
        document.getElementById('show').innerHTML = show + " PKR";
         var show1 = y * 70;
        document.getElementById('show1').innerHTML = show1 + " PKR";
         var show2 = z * 70;
        document.getElementById('show2').innerHTML = show2 + " PKR";
        var sub = show + show1 + show2;
        document.getElementById('subtotal').innerHTML=sub + " PKR";
        document.getElementById('total').innerHTML = sub + " PKR";

    }
</script>


	
<!-- <section class="jumbotron text-center">
    <div class="container-fluid">
        <h1 class="jumbotron-heading">E-COMMERCE CART</h1>
     </div>
</section> -->
<div class="signup-content">
<div class="container-fluid mb-4">
    <form action="cart.php" method="POST">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col">Available</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>Aquafina</td>
                            <td>In stock</td>
                            <td><input class="form-control" type="Number" id="aqua" name="aqua" onkeyup="cart()" /></td>
                            <td class="text-right" name="price1" id="show"> 00.00 PKR</td>
                            <td class="text-right"> </td>
                        </tr>
                        <tr>
                            <td> </td>
                            <td>Nestle</td>
                            <td>In stock</td>
                            <td><input class="form-control" type="Number" id="nestle" name="nestle" onkeyup="cart()" /></td>
                            <td class="text-right" id="show1" name="price2">00.00 PKR</td>
                            <td class="text-right"> </td>
                        </tr>
                        <tr>
                            <td> </td>
                            <td>Filtered Water </td>
                            <td>In stock</td>
                            <td><input class="form-control" type="Number" id="ftwater" name="water" onkeyup="cart()" /></td>
                            <td class="text-right" id="show2" name="price3">00.00 PKR</td>
                            <td class="text-right"> </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right" id="subtotal" name="sub"> 00.00 PKR</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Shipping</td>
                            <td class="text-right" id="ship">00.00 PKR</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right" id="total" name="total"><strong>00.00 PKR</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <!-- <div class="col-sm-12  col-md-6">
                    <button class="btn btn-block btn-lg btn-secondary text-uppercase">Continue Shopping</button>
                </div> -->
                <div class="col-md-8 col-sm-12">
                    
                </div>
                <div class="col-sm-12 col-md-4 text-right">
                    <button class="btn btn-lg btn-block btn-success text-uppercase" name="submit">Checkout</button>
                </div>
                <?php
                if (isset($_POST['submit'])) 
                {
                    echo '<div class="col-sm-12 col-md-12 text-right"> <strong>Order Placed </strong> </div>';
                }
                ?>
            </div>
        </div>
    </div>
    </form>
</div>
</div>

</body>
</html>