<?php
	header("Expires: Thu, 17 May 2001 10:17:17 GMT");    // Date in the past
  	header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
	header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
	header ("Pragma: no-cache");                          // HTTP/1.0
	session_start();

	if (!isset($_SESSION['SESSION'])) require ( "../include/session_init.php");
	
	$arVals = array();
	require_once("../include/session_funcs1.php");
	// make sure the seesion vars are initialized...
	reset ($arVals);
	while (list ($key, $val) = each ($arVals)) {
		if (!isset($_SESSION[$key])) $_SESSION[$key] = "";
		if ($_SESSION[$key] == "NULL") $_SESSION[$key] = "";
	}
	
	if ($_SESSION["access_period_sel"] == "") $_SESSION["access_period_sel"] = 0; 
	if ($_SESSION["state_sel"] == "") $_SESSION["state_sel"] = 0; 
	if ($_SESSION["q1_sel"] == "") $_SESSION["q1_sel"] = 0; 
	if ($_SESSION["q2_sel"] == "") $_SESSION["q2_sel"] = 0; 
	if ($_SESSION["q3_sel"] == "") $_SESSION["q3_sel"] = 0; 
	
	// if the bFlg is true then some validation problems in the data.
	// namely a blank field or a submission without the feedback page.
	// just present a general error...
	
	$flg = "";
	$error = "";
	if (isset($HTTP_GET_VARS["flg"])) $flg = $HTTP_GET_VARS["flg"];
	
	switch ($flg) {
		case "yellow":
			$error = "<br><font class=\"txt12_red\">That Email Address already exists in our Database.<br>Please Select Another.<BR></font>";
			break;
		case "red":
			$error = "<br><font class=\"txt12_red\">Please fill out all the required fields.<br>Please Try Again.<BR></font>";
			break;
		case "blue":
			$error = "<br><font class=\"txt12_red\">Your Session has Expired.<br>Please Login Again.</font><BR>";
			break;
		case "pink":
			$error = "<br><font class=\"txt12_red\"><BR>The Special Code you entered is not valid.<br>Please Try Again or Leave that field blank.</font><BR>";
			break;
		case "white":
			$error = "<br><font class=\"txt12_red\"><BR>The fields are too long for our Database.<br>Please correct your data via this form.</font><BR>";
			break;
		default:
			$error = "";
	}
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../include/main.css" rel="stylesheet" type="text/css">
<script language="javascript">
	function SubmitForm() {
		var form = document.forms[0];
		var bRequired = true;
		if ((form.access_period.selectedIndex < 1) ||
		(form.fname.value.length < 1) ||
		(form.lname.value.length < 1) ||
		(form.email.value.length < 1) ||
		(form.phone.value.length < 1) ||
		(form.addr1.value.length < 1) ||
		(form.city.value.length < 1) ||
		(form.pcode.value.length < 1) ||
		(form.passwd.value.length < 1) ||
		(form.passwd2.value.length < 1) ||
		(form.state.selectedIndex < 1) ||
		(form.q1.selectedIndex < 1) ||
		(form.q2.selectedIndex < 1) ||
		(form.q3.selectedIndex < 1)) {
			alert("Please fill out all the required fields.");
			bRequired = false;
		}
		
		if (!bRequired) return false;
		
		form.q1_sel.value = form.q1.selectedIndex;
		form.q2_sel.value = form.q2.selectedIndex;
		form.q3_sel.value = form.q3.selectedIndex;
		form.access_period_sel.value = form.access_period.selectedIndex;
		form.state_sel.value = form.state.selectedIndex;
		
		form.submit();
	}
		
	function FormFill() {
		var form = document.forms[0];

		form.fname.value = "George";
		form.lname.value = "Lee";
		form.email.value = "info@invisiontek.com";
		form.phone.value = "212-555-1212";
		form.addr1.value = "101 New York Ave.";
		form.city.value = "New York";
		form.pcode.value = "10101";
		form.passwd.value = "123456";
		form.passwd2.value = "123456";
		form.state.selectedIndex = 37;
		form.access_period.selectedIndex = 2;
		form.q1.selectedIndex = 1;
		form.q2.selectedIndex = 2;
		form.q3.selectedIndex = 2;
			
	}

</script>
</head>
<body>
<table width="100%"  border="0" cellspacing="6" cellpadding="6">
  <tr>
    <td><div align="right" class="txt24bb_white">User Registration</div></td>
  </tr>
</table>
<div align="center">
  <form name="form1" method="post" action="./scripts/register.php">
     <input name="state_sel" type="hidden" value="<?php echo $_SESSION['state_sel'] ?>" />
    <input name="q1_sel" type="hidden" value="<?php echo $_SESSION['q1_sel'] ?>" />
    <input name="q2_sel" type="hidden" value="<?php echo $_SESSION['q2_sel'] ?>" />
    <input name="q3_sel" type="hidden" value="<?php echo $_SESSION['q3_sel'] ?>" />
    <input name="access_period_sel" type="hidden" id="access_period_sel" value="<?php echo $_SESSION['access_period_sel'] ?>" />
    <div align="center">
      <p>
          <span class="txt14bb_white">A Robust Registration Form. </span><br>
      </p>
    </div>
    <div align="center">
      <table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
        <tr>
          <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
              <tr>
                <td class="txt14b_red"><table width="426" border="0" align="center" cellpadding="0" cellspacing="0" class="txt12b_black">
                  <tr>
                    <td width="15"></td>
                    <td width="142"></td>
                    <td width="220"></td>
                    <td width="47"></td>
                    </tr>
                  <tr>
                    <td colspan="4" class="txt24b_black">Registration Form</td>
                  </tr>
					<tr>
                    <td colspan="4" align="center"><?php echo $error; ?>
                      <div align="left"></div></td>
                  </tr>
                  <tr height="7">
                    <td height="7"><img src="images/bgcolor_pixel.gif" width="1" height="1" /></td>
                    <td height="7"><img src="images/bgcolor_pixel.gif" width="1" height="1" /></td>
                    <td height="7"><img src="images/bgcolor_pixel.gif" width="1" height="1" /></td>
                    <td height="7"><img src="images/bgcolor_pixel.gif" width="1" height="1" /></td>
                    </tr>
                  <tr height="20">
                    <td height="40">&nbsp;</td>
                    <td height="40" class="txt12_black"><div align="left">Membership Options:</div></td>
                    <td height="40" align="right" class="txt_main12"><select name="access_period" class="form-list-white-nar-sm" id="access_period">
                        <option value="">Select Your Membership
                        <option value="7">One Week ($7.00)
                        <option value="15">One Month ($15.00)
                        <option value="20">One Semester ($20.00)            
                          </select>
                    </td>
                    <td height="40"><font class="text-required-orng">&nbsp;<img src="../images/required_field.gif" width="8" height="9" hspace="0" vspace="0" border="0" align="top" /></font></td>
                    </tr>
                  <tr height="20">
                    <td height="26">&nbsp;</td>
                    <td height="26" class="txt12_black"><div align="left">First Name:</div></td>
                    <td height="26" align="right" class="txt_main12">
                      <input name="fname" type="text" class="form-field-white-nar-sm" value="<?php echo $_SESSION['fname']  ?>" size="30" maxlength="50" />
                    </td>
                    <td height="26"><font class="text-required-orng">&nbsp;<img src="../images/required_field.gif" width="8" height="9" hspace="0" vspace="0" border="0" align="top" /></font></td>
                    </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="26" class="txt12_black"><div align="left">Middle Name:</div></td>
                    <td align="right" class="txt_main12"><input name="mname" type="text" class="form-field-white-nar-sm" id="mname" value="<?php echo $_SESSION['mname']  ?>"  size="30" maxlength="50" />
                    </td>
                    <td><font class="text-required-orng">&nbsp;</font></td>
                    </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="26" class="txt12_black"><div align="left">Last Name:</div></td>
                    <td align="right" class="txt_main12"><input name="lname" type="text" class="form-field-white-nar-sm" id="lname4" value="<?php echo $_SESSION['lname']  ?>"  size="30" maxlength="50" />
                    </td>
                    <td><font class="text-required-orng">&nbsp;<img src="../images/required_field.gif" width="8" height="9" hspace="0" vspace="0" border="0" align="top" /></font></td>
                    </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="26" class="txt12_black"><div align="left">Email Address:</div></td>
                    <td align="right"><input name="email" type="text" class="form-field-white-nar-sm" id="email4" value="<?php echo $_SESSION['email']  ?>" size="30" maxlength="80" /></td>
                    <td><font class="text-required-orng">&nbsp;<img src="../images/required_field.gif" width="8" height="9" hspace="0" vspace="0" border="0" align="top" /></font></td>
                    </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="26" class="txt12_black"><div align="left">Billing Phone:</div></td>
                    <td align="right"><input name="phone" type="text" class="form-field-white-nar-sm" id="phone5" value="<?php echo $_SESSION['phone']  ?>" size="30" maxlength="30" />
                    </td>
                    <td><font class="text-required-orng">&nbsp;<img src="../images/required_field.gif" width="8" height="9" hspace="0" vspace="0" border="0" align="top" /></font></td>
                    </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="26" class="txt12_black"><div align="left">Mailing Address:</div></td>
                    <td align="right"><input name="addr1" type="text" class="form-field-white-nar-sm" id="addr1" value="<?php echo $_SESSION['addr1']  ?>" size="30" maxlength="80" />
                    </td>
                    <td><font class="text-required-orng">&nbsp;<img src="../images/required_field.gif" width="8" height="9" hspace="0" vspace="0" border="0" align="top" /></font></td>
                    </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="26" class="txt12_black">&nbsp;</td>
                    <td align="right"><input name="addr2" type="text" class="form-field-white-nar-sm" id="address24" value="<?php echo $_SESSION['addr2']  ?>" size="30" maxlength="70" />
                    </td>
                    <td>&nbsp;</td>
                    </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="26" class="txt12_black"><div align="left">City:</div></td>
                    <td align="right"><input name="city" type="text" class="form-field-white-nar-sm" id="city" value="<?php echo $_SESSION['city']  ?>" size="30" maxlength="50"/></td>
                    <td><font class="text-required-orng">&nbsp;<img src="../images/required_field.gif" width="8" height="9" hspace="0" vspace="0" border="0" align="top" /></font></td>
                    </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="30" class="txt12_black"><div align="left">State/Province:</div></td>
                    <td align="right"><select name="state" class="form-list-white-nar-sm">
                        <option value="">Select Your State</option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AS">American Samoa</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District of Columbia</option>
                        <option value="FM">Federated States of Micronesia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="GU">Guam</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MH">Marshall islands</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="MP">Northern Mariana Islands</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PW">Palau</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VI">Virgin Islands</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                      </select>
                    </td>
                    <td><font class="text-required-orng">&nbsp;<img src="../images/required_field.gif" width="8" height="9" hspace="0" vspace="0" border="0" align="top" /></font></td>
                    </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="30" class="txt12_black"><div align="left">Zip/Postal Code:</div></td>
                    <td align="right"><input name="pcode" type="text" class="form-field-white-nar-sm" id="pcode4" value="<?php echo $_SESSION['pcode'] ?>" size="30" maxlength="40" />
                    </td>
                    <td><font class="text-required-orng">&nbsp;<img src="../images/required_field.gif" width="8" height="9" hspace="0" vspace="0" border="0" align="top" /></font></td>
                    </tr>
                  <tr height="10">
                    <td height="10"><img src="images/bgcolor_pixel.gif" width="1" height="1" /></td>
                    <td height="10" colspan="2" align="right"><img src="images/bgcolor_pixel.gif" width="1" height="1" /></td>
                    <td height="10"><img src="images/bgcolor_pixel.gif" width="1" height="1" /></td>
                    </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="28" colspan="2" valign="middle" class="txt12_black"><div align="left">Which of the following best describes you?</div></td>
                    <td>&nbsp;</td>
                    </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="26" colspan="2" align="right" valign="middle"><select name="q1" class="form-field-white-nar-lg" id="q1">
                        <option>Please Make a Selection            
                        <option value="College student">College student 
                        <option value="Student at another college or university">Student at another college or university
                        <option value="Studying independently">Studying independently
                        <option value="Decline to state">Decline to state
                      </select>
                    </td>
                    <td><font class="text-required-orng">&nbsp;<img src="../images/required_field.gif" width="8" height="9" hspace="0" vspace="0" border="0" align="top" /></font></td>
                    </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="38" colspan="2" valign="middle" class="txt12_black"><div align="left">If you are a student at Pierce College, in which section are you currently enrolled?</div></td>
                    <td>&nbsp;</td>
                    </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="26" colspan="2" align="right" valign="top" class="txt12_black"><select name="q2" class="form-field-white-nar-lg" id="q2">
                        <option>Please Make a Selection</option>
                        <option value="Section One">Section One
                        <option value="Section Two">Section Two
                        <option value="Section Three">Section Three
                        <option value="Section Four">Section Four            
                      </select>
                    </td>
                    <td><font class="text-required-orng">&nbsp;<img src="../images/required_field.gif" width="8" height="9" hspace="0" vspace="0" border="0" align="top" /></font></td>
                    </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="28" colspan="2" valign="middle" class="txt12_black"><div align="left">Which best describes your background?</div></td>
                    <td>&nbsp;</td>
                    </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="26" colspan="2" align="right" valign="top" class="txt12_black"><select name="q3" class="form-field-white-nar-lg" id="q3">
                        <option>Please Make a Selection </option>
                        <option value="Some Trig">Some Trig</option>
                        <option value="Geometry but no trig">Geometry, but no trig</option>
                        <option value="Decline to state">Decline to state</option>
                                          </select>
                    </td>
                    <td><font class="text-required-orng">&nbsp;<img src="../images/required_field.gif" width="8" height="9" hspace="0" vspace="0" border="0" align="top" /></font></td>
                    </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="28" colspan="2" valign="middle" class="txt12_black"><div align="left">Please select a password for your account:</div></td>
                    <td>&nbsp;</td>
                    </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="26" colspan="2" align="right" valign="top" class="txt12_black"><input name="passwd" type="password" class="form-field-white-nar-sm" id="passwd" size="20" maxlength="40" />
                    </td>
                    <td><font class="text-required-orng">&nbsp;<img src="../images/required_field.gif" width="8" height="9" hspace="0" vspace="0" border="0" align="top" /></font></td>
                    </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="28" colspan="2" valign="middle" class="txt12_black"><div align="left">Re-enter your password to confirm:</div></td>
                    <td>&nbsp;</td>
                    </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="26" colspan="2" align="right" valign="top"><input name="passwd2" type="password" class="form-field-white-nar-sm" id="passwd2" size="20" maxlength="40" />
                    </td>
                    <td><font class="text-required-orng">&nbsp;<img src="../images/required_field.gif" width="8" height="9" hspace="0" vspace="0" border="0" align="top" /></font></td>
                    </tr>
                  <tr height="35">
                    <td height="35">&nbsp;</td>
                    <td height="35" colspan="2" align="right" valign="bottom" class="txt_main_str12">&nbsp;&nbsp;&nbsp;
                      <input type="reset" name="Submit2" value="Reset">                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="button" name="Submit" value="Submit" onclick="SubmitForm();  return false;" ></td><td height="35">&nbsp;</td>
                    </tr>
                  <tr height="15">
                    <td height="25">&nbsp;</td>
                    <td height="25" colspan="2" align="right">&nbsp;</td>
                    <td height="25">&nbsp;</td>
                  </tr>
                  <tr height="15">
                    <td height="25">&nbsp;</td>
                    <td height="25" colspan="2" align="right"><span class="txt_main_str12">
                      <input type="button" name="Submit3" value="Fill With Samples" onclick="FormFill();  return false;" >
                    </span></td>
                    <td height="25">&nbsp;</td>
                  </tr>
                  <tr height="15">
                    <td height="25"><img src="images/bgcolor_pixel.gif" width="1" height="1" /></td>
                    <td height="25" colspan="2" align="right"><img src="images/bgcolor_pixel.gif" width="1" height="1" /></td>
                    <td height="25"><img src="images/bgcolor_pixel.gif" width="1" height="1" /></td>
                    </tr>
                </table></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <br>
    </div>
  </form>
</div>
<script language="javascript">
	// set the selection box values...

	var form = document.forms[0];
	form.access_period.selectedIndex = parseInt("<?php echo $_SESSION['access_period_sel'] ?>");
	form.state.selectedIndex = parseInt("<?php echo $_SESSION['state_sel'] ?>");
	form.q1.selectedIndex = parseInt("<?php echo $_SESSION['q1_sel'] ?>");
	form.q2.selectedIndex = parseInt("<?php echo $_SESSION['q2_sel'] ?>");
	form.q3.selectedIndex = parseInt("<?php echo $_SESSION['q3_sel'] ?>");

</script>
</body>
</html>
