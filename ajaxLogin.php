<?php
include("includes/config.php");
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
// username and password sent from Form
$email=mysqli_real_escape_string($db,$_POST['email']); 
//Here converting passsword into MD5 encryption. 
//$password=md5(mysqli_real_escape_string($db,$_POST['password'])); 

$password = mysqli_real_escape_string($db,$_POST['password']); 

$result=mysqli_query($db,"SELECT uid FROM users WHERE email='$email' and password='$password'");
$count=mysqli_num_rows($result);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
// If result matched $username and $password, table row  must be 1 row
if($count==1)
{
$_SESSION['login_user']=$row['uid']; //Storing user session value.
echo $row['uid'];
}

}
?>