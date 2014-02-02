<?php
	require_once("../../_lib/_base/initialize.php");
	require_once(CLASS_PATH.DS."class.session.php");
	require_once(SITE_ROOT.DS."site".DS."logged_in.php");
	require_once(SITE_ROOT.DS."site".DS."no_login.php");
	require_once(BASE_PATH.DS."validation.php");
	require_once(BASE_PATH.DS."error_handling.php");
	require_once(SITE_ROOT.DS."site".DS."header.php");
	require_once(SITE_ROOT.DS."site".DS."modules".DS."sections".DS."manage_section.php");
	$redirect = SITE_URL."/site";
	
	$stPath = SITE_URL."/site/";

if(!isset($_SESSION))
{
	print "starting session\n";
	session_start();
}

if(isset($_SESSION['logged_in']))
{
	print "logged_in var set";
	if(!strcmp($_SESSION['logged_in'],"no"))
	{
		print "Session existed but not logged on";
		$_SESSION['user'] = "anonymous";

		header("Location: {$redirect}");
		die();
	}
}
else
{
	print "logged_in var not set";
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
<link href="<?php print SITE_URL;?>/_lib/_css/ab_blog_global.css" rel="stylesheet" type="text/css" />
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
	
		
	if(isset($_GET['sid']))
	{
		$iSid = $_GET['sid'];
	}
	else
	{
		$iSid = null;
	}
		$sSecName = '';	
	if(isset($_POST['sectionname']))
	{
		update_table_field('ab_admin_sections', 'admin_section_name', $_POST['sectionname'], 'admin_section_id='.$iSid);
	}
	elseif(isset($_POST['newsection']))
	{
		$sSecName = $_POST['newsection'];
		//get a table name for it
		print $sSecName;
		$sTableName = format_table_name('ab_admin_section_', $sSecName );
		//The path will be relative to its parent section
		if($iSid != NULL)
		{
			//Get the path of the parent section.
			$sParentPath = get_parent_path($iSid);
			$sURLPath = $sParentPath."/".format_table_name('',$sSecName);
		}
		else
		{
			$sURLPath = '/site/'.format_table_name('',$sSecName);
		}
		if(($sTableName != false) && ($sURLPath != false))
		{
			print $sTableName;
			print $sURLPath;
			insert_table_field("ab_admin_sections", 
								"(admin_section_name, admin_section_table_name, admin_section_url)", 
								"('".$sSecName."','".$sTableName."','".$sURLPath."')");
								
		}
	}
	
	$iPerm = get_user_perms($aUserParms[0], 1);
	if($iPerm >= 1)
	{
		$aMenu = load_menu($aUserParms[0]);
	}
	else
	{
		header("Location: ".SITE_URL."site/");
		die();
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
    	<?php //Render the edit_section menu. We've taken care of user authentication in header.
				$aRow = get_single_row('ab_admin_sections', $iSid);
				if($aRow != false)
				{
					//some section name was passed in GET
					print '<form action="';
					print SELF;
					if(!empty($iSid))
					{
						print "/?sid=".$iSid; 
					}
					print '" method="post" name="ab_edit_section_form">
					<table border="0" cellpadding="0" cellspacing="0">
    				<tr>
        			<td><div class="formlabel">Section Name:</div></td>
        			<td><input type="text" name="sectionname" value="'; 
					print $aRow[1]; 
					print '" class="textfield" /></td>
    				</tr>
					<tr>
        			<td class="dotrule" colspan="2"><img src="../../_img/spc.gif" width="1" height="15" alt="" border="0" /></td>
    				</tr>
    				<tr>
        			<td align="right" colspan="2"><input type="image" src="';
					print SITE_URL.DS.'_img/buttons/btn_submit.gif'; 
					print '" width="58" height="15" alt="" border="0" onfocus="this.blur();" name="Submit" /></td>
    				</tr>	
					</table>
					</form>'; //end print

					
				}
				else
				{
					//Create a new section
										//some section name was passed in GET
					print '<form action="';
					print SELF;
					if(!empty($iSid))
					{
						print "/?sid=".$iSid; 
					}
					print '" method="post" name="ab_create_section_form">
					<table border="0" cellpadding="0" cellspacing="0">
    				<tr>
        			<td><div class="formlabel">Section Name:</div></td>
        			<td><input type="text" name="newsection" value="'; 
					print $sSecName; 
					print '" class="textfield" /></td>
    				</tr>
					<tr>
        			<td class="dotrule" colspan="2"><img src="../../_img/spc.gif" width="1" height="15" alt="" border="0" /></td>
    				</tr>
    				<tr>
        			<td align="right" colspan="2"><input type="image" src="';
					print SITE_URL.DS.'_img/buttons/btn_submit.gif'; 
					print '" width="58" height="15" alt="" border="0" onfocus="this.blur();" name="Submit" /></td>
    				</tr>	
					</table>
					</form>'; //end print
				}
				?>

      </form></td>
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