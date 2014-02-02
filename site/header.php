<?php 

//require_once("../_lib/_base/initialize.php");
require_once(CLASS_PATH.DS."class.session.php");
require_once(SITE_ROOT.DS."site".DS."logged_in.php");
require_once(SITE_ROOT.DS."site".DS."no_login.php");
require_once(BASE_PATH.DS."validation.php");
require_once(BASE_PATH.DS."error_handling.php");
function show_login_status()
{
	if(!strcmp($_SESSION['logged_in'], "yes"))
	{
		/*User is logged in*/
		logged_in();
	}
	elseif(!strcmp($_SESSION['logged_in'], "no"))
	{
		/*User not logged in */
		not_logged_in();
	}
}

?>

<?php function load_header()
{
	global $sUser;
	print '
		<table class="heading" width="95%" border="0" align="center">
  		<caption>
    		Aesthetic_Blasphemy_Header
  		</caption>
  		<tr>
    		<td width="35%">
				<table width="100%" border="0">
      				<caption>
        				Logo_and_Line
        			</caption>
      				<tr>
        				<td class="site_title">LOREM IPSUM</td>
      				</tr>
      				<tr>
        				<td>LOREM IPSUM LOREM IPSUM</td>
     				</tr>
    			</table>
			</td>
			
    		<td width="33%">&nbsp;</td>
    		<td width="32%">
				<table width="100%" border="0">
      			<caption>
        			Networking_and_Login
        		</caption>
      			<tr>
       		 		<td height="52">'; show_login_status(); print '</td>
      			</tr>
      			<tr>
        			<td>
						<table width="100%" border="0">
          				<caption>
            				Social_Networking_WIdgets
            			</caption>
          				<tr>
            				<td width="20%">Mail</td>
            				<td width="20%">Twitter</td>
            				<td width="20%">FB</td>
            				<td width="20%">Pinterest</td>
            				<td width="20%">Formspring</td>
          				</tr>
        				</table>
					</td>
      			</tr>
    			</table>
			</td>
  		</tr>
	</table>';
}
?>

