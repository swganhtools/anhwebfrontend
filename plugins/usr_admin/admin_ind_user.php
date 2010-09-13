<?php
session_start();

include 'dbconnect.php';

if(isset($_SESSION['username'])){
$username = $_SESSION['username'];

$q = mysql_query("SELECT User_type FROM account WHERE Username = '$username'")
or die(mysql_error());

$permission = mysql_fetch_row($q);
$permission = $permission[0];

if ( $permission != 3 ){
	die('You do not have permission to access this administrative function');
}
else{
}}
else{
die("You must log in!");
}

$id = $_POST['id'];

$q = mysql_query("SELECT * FROM account WHERE User_id = '$id'") or die(mysql_error());
$q = mysql_fetch_assoc($q);

echo "
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>
  <head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />

    <title>SWG:ANH &bull; Bringing PreCU back to life...</title>

    <link rel='shortcut icon' href='favicon.ico' />
    <link rel='stylesheet' type='text/css' media='screen' href='theme/main.css' />

<table width='100%'><tr><td width='50%'>
<form action='admin_ind_user_proc.php' method='POST'>
Username:<input type='text' name='username' value='".$q['Username']."'><br><br><!--LANGINSERT-->

Password:<input type='text' name='password' value='".$q['Pass']."'><br><br><!--LANGINSERT-->

Language<select name='language' value='options'><!--LANGINSERT-->
<option value='enus'>English</option><!--LANGINSERT-->
<option value='fr'>French</option><!--LANGINSERT-->
<option value='sp'>Spanish</option><!--LANGINSERT-->
</select><br><br>

First name:<input type='text' name='firstname' value='".$q['Firstname']."'><br><br><!--LANGINSERT-->

Last name:<input type='text' name='lastname' value='".$q['Lastname']."'><br><br><!--LANGINSERT-->

E-mail address:<input type='text' name='email' value='".$q['Email']."'><br><br><!--LANGINSERT-->

Active?:<select name='active' value='options'>
<option value='1'>Yes</option>
<option value='2'>No</option>
</select><br><br>

User level:<select name='type' value='options'>
<option value='0'>Registered user</option>
<option value='1'>Moderator</option>
<option value='2'>Admin</option>
<option value='3'>Super user</option>
</select>
<br><br>

</td><td width='50%' valign='top'>
<ul> This page will allow you to edit a user account. Each value is already entered into the appropriate field so ONLY change the fields that you WANT to edit!</ul>
</td></tr></table><input type='hidden' name='id' value='".$id."'>
<center><input type='submit' />
</form></center>
";

?>