<?php
include 'dbconnect.php';

$username = $_POST['username'];
$password = $_POST['password'];
$language = $_POST['language'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$active = $_POST['active'];
$type = $_POST['type'];
$id = $_POST['id'];

mysql_query("UPDATE account SET Username = '$username', Firstname = '$firstname', Lastname = '$lastname', Email = '$email', Active = '$active', User_type = '$type', User_language = '$language', Pass = '$password' WHERE User_id = '$id'") or die(mysql_error());

header("Location:user_admin.php");
?>