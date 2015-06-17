<?php
session_start();
include_once("includes/config.php");
$message=array();
if(isset($_POST['email']) && !empty($_POST['email'])){
    $email=mysql_real_escape_string($_POST['email']);
}else{
    $message[]='Please enter email address!';
}

if(isset($_POST['message']) && !empty($_POST['message'])){
    $message=mysql_real_escape_string($_POST['message']);
}else{
    $message[]='Please enter a message!';
}

$countError=count($message);

// if($countError > 0){
//      for($i=0;$i<$countError;$i++){
//               echo ucwords($message[$i]).'<br/><br/>';
//      }
// }else{
$query="select * from kusers_tbl where email='$email'";

$res=mysql_query($query);
$row = mysql_Fetch_assoc($res); 
$checkUser=mysql_num_rows($res);
if($checkUser > 0){

	$renterid = $row["PID"];
	$landlordid = $_SESSION['pid'];
	$property_name = $row["email"];
	$comments = $message;


	$updatequery = "INSERT INTO renting_offers(i_id, r_id, property_name, comments, url)
					Values ('$landlordid', '$renterid', '$property_name', '$message', 'test')";

	$updatecommand = mysql_query($updatequery);
	if(!$updatecommand)
	{
	  die('Could not update data: ' . mysql_error());
	}
	echo "correct";
	}
	else
	{
		echo "Email Address doesn't exist!";
	}
?>