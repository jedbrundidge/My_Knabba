<?php
// This section is for the landloard to create their account.
include_once("includes/config.php");

session_start();

$jsonPost = json_decode(file_get_contents("php://input"), true);

$usertype = $jsonPost["usertype"];
$propetyname = $jsonPost["propertyname"];
// $lastname = $jsonPost["lastname"];
$email = $jsonPost["email"];
$hometype = $jsonPost["hometype"];
$password = $jsonPost["password"];
$staddress = $jsonPost["staddress"];
$city = $jsonPost["city"];
$state = $jsonPost["state"];
$zipcode = $jsonPost["postalcode"];
$propertydesc = $jsonPost["propertydesc"];

$sqlCommand  = "INSERT INTO kusers_tbl(firstName, email, upassword, staddress, city, state, postal, usertype, hometype, comment) 
							   Values ('$propetyname', '$email', '$password', '$staddress', '$city', '$state', '$zipcode', '$usertype', '$hometype', '$propertydesc' )";
$query = mysql_query($sqlCommand) or die (mysql_error());

$_SESSION['pid'] = mysql_insert_id();
$_SESSION['propertyname'] = $propetyname;
$_SESSION['email'] = $email;

if($query)
{
	// create dir php should go here. 
	$get_user_id = $_SESSION['pid'];
	$images_dir = "Images/";

	if(!file_exists($images_dir.$get_user_id."_LandlordImages")){
		@mkdir($images_dir.$get_user_name."_LandlordImages");
	} 

	echo 'success';
}
else
{
	echo 'fail';
}
?>