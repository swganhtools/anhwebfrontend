<?php
session_start();
include 'dbconnect.php';
$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);
$return_url = $_SESSION['return_url'];
$result = mysql_query("SELECT COUNT(*) FROM account WHERE Username='$username' and Pass='$password'") or die(mysql_error());
$result = mysql_fetch_row($result); 
$result = $result[0];


if($result == 1){
$_SESSION['username'] = $username;

header("Location:".$return_url);
}
else {
echo "Wrong Username or Password. Use the back button. If you think this message is incorrect, contact the webmaster.";
}
?>