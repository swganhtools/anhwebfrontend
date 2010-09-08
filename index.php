<?php
session_start();
include 'dbconnect.php';

echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>";
echo "<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>";
echo "  <head>";
echo "    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";

echo "    <title>SWG:ANH &bull; Bringing PreCU back to life...</title>";

echo "    <link rel='shortcut icon' href='favicon.ico' />";
echo "    <link rel='stylesheet' type='text/css' media='screen' href='theme/main.css' />";

// This section will generate a var containing the current page URL. This will be used to allow the language script to redirect users back to the page they
// were on, in the language they selected. It is registered as a session variuable that will change every time the page changes.
function curPageURL() {
 $pageURL = 'http';
// if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
 $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
} else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
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
          <!--// PAGE CONTENT STARTS HERE -->
          
          
          <h2>SWG:ANH .com Design Template</h2>
          <h3>Nearly Complete... css file could do with some formatting</h3>
          
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