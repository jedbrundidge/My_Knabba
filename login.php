

<?php

require_once 'config.php';
 
session_start();
$uName = $_POST['name'];
$pWord = md5($_POST['pwd']);
$qry = "SELECT firstname, lastname FROM kusers_tbl WHERE email='".$uName."' AND password='".$pWord."' AND status='active'";
$res = mysql_query($qry);
$num_row = mysql_num_rows($res);
$row=mysql_fetch_assoc($res);
if( $num_row == 1 ) {
echo 'true';
$_SESSION['uName'] = $row['firstName'];
}
else {
echo 'false';
}

?>