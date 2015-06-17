<?php
session_start();
include_once("includes/config.php");
$message=array();
if(isset($_POST['email']) && !empty($_POST['email'])){
    $email=mysql_real_escape_string($_POST['email']);
}else{
    $message[]='Please enter username';
}

if(isset($_POST['password']) && !empty($_POST['password'])){
    $password=mysql_real_escape_string($_POST['password']);
}else{
    $message[]='Please enter password';
}

$countError=count($message);
if($countError > 0){
     for($i=0;$i<$countError;$i++){
              echo ucwords($message[$i]).'<br/><br/>';
     }
}else{
    $query="select * from kusers_tbl where email='$email' and upassword='$password'";
    $res=mysql_query($query);
    $row = mysql_Fetch_assoc($res); 
    $checkUser=mysql_num_rows($res);
    if($checkUser > 0){
         $_SESSION['LOGIN_STATUS']=true;
         //$_SESSION['UNAME']=$email;
         $_SESSION['firstname'] = $row["firstName"];
         $_SESSION['lastname'] = $row["lastName"];
         $_SESSION['pid'] = $row["PID"];
         if($row["usertype"] == "Landlord")
         {
            $get_user_id = $_SESSION['pid'];
            $images_dir = "Images/";
            // $user_dir = "Users/";

            if(!file_exists($images_dir.$get_user_id."_LandlordImages")){
                @mkdir($images_dir.$get_user_id."_LandlordImages");
            }
            echo 'landlord';
         }
         else if($row["usertype"] == "Renter")
         {
            $get_user_id = $_SESSION['pid'];
            $images_dir = "Images/";
            // $user_dir = "Users/";

            if(!file_exists($images_dir.$get_user_id."_RenterImages")){
                @mkdir($images_dir.$get_user_id."_RenterImages");
            } 

            echo 'renter';
         }
    }else{
         echo ucwords('user credential and password do not match!');
    }
}
?>