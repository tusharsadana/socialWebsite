<?php 
$con = mysqli_connect("localhost", "root", "", "social");//connection variable

if(mysqli_connect_errno())
 {
     echo "Failed to connect" . mysqli_connect_errno();
 }

$query = mysqli_query($con,"INSERT INTO test VALUES ('2', 'John Wick')");

?>

<html> 
<head>
<title>social website</title>
</head>
<body>
    hello shreyam
</body>
</html>