<?php
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
?>