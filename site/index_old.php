<?php
	require_once("../_lib/_base/initialize.php");
	require_once(CLASS_PATH.DS."class.session.php");
	require_once(SITE_ROOT.DS."site".DS."logged_in.php");
	require_once(SITE_ROOT.DS."site".DS."no_login.php");
	require_once(BASE_PATH.DS."validation.php");
	require_once(BASE_PATH.DS."error_handling.php");
	require_once("header.php");
	
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
	}
}
else
{
	print "logged_in var not set";
	$_SESSION['logged_in'] = "no";
	$_SESSION['user'] = "anonymous";
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
	print "Post variable not set.";
	$sUser = $_SESSION['user'];
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AB || Home</title>
<link href="../_lib/_css/ab_blog_global.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p>
  <?php 
	load_header();
?>
</p>
<table class="content" width="100%" height="271" border="0">
  <caption>
    Content and Sidebar
  </caption>
  <tr>
    <td width="20%">&nbsp;</td>
  </tr>
</table>
<table class="footer" width="100%" border="0">
  <caption>
    Footer
  </caption>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>