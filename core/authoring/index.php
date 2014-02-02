<?php
	require_once("../../_lib/_base/basics.php");
//	require_once(CLASS_PATH.DS."class.session.php");
	require_once("/site/logged_in.php");
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
<title>Content Management</title>
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
	$iPerm = get_user_perms($aUserParms[0], 2);
	if($iPerm >= 1)
	{
		$aMenu = load_menu($aUserParms[0]);
	}
	else
	{
		header("Location: ".SITE_URL."site/");
		die();
	}
	if((isset($_POST['post_type'])) && (isset($_POST['category'])) && (isset($_POST['title'])) && (isset($_POST['content'])) )
	{
		global $db;
		//Get the table name for the selected category		
		$sql = "SELECT admin_section_table_name FROM ab_admin_sections WHERE admin_section_name='".$_POST['category']."';";
		
		$rsTmp = $db->query($sql);
		$sTableName = $db->fetch_array($rsTmp);
		
		if($sTableName != false)
		{
			$res = insert_table_field($sTableName[0], "(section_blog_create_date,section_blog_modify_date,section_blog_author_id,section_blog_pub_stat,section_blog_title,section_blog_content)",
			"('".date('Y-m-d H:i:s', time())."','".date('Y-m-d H:i:s', time())."', 1, 0, '".$_POST['title']."','".$_POST['content']."')");

		}
	}
	else
	{
		$res = false;
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
    	<?php /*Load the create post page */
				$aSections = show_sections();
				$iCount = count($aSections);
		?>
        <form id="create" name="createpost" method="post" action="<?php print SELF;?>">
          <table width="100%" border="0">
            <tr>
              <td><div>Create Post: <?php if($res == true) { print "	Created Post Successfully";} ?></div></td>
            </tr>
            <tr>
              <td><table width="100%" border="0">
                <tr>
                    <td><div>Post Type 
                     	 <select name="post_type" id="post_type">
                        <option value="1">Blog Post</option>
                        <option value="2">Article</option>
                        <option value="3">Photo Post</option>
                    </select></div></td>
                    <td><div>Post Section
                     <select name="category" id="category">
                      <?php for($i=0;$i<$iCount;$i++)
					  {
					  	print '<option value='.$aSections[$i][1].'>'.$aSections[$i][1].'</option>';
					  }
					  ?>
                    </select></div></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td><div>Post Title
                  <input type="text" name="title" id="title" />
              </div></td>
            </tr>
            <tr>
              <td><div>Post Content</div>
                <div>
                  <textarea name="content" id="content" cols="150" rows="20"></textarea>
              </div></td>
            </tr>
            <tr>
              <td><div>Post Summary</div>
                <div>
                  <textarea name="summary" id="summary" cols="150" rows="5"></textarea>
              </div></td>
            </tr>
            <tr>
              <td><div>Labels
                  <input name="labels" type="text" id="labels" value="" size="150" />
              </div></td>
            </tr>
            <tr>
                    <?php print  '<td align="right" colspan="2"><input type="image" src="';
						print SITE_URL.DS.'_img/buttons/btn_submit.gif'; 
						print '" width="58" height="15" alt="" border="0" onfocus="this.blur();" name="Submit" /></td>';
						?>
            </tr>
          </table>
      </form></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="75%">&nbsp;</td>
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