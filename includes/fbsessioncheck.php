<?php
session_start(); 
$id= $_SESSION['FBID'];
$email = $_SESSION['EMAIL'];
$fistname = $_SESSION['FNAME'];

?>


<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
	<title></title>
</head>
<body>
<h1> Here's what I think is going on: <?php echo $email ?></h1>
<h2> Hello Mr. <?php echo $fistname ?></h2>

</body>
</html>