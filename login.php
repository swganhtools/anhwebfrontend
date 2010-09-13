<?php
session_start();
include 'dbconnect.php';
$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);
$return_url = $_SESSION['return_url'];
$result = mysql_query("SELECT COUNT(*) FROM account WHERE Username='$username' and Pass='$password'") or die(mysql_error());
$result = mysql_fetch_row($result); 
$result = $result[0];

$active = mysql_query("SELECT active FROM account WHERE Username='$username' and Pass='$password'") or die(mysql_error());
$active = mysql_fetch_row($active); 
$active = $active[0];

if($result != 1 || $active != 1){
$_SESSION['error'] = "error05";
header("Location:"."message.php");//LANGINSERT
}
else {
$_SESSION['username'] = $username;

header("Location:".$return_url);
}
?>