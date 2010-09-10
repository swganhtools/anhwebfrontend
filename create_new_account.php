<?php
session_start();
include 'dbconnect.php';
if(isset($_SESSION['lang']));
	else
	$_SESSION['lang'] = "enus";
	
$lang = $_SESSION["lang"];

include ('lang/'.$lang.'.php');
echo "hello";
$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);
$password1 = mysql_real_escape_string($_POST['password1']);
$language = mysql_real_escape_string($_POST['language']);
$firstname = mysql_real_escape_string($_POST['firstname']);
$lastname = mysql_real_escape_string($_POST['lastname']);
$email = mysql_real_escape_string($_POST['email']);
$today = date("Y-m-d H:i:s");
$type = 1;
$active = 0;
echo "hello";
$usr_count = mysql_query("SELECT COUNT(*) FROM account WHERE Username = '$username'") or die(mysql_error());
//$usr_count = mysql_fetch_row($usr_count) or die(mysql_error()); 
$usr_count = $usr_count[0];
$email_count = mysql_query("SELECT COUNT(*) FROM account WHERE Email = '$email'") or die(mysql_error());
//$email_count = mysql_fetch_row($email_count) or die(mysql_error()); 
$email_count = $email_count[0];
echo $email;
if($password != $password1){
	$_SESSION['error'] = $error0;
	header("Location:".error.php);
}elseif($usr_count != 0){
	$_SESSION['error'] = $error1;
	header("Location:".error.php);
}elseif($email_count != 0){
	$_SESSION['error'] = $error2;
	header("Location:".error.php);
}
//REVISE
else{
	mysql_query("INSERT INTO account (Username, Firstname, Lastname, Email, Active, User_type, User_language, User_registration, Pass) VALUES('$username', '$firstname', '$lastname', '$email', '$active', '$type', '$language', '$today', '$password')") or die(mysql_error());
	
	$id = mysql_query("SELECT User_id FROM account WHERE Username = '$username'") or die(mysql_error());
	
	$message = "Welcome to the exciting world of Star Wars Galaxies : A New Hope!
				Your new username is ".$username."! Please click the following link or paste it in a web browser to complete the activation process.
				HTTP://www.swganh.com/account_activate.php?id=".$id;//LANGINSERT
	$headers = "From: matt@swganh.com.com\r\n";
	mail($email, 'SWG:ANH New account registration/confirmaton', $message, $headers);//LANGINSERT
}
echo "hello";
?>