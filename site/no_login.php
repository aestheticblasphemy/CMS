<?php

require_once(BASE_PATH.DS."string_handling.php");
function not_logged_in(){
	global $sUser;
	/* Code generating Login form */
	print '
		<form action="';
	print SELF; 
	print '" method="post" name="ab_login_form">
	<table border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td><div class="formlabel">User Name:</div></td>
        	<td><input type="text" name="user" value="'; 
	print clean($sUser); 
	print '" class="textfield" /></td>
    	</tr>
    	<tr>
        	<td><div class="formlabel">Password:</div></td>
        	<td><input type="password" name="password" class="textfield" /></td>
    	</tr>
    	<tr>
        	<td class="dotrule" colspan="2"><img src="../../_img/spc.gif" width="1" height="15" alt="" border="0" /></td>
    	</tr>
    	<tr>
        <td align="right" colspan="2"><input type="image" src="';
	print SITE_URL.DS.'_img/buttons/btn_submit.gif'; 
	print '" width="58" height="15" alt="" border="0" onfocus="this.blur();" name="Submit" /></td>
    	</tr>
    	<tr>
        	<td colspan="2"><a href="reminder.php">Forgot your password?</a></td>
    	</tr>
	</table>
	</form>'; //end print

}
?>