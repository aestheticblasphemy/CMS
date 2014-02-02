<?php
require_once(BASE_PATH.DS."string_handling.php");

function logged_in()
{
		
	global $sUser;
	global $stPath;
	print '
		<table width="100%" border="0">
  		<caption>Login_Profile</caption>
  		<tr>
    		<td><div id="1">Logged in as '; print clean($sUser); print ' </div>	
    		<div id="2"><a href="';print SITE_URL.DS.'core/users'; 
			print '">Profile</a>  <a href="';
			print SITE_URL.DS.'site/login/logout.php?ref=';
			print $stPath;
			print '"> Logout</a></div>
    		</td>
  		</tr>
		</table>';	
}

?>