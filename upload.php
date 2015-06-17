<?php
	session_start();
	include('includes/config.php');

// echo $_SESSION['pid'];
	
if(isset($_POST['submit'])){
    $file_name = $_FILES['uploaded_file']['name'];
    // echo "testing name".$file_name;

    $file_type = $_FILES['uploaded_file']['type'];
    $file_size = $_FILES['uploaded_file']['size'];
    $file_temp_name = $_FILES['uploaded_file']['tmp_name'];
    
    
    $error = $_FILES['uploaded_file']['error'];
    $directory = "Images/";
    $exists = $directory.$file_name;
    $max_file_size = 2097152;
    $new_path = "Images/".$_SESSION['pid']."_RenterImages/";
    
    $allowed_file_types = array(".jpg", ".JPG", ".gif", ".GIF", ".png", ".PNG", ".jpeg", ".JPEG");
    $ext = substr($file_name, strpos($file_name,'.'), strlen($file_name)-1);
    
    $rand_num = rand(00000, 99999);
    $new_name = $_SESSION['pid']."_".$rand_num.$ext;
    $conct = $new_path.$new_name;
    
    // if(file_exists($exists)){
    // 	die("File already exists in this directory. Please rename the file");
    // }
    
	if($_FILES['uploaded_file']['size'] > $max_file_size){
		die("The file must be less than 2mb to upload");
	}     
    
    if(!in_array($ext, $allowed_file_types)){
    	die("You are attemtping to upload a file type that is not allowed.");
    }
    $pids = $_SESSION['pid'];
    // echo "The Path is ".$conct;


    $sqlCommand  = "UPDATE kusers_tbl SET profileurl ='$conct' Where PID = '$pids'";
//$query = mysql_query($sqlCommand) or die (mysql_error());

    if(move_uploaded_file($file_temp_name, $new_path.$new_name)){
	// mysql_query("update 'kusers_tbl' SET 'profileurl' =".$conct"' where 'PID' ='".$_SESSION['pid']"'");		
        mysql_query($sqlCommand);
        header('location: r_profile.php');
	}
	else{
		echo "Error";
	}

    header('location: r_profile.php');
    	
}    	
    
    
?>