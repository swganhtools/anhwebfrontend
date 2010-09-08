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
?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>
 <head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />

    <title>SWG:ANH &bull; Bringing PreCU back to life...</title>

    <link rel='shortcut icon' href='favicon.ico' />
    <link rel='stylesheet' type='text/css' media='screen' href='theme/main.css' />
</head>

<body>

<table border="1">
  <tr>
    <td>User ID</td>
    <td>Username</td>
    <td>First Name</td>
    <td>Last name</td>
    <td>e-mail</td>
    <td>active?</td>
    <td>User type</td>
    <td>Last login</td>
    <td>Registration date</td>
  </tr>
<?php
$result = mysql_query("SELECT * FROM account") or die(mysql_error());

while($row = mysql_fetch_array($result)){
	echo "<tr>
	<td>".$row['User_id']."</td>
	<td>".$row['Username']."</td>
	<td>".$row['Firstname']."</td>
	<td>".$row['Lastname']."</td>
	<td>".$row['Email']."</td>
	<td>".$row['Active']."</td>
	<td>".$row['User_type']."</td>
	<td>".$row['User_lastlogin']."</td>
	<td>".$row['User_registration']."</td>
	</tr>";
}
echo "</table>";
?>
</body>
</html>