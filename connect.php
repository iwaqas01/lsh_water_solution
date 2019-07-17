<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
$servername='localhost';
$username='root';
$password='';
$connection = new mysqli($servername,$username,$password,'project');
if ($connection->connect_error) 
{
	echo "Failed to connect to database" .$connection->connect_error;
}
else 
{
	echo "";
}
?>
</body>
</html>