<?php
	require_once("../../_lib/_base/initialize.php");
	require_once(CLASS_PATH.DS."class.session.php");
	require_once(SITE_ROOT.DS."site".DS."logged_in.php");
	require_once(SITE_ROOT.DS."site".DS."no_login.php");
	require_once(BASE_PATH.DS."validation.php");
	require_once(BASE_PATH.DS."error_handling.php");
	require_once(SITE_ROOT.DS."site".DS."header.php");
	require_once(SITE_ROOT.DS."site".DS."modules".DS."sections".DS."manage_section.php");
	require_once(SITE_ROOT.DS."core".DS."authorization".DS."auth_funs.php");
	$redirect = SITE_URL."/site";
	
	$stPath = SITE_URL."/site/";

if(!isset($_SESSION))
{
	session_start();
}

if(isset($_SESSION['logged_in']))
{
	if(!strcmp($_SESSION['logged_in'],"no"))
	{
		$_SESSION['user'] = "anonymous";

		header("Location: {$redirect}");
		die();
	}
}
else
{
	$_SESSION['logged_in'] = "no";
	$_SESSION['user'] = "anonymous";
	header("Location: {$redirect}");
	die();
}
	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Sections</title>
<link href="../../_lib/_css/ab_blog_global.css" rel="stylesheet" type="text/css" />
</head>
<body>
<p>
  <?php 
	load_header();
	
	//load menu before hand
	$aUserParms = explode("|", $_SESSION['sUSER']);
//	print "<pre>"; print_r($aUserParms); print "</pre>";
	settype($aUserParms[0], "integer");
//	print "Value passed = ".$aUserParms[0];
	//The page must be displayed only if the user has the right permissions. Otherwise, redirect.
	$iPerm = get_app_permissions(1,$aUserParms[0]);
	if($iPerm >= 1)
	{
		$aMenu = get_permitted_app_list($aUserParms[0]);
	}
	else
	{
		header("Location: ".SITE_URL."/site/");
		die();
	}
	
	if(isset($_GET['sid']))
	{
		$iSid = $_GET['sid'];
	}
	else
	{
		$iSid = null;
	}
?>
</p>
<table class="content" width="1299" height="271" border="0">
  <caption>
    Content and Sidebar
  </caption>
  <tr>
    <td width="255"><table class = "sidebar" width="100%" height="221" border="0">
      <tr>
        <td><?php render_menu($aMenu);?></td>
      </tr>
      <tr>
        <td><a href="<?php print SITE_URL."/core/users/"?>">View User Profile</a></td>
      </tr>
      <tr>
        <td><a href="<?php print SITE_URL."/core/users/edit_user.php";?>">Edit User Profile</a></td>
      </tr>
      <tr>
        <td>Logout</td>
      </tr>
    </table></td>
    <td width="1034" height="75%">
    	<?php /*Load the section view */
				$aSections = show_sections(($iSid == null? null: $iSid));
				$iCount = count($aSections);
				print '<table class="content" width="95%" height="95%" border="0">';
				if($iCount>0)
				{

					for($i=0;$i<$iCount;$i++)
					{
						print '<tr>';
						if($aSections[$i][4]=='0')//Level is not terminal, it is navigable
						{
							//TODO: Replace the sid and slevel fields by sName field which is the name(formatted) of the section
							//This will allow us to deduce the table name from the section name itself.
							print '<td><div><a href="'.SELF.'?sid='.$aSections[$i][0].'">'.$aSections[$i][1].'</a></div></td>';
						}
						else
						{
							print '<td><div>'.$aSections[$i][1].'</div></td>';	
						}
						if($iPerm>=4)
						{
							//Display the administrative actions to Rename, Delete or Move Section.
							print '<td><div><a href="edit_section.php?sid='.$aSections[$i][0].'">'.'EDIT'.'</a></div></td>';
						}
						//URL to the section
							print '<td><div><a href="'.SITE_URL.$aSections[$i][5].'">'.'Visit Section'.'</a></div></td>';
						print '</tr>';
					}
				}
				else
				{
					print "There are no sections yet!";
				}
				//Finally, the option to create a new section
				print '<tr><td><div><a href="edit_section.php';
				print '">Create New Section</a></div></td></tr>';
				print '</table>';
				?>
		</td>
  </tr>
</table>
<table class="footer" width="100%" border="0">
  <caption>
    Footer
  </caption>
  <tr>
    <td width="420" height="5">&nbsp;</td>
    <td width="475">&nbsp;</td>
    <td width="417">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>