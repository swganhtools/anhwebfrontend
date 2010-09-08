<?php
include 'dbconnect.php';
if(isset($_SESSION['username'])){
$username = $_SESSION['username'];

$q = mysql_query("SELECT User_type FROM account WHERE username = '$username'")
or die(mysql_error());

$permission = mysql_fetch_row($q);
$permission = $permission[0];}
else{}

if(isset($_SESSION['username']) && $permission >= 2){
		
       echo"<div id='page-section-mainmenu'><ul><li><a href='index.php'><span>";
	   echo $menu001;
	   echo "</span></a></li><li><a href='news.php'><span>";
	   echo $menu002;
	   echo "</span></a></li><li><a href='server_status.php'><span>";
	   echo $menu003;
	   echo "</span></a></li><li><a href='my_account.php'><span>";
	   echo $menu004;
	   echo "</span></a></li><li><a href='admin.php'><span>";
	   echo $menu006;
	   echo "</span></a></li></div></div>";}
	   
	   elseif(isset($_SESSION['username']) && $permission <= 1){
		   echo"<div id='page-section-mainmenu'><ul><li><a href='index.php'><span>";
		   echo $menu001;
		   echo "</span></a></li><li><a href='news.php'><span>";
		   echo $menu002;
		   echo "</span></a></li><li><a href='server_status.php'><span>";
		   echo $menu003;
		   echo "</span></a></li><li><a href='my_account.php'><span>";
		   echo $menu004;
		   echo "</span></a></li></div></div>";}

else{
       echo"<div id='page-section-mainmenu'><ul><li><a href='index.php'><span>";
	   echo $menu001;
	   echo "</span></a></li><li><a href='news.php'><span>";
	   echo $menu002;
	   echo "</span></a></li><li><a href='server_status.php'><span>";
	   echo $menu003;
	   echo "</span></a></li><li><a href='new_account.php'><span>";
	   echo $menu005;
	   echo "</span></a></li>";
	   
	   echo "<span>
	   <form action='login.php' method='POST'>
	   
		<input type='text' value='username' name='username'>
		<input type='password' value='password' name='password'>
		
		
		<input type='submit'>
		
		</form>
		
	   </span>
	   			</li>
          </ul>
     	</div>
      </div>";}

	  ?>