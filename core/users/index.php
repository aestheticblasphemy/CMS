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
/*Check for post variables and login acordingly */
if($_POST)
{
	$sUser = $_POST["user"];
	$sPass = $_POST["password"];
	
	    
    // validate user name
    if (!validUser($sUser)) {
        
        catchErr("Enter a valid user name");
        $FORMOK = false;
    }
    
    // validate user password
	/*
    if (!validPass($sPass)) {
        
        catchErr("Enter a valid password");
        $FORMOK = false;
    }
    */
    // if forms variables validated
    if ($FORMOK) {
        
        // assign array values
        $aArgs["User Name"] = $sUser;
        $aArgs["Password"] = $sPass;
        
        $oSess = new session;
        
        // try login and redirect
		$sPath = $oSess->login($aArgs);
		
		//Path wrt Base URL only
        if ($sPath) {
            $_SESSION['logged_in'] = "yes";
			$_SESSION['user'] = $sUser;
        }
		
    }
    
} else { // post vars not sent
    
    // initialize page vars
	$sUser = $_SESSION['user'];
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
//	$aMenu = load_menu($aUserParms[0]);
    $aMenu = get_permitted_app_list($aUserParms[0]);
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
        <td><a href="<?php print SELF?>">View User Profile</a></td>
      </tr>
      <tr>
        <td><a href="<?php print "edit_user.php";?>">Edit User Profile</a></td>
      </tr>
      <tr>
        <td>Logout</td>
      </tr>
    </table></td>
    <td width="1034" height="75%"><?php         $oSess = new session; 
												$aFields = $oSess->get_user_info("ab_admin_users_info"); 

												$sQuery = implode(",",$aFields);
												//print $sQuery;
												$testArgs = explode("|",$_SESSION["sUSER"]);
												settype($testArgs[0], "integer");
												$oSess->setUserId($testArgs[0]);
												$sUID = $testArgs[0];
												
												$sql = "SELECT ".$sQuery." FROM "." ab_admin_users_info".
														" WHERE ".$aFields[0]."=".$sUID.";";
												global $db;
	//											print $sql;
												$rsTmp = $db->query($sql);
												
												if($db->num_rows($rsTmp) >0)
												{
													$sOut = $db->fetch_array($rsTmp);
	//												print ("<pre>");
	//												print_r($sOut);
	//												print ("</pre>");
													print '<table class="content" width="1030" height="75%" border ="0">';
													for($i = 0; $i<count($sOut)/2;$i++)
//													foreach($sOut as $iKey=>$sField)
													{
	//													$i = 0;
														
														print "<tr><td>{$aFields[$i]}</td>";
														print "<td>";
														if(($sOut[$i]!='0')) print($sOut[$i]); print "</td></tr>";
//														$i++;
													}
												print '</table>';	
												}
												else
												{
													print "No User Info set yet";
												}
									?></td>
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