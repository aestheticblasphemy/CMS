<?php
	header("Expires: Thu, 17 May 2001 10:17:17 GMT");    // Date in the past
	header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
	header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
	header ("Pragma: no-cache");                          // HTTP/1.0
	
	session_start();

	if (!isset($_SESSION['SESSION'])) require ( "../include/session_init.php");
	//echo $_SESSION['LOGGEDIN'];
	if ($_SESSION['LOGGEDIN'] == true) {
			header("Location: account.php");
			exit;
	}
	
	$_SESSION['FORM_SUBMITTED'] = "";

  $CRLF = chr(13).chr(10);
	$userid = "";
	
	if (isset($HTTP_GET_VARS["userid"])) $userid = $HTTP_GET_VARS["userid"];
	if ($userid == '') { if (isset($_SESSION['userid'])) $userid = $_SESSION['userid']; }
		
	// if the bFlg is true then some validation problems in the data.
	// namely a blank field or a submission without the feedback page.
	// just present a general error...
	
	$flg = "";
	$error = "";
	if (isset($HTTP_GET_VARS["flg"])) $flg = $HTTP_GET_VARS["flg"];
	
	switch ($flg) {
		case "yellow":
			$error = "<font class=\"txt_main_str12_mar\"><BR>Your Account Has Not Been Verified.<BR>Check your email for Activation Instructions.<br>Click <a href=\"/courses/forgot_login.php\">here</a> to have the activation email resent.</font>";
			break;
		case "red":
			$error = "<font class=\"txt_main_str12_mar\"><BR>That userid/password combination is not in our database.<br>Please Try Again.</font>";
			break;
		case "blue":
			$error = "<font class=\"txt_main_str12_mar\"><BR>Your Session has Expired.<br>Please Login Again.</font>";
			break;
		default:
			$error = "        <br>";
	}
	
?>
<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Member Login</title>
<script language="JavaScript" src="/include/scripts/funcs1.js" type="text/javascript">
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="/include/main.css" type="text/css" />
<script language="JavaScript" src="/include/scripts/validations2.js">
</script>
<script language="JavaScript">
<!--
	function loadedPage() {
	
	}
	
	function submitForm() {
		if (isEmpty(document.forms[0].userid.value)) {
			alert("Please enter your UserID.");
			bSubmit = false;
			return false;
		}

		if (isEmpty(document.forms[0].passwd.value)) {
			alert("Please enter your Password.");
			bSubmit = false;
			return false;
		}
		
		document.forms[0].submit();

	}
	//-->
</script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="loadedPage();">
<table width="100%"  border="0" cellspacing="6" cellpadding="6">
  <tr>
    <td><div align="right" class="txt24bb_white">Login System </div></td>
  </tr>
</table>
	<br />
	<br />
	<table width="450" border="0" align="center" cellpadding="2" cellspacing="0" class="tbl_border">
      <tr>
        <td><table width="450" border="0" align="center" cellpadding="0" cellspacing="0" class="tbl_white">
          <tr height="5">
            <td width="10" height="5"><img alt="" src="/images/pixel.gif" width="1" height="1" /></td>
            <td width="430"><img alt="" src="/images/pixel.gif" width="1" height="1" /></td>
            <td width="10"><img alt="" src="/images/pixel.gif" width="1" height="1" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td valign="top">              <form action="./scripts/loggedin.php" method="post" name="form1" id="form1">
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="25" class="txt_main_str14"><div align="center"><strong><a href="user_registration.php">Not a member yet? Signup Online!</a></strong></div></td>
                  </tr>
                  <tr>
                    <td class="txt_main13"><div align="center"></div></td>
                  </tr>
              </table>
                <div align="center" class="txt12_red"> <?php print $error ?></div>
                <table width="422" border="0" cellpadding="0" cellspacing="0" align="center">
                  <tr>
                    <td height="25" valign="bottom" class="txt_main"><div align="center">Having problems? Contact <a href="mailto:support@blah.dom">Customer Support</a></div></td>
                  </tr>
                  <tr>
                    <td valign="top">&nbsp;</td>
                  </tr>
                </table>
                <table width="400" border="0" align="center" cellpadding="2" cellspacing="0" class="tbl_border">
                  <tr>
                    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
                        <tr>
                          <td><table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                              <tr height="1">
                                <td width="19" height="1"><img alt="" src="/images/pixel.gif" width="1" height="1" /></td>
                                <td width="133" height="1"><img alt="" src="/images/pixel.gif" width="1" height="1" /></td>
                                <td width="249" height="1"><img alt="" src="/images/pixel.gif" width="1" height="1" /></td>
                                <td width="19" height="1"><img alt="" src="/images/pixel.gif" width="1" height="1" /></td>
                              </tr>
                              <tr>
                                <td height="30"><img alt="" src="/images/pixel.gif" width="1" height="1" /></td>
                                <td align="center" class="txt12b_black">User ID:</td>
                                <td align="center" class="txt_main_str16"><input name="userid" type="text" class="form-field-white-sm" id="userid8" value="<?php echo $userid ?>" size="24" maxlength="30" />
                                </td>
                                <td><img alt="" src="/images/pixel.gif" width="1" height="1" /></td>
                              </tr>
                              <tr>
                                <td height="35"><img alt="" src="/images/pixel.gif" width="1" height="1" /></td>
                                <td align="center" class="txt12b_black">
                                  <div align="center">Password: </div></td>
                                <td align="center"><input name="passwd" type="password" class="form-field-white-sm" id="passwd5" size="24" maxlength="30" />
                                </td>
                                <td><img alt="" src="/images/pixel.gif" width="1" height="1" /></td>
                              </tr>
                              <tr>
                                <td height="35">&nbsp;</td>
                                <td align="center" class="txt12_black"><a href="javascript:alert('placeholder for a real page');">Forgot your password?</a></td>
                                <td align="center" class="txt_main_str16"><input type="submit" name="Submit" value="Submit" onclick="submitForm();" /></td>
                                <td>&nbsp;</td>
                              </tr>
                          </table></td>
                        </tr>
                    </table></td>
                  </tr>
                </table>
              <table width="97%" border="0" align="center" cellpadding="0" cellspacing="0" class="txt12_black">
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td class="txt_main_str12"><div align="left"><font class="text-body-title-lg-orng" style="linespacing:120%">Enter your User ID and Password to access this site</font><br />
                        <strong>forgetten password:</strong> please <a href="javascript:alert('placeholder for a real page');">click here</a> to have it resent.<br />
                <br />
                <br />
                    </div></td>
                  </tr>
              </table>
            </form></td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table>
</body>
</html>
