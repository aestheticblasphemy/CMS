<?php
	require_once("../../_lib/_base/initialize.php");
	require_once(CLASS_PATH.DS."class.session.php");
	require_once(CLASS_PATH.DS."class.users.php");
	require_once(SITE_ROOT.DS."site".DS."logged_in.php");
	require_once(SITE_ROOT.DS."site".DS."no_login.php");
	require_once(BASE_PATH.DS."validation.php");
	require_once(BASE_PATH.DS."error_handling.php");
	require_once(SITE_ROOT.DS."site".DS."header.php");
		require_once(SITE_ROOT.DS."site".DS."modules".DS."sections".DS."manage_section.php");
	$redirect = SITE_URL."/site";
	
	if(!isset($_SESSION))
{
	print "starting session\n";
	session_start();
}

if(isset($_SESSION['logged_in']))
{
	if(!strcmp($_SESSION['logged_in'],"no"))
	{
		header("Location: ".SITE_ROOT.DS."site");
		die("Ooops");
	}
	     $oSess = new session;
		
		$testArgs = explode("|",$_SESSION["sUSER"]);
		settype($testArgs[0], "integer");
		$oSess->setUserId($testArgs[0]);	
}
else
{
	print "logged_in var not set";
	$_SESSION['logged_in'] = "no";
	$_SESSION['user'] = "anonymous";
	header("Location: ".SITE_ROOT.DS."site");
}
/*Check for post variables and login acordingly */
if($_POST)
{
	$sUser = $_SESSION["user"];
	$sPass = $_POST["password"];
	
	        
	if(!empty($sPass))
	{
    	if (!validPass($sPass)) {
        
        catchErr("Enter a valid password");
        $FORMOK = false;
    	}
	}

    // if forms variables validated
    if ($FORMOK) {
        
        // assign array values
  //      $aArgs["User Name"] = $sUser;
  //      $aArgs["Password"] = $sPass;
  //      $aArgs["Email"] = $_POST["email"];

		$aArgs["User Name"] = $testArgs[0];
		$aArgs["Password"] = $sPass;
		$aArgs["Email"] = $_POST["email"];
		

		
		$return = $oSess->updateSettings($aArgs);
					
    }
	else
	{
		$return = false;
		print "Somewthing wrong happened";
	}
    
} else { // post vars not sent
    
    // initialize page vars
	print "Post variable not set.";
	$sUser = $_SESSION['user'];
	$return = false;
	}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AB || Home</title>
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
	$aMenu = load_menu($aUserParms[0]);
?>
</p>
<table class="content" width="1299" height="271" border="0" align="center">
  <caption>
    Content and Sidebar
  </caption>
  <tr>
    <td width="255"><table class = "sidebar" width="100%" height="221" border="0">
      <tr>
        <td><?php render_menu($aMenu);?></td>
      </tr>
      <tr>
        <td><a href="<?php print  SITE_URL.DS."core".DS."users";?>">View User Profile</a></td>
      </tr>
      <tr>
        <td>Edit User Profile</td>
      </tr>
      <tr>
        <td>Logout</td>
      </tr>
    </table></td>
    <td width="1034" height="75%">
    	<table width = "1000" height="72%">
        	<tr>
				<td><?php print "User Profile for {$_SESSION['user']}"; ?>
				  <table width="100%" border="0">
				    <caption>
				      Change_Password
			        </caption>
				    <tr>
             			<td>
                        	<form id="update_user" name="update_user" method="post" action="<?php print SELF;?>">
                    		<table>
                            	<tr>
				      				<td><div class="formlabel"><label for="email">E-Mail</label></div></td><td><input type="text" name="email" id="email" /></td>
                                </tr>
                                <tr>
                                	<td><div class="formlabel"><label for="password">Password</label></div></td><td><input type="password" name="password" id="password"class="textfield" /></td>
                                </tr>
                                <tr>
        							<td class="dotrule" colspan="2"><img src="<?php print SITE_URL.DS."_img/spc.gif";?>" width="1" height="15" alt="" border="0" /></td>
    							</tr>
    							<tr>
        							<td align="right" colspan="2"><input type="image" src="<?php print SITE_URL.DS.'_img/buttons/btn_submit.gif';?>" 
                                	" width="58" height="15" alt="" border="0" onfocus="this.blur();" name="Submit" /></td>
    							</tr>
                             </table>
			          		 </form>
                         </td>
			        </tr>
		        </table></td>
            </tr>
            <tr>
            	<?php if($return == true) print "User Profile Updated"; else ?>
                <?php //display form to enter email and password here ?>
            </tr>
        </table>
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