<?php
session_start();
include 'dbconnect.php';

echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>
 <head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />

    <title>SWG:ANH &bull; Bringing PreCU back to life...</title>

    <link rel='shortcut icon' href='favicon.ico' />
    <link rel='stylesheet' type='text/css' media='screen' href='theme/main.css' />

<script>
<!--
function land(ref, target)
{
lowtarget=target.toLowerCase();
if (lowtarget=='_self') {window.location=loc;}
else {if (lowtarget=='_top') {top.location=loc;}
else {if (lowtarget=='_blank') {window.open(loc);}
else {if (lowtarget=='_parent') {parent.location=loc;}
else {parent.frames[target].location=loc;};
}}}
}
function jump(menu)
{
ref=menu.choice.options[menu.choice.selectedIndex].value;
splitc=ref.lastIndexOf('*');
target='';
if (splitc!=-1)
{loc=ref.substring(0,splitc);
target=ref.substring(splitc+1,1000);}
else {loc=ref; target='_self';};
if (ref != '') {land(loc,target);}
}
//-->
</script>";

include 'previous_url.php';
// Here we register the URL we grabbed earlier in the session var.
$_SESSION['return_url'] = curPageURL();

//here we start off by checking if the user is logged in, and if they are, whether or not they are even allowed here!
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



//This section will check to see if a language var has been assigned to the session. If not it defaults to english.
if(isset($_SESSION['lang']));
	else
	$_SESSION['lang'] = "enus";
	
$lang = $_SESSION["lang"];

include ('lang/'.$lang.'.php');

 echo " </head>";
 echo " <body id='page'>";
 echo "   <div id='page-section-main'>";
 echo "     <div id='page-section-header' class='site-section'>";
 echo "       <div id='page-section-logo'>";
 echo "         <a href='/'><img src='theme/main/header.jpg' width='850' height='150' border='0' /></a>";


include("menu.php");
?>
      <div id="page-section-body" class="site-section">
        <div id="page-section-content">
<center><form action="dummy" method="post">
<select name="choice" size="1" onChange="jump(this.form)">
<option value="plugins/usr_admin/user_admin.php*admin_main">User admin</option><!--LANGINSERT-->
<option value="plugins/manage_news.php*admin_main">Manage news</option><!--LANGINSERT-->
<option value="plugins/manage_server.php*admin_main">Manage server</option><!--LANGINSERT-->
<option value="plugins/maintenance.php*admin_main">Maintenance</option><!--LANGINSERT-->
</select></form>
<iframe src ="html_intro.asp" name="admin_main" width="100%" height="400" frameborder="0" scrolling="auto">
  <p>Your browser does not support iframes.</p>
</iframe>
           </center>
          
          
          <h2></h2>
          <h3>Here you can create an swg:anh account! </h3><!--LANGINSERT-->
          <li><span>
	   <form action='change_lang.php' method='POST'>
	   
	   	<select name='lang' value='options'>
  			<option value='enus'>English</option>
 			<option value='fr'>Francais</option>
  			<option value='es'>Espanole</option>
		</select>
		
		<input type='submit'>
		
		</form>
		
	   </span></li>
          <p>This is the basic page layout for the swganh.com website</p><!--LANGINSERT-->
          
          
          <!--// PAGE CONTENT ENDS HERE -->
        </div>
        <div class="clear"></div>
      </div>
    </div>
    
    <div id="page-section-footer" class="site-section">   
      <div id="copyright">
        &copy; 2006, 2010 <a href="/">SWG:ANH</a> 
        &bull; Designed by <a href="/">SWG:ANH</a>
      </div>
    </div>
  </body>
</html>

