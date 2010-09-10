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

// This section will generate a var containing the current page URL. This will be used to allow the language script to redirect users back to the page they
// were on, in the language they selected. It is registered as a session variuable that will change every time the page changes.
function curPageURL() {
 $pageURL = 'http';
// if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 //if ($_SERVER["SERVER_PORT"] != "80") {
//  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
// } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
// }
 return $pageURL;
}
// Here we register the URL we grabbed earlier in the session var.
$_SESSION['return_url'] = curPageURL();

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
<form action="create_new_account.php" method="POST">
Username:<input type='text' name='username'><br><br><!--LANGINSERT-->
Password:<input type='password' name='password'><br><br><!--LANGINSERT-->
Repeat password:<input type='password' name='password1'><br><br><!--LANGINSERT-->
Language<select name='language' value='options'><!--LANGINSERT-->
<option value='enus'>English</option><!--LANGINSERT-->
<option value='fr'>French</option><!--LANGINSERT-->
<option value='sp'>Spanish</option><!--LANGINSERT-->
</select><br><br>
First name:<input type='text' name='firstname'><br><br><!--LANGINSERT-->
Last name:<input type='text' name='lastname'><br><br><!--LANGINSERT-->
E-mail address:<input type='text' name='email'><br><br><!--LANGINSERT-->
<input type="submit" />
</form>

          
          
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
          <p>This is the basic page layout for the swganh.com website</p>
          
          
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

