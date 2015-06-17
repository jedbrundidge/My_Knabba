<?php
include_once("includes/config.php");

session_start();

$jsonPost = json_decode(file_get_contents("php://input"), true);
$firstname = $jsonPost["firstname"];
$lastname = $jsonPost["lastname"];
$email = $jsonPost["email"];
$password = $jsonPost["password"];
$staddress = $jsonPost["staddress"];
$city = $jsonPost["city"];
$state = $jsonPost["state"];
$zipcode = $jsonPost["postalcode"];
$hometype = $jsonPost["hometype"];
$usertype = $jsonPost["usertype"];
$moveindate = $jsonPost["moveindate"];
$lat = $jsonPost["lat"];
$lng = $jsonPost["lng"];

$sqlCommand  = "INSERT INTO kusers_tbl(firstName, lastName, email, upassword, staddress, city, state, postal, usertype, hometype, moveindate, latitude, longitude) 
							   Values ('$firstname', '$lastname', '$email', '$password', '$staddress', '$city', '$state', '$zipcode', '$usertype', '$hometype', '$moveindate', '$lat', '$lng' )";
$query = mysql_query($sqlCommand) or die (mysql_error());

$_SESSION['pid'] = mysql_insert_id();
$_SESSION['firstname'] = $firstname;
$_SESSION['lastname'] = $lastname;
$_SESSION['email'] = $email;

if($query)
{
	// create dir php should go here. 
	// echo 'success';
	// Either userid or email are the only thing that is very unique to any users. 
	// TO DO: What if renter is also a landlord - using same email.
	// For now lets use id for crating directory.
	$get_user_id = $_SESSION['pid'];
	$images_dir = "Images/";
	// $user_dir = "Users/";

	if(!file_exists($images_dir.$get_user_id."_RenterImages")){
		@mkdir($images_dir.$get_user_name."_RenterImages");
	} 
	
	// if(!file_exists($images_dir.$get_user_id."_Images" || $user_dir.$get_user_name."_User_Folder")){
	// 	@mkdir($images_dir.$get_user_name."_Images");
	// 	@mkdir($user_dir.$get_user_name."_User_Folder");
	// }
	echo 'success';
}
else
{
	echo 'fail';
}
?>