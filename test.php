<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>SWG:ANH &bull; Bringing PreCU back to life...</title>

    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" media="screen" href="theme/main.css" />

<?php

session_start();
// This section will generate a var containing the current page URL. This will be used to allow the language script to redirect users back to the page they
// were on, in the language they selected. It is registered as a session variuable that will change every time the page changes.
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
// Here we register the URL we grabbed earlier in the session var.
$return_url = curPageURL();
$_SESSION['return_url'] = $return_url;

echo $_SESSION['return_url'];
echo $return_url;
include 'lang/enus.php';
include 'menu.php';
?>