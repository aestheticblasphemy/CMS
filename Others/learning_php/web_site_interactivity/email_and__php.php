<?php
	$sFName = "George";
	$sLName = "Martin";
	$sEmail = "hello@hello.dom";
	$sSubject = "Proposal Ideas";
	$sCompany = "My Corp Inc.";
	$sPhone = "212-555-1212";
	$sMsg = "Hello there! This is my message to you.";	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../include/main.css" rel="stylesheet" type="text/css">
<script language="javascript">
	function SubmitForm() {
		form1.action = "scripts\\" + form1.select1.value;
		form1.submit();
	}

</script>
</head>
<body>
<table width="100%"  border="0" cellspacing="6" cellpadding="6">
  <tr>
    <td><div align="right" class="txt24bb_white">Sending Email in PHP </div></td>
  </tr>
</table>
<div align="center">
  <form name="form1" method="post" action="./scripts/process_email.php">
    <div align="center">
      <p>
          <span class="txt14bb_white">Your users can send email directly from a form. </span><br>
      </p>
    </div>
    <div align="center">
      <table width="320" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
        <tr>
          <td><table border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
              <tr>
                <td class="txt14b_black"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr height="1">
                    <td width="100" height="1"><img alt="" src="../web_forms/images/pixel.gif" width="1" height="1" /></td>
                    <td width="225"><img alt="" src="../web_forms/images/pixel.gif" width="1" height="1" /></td>
                    </tr>
                  <tr>
                    <td height="13"><img alt="" src="../web_forms/images/pixel.gif" width="1" height="1" /></td>
                    <td><img alt="" src="../web_forms/images/pixel.gif" width="1" height="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" valign="middle" nowrap="nowrap" class="txt12b_black">Script Example: </td>
                    <td height="37" align="left" valign="middle"><select name="select1" id="select1">
                      <option value="process_email.php" selected>Select an Email Script</option>
                      <option value="process_email.php">Simple</option>
                      <option value="process_email2.php">Intermediate</option>
                      <option value="process_email3.php">Advanced</option>
                                                            </select></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" nowrap="nowrap" class="txt12b_black">&nbsp;</td>
                    <td height="37" align="left" valign="middle">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" nowrap="nowrap" class="txt12b_black">First Name:</td>
                    <td height="37" align="left" valign="middle">
                      <div align="left">
                        <input name="fname" type="text" class="form-field" value="<?php echo $sFName; ?>" size="28" />
                      </div></td>
                    </tr>
                  <tr>
                    <td align="left" nowrap="nowrap" class="txt12b_black">Last Name:</td>
                    <td height="37">
                      <div align="left">
                        <input name="lname" type="text" class="form-field-lt-gry" value="<?php echo $sLName; ?>" size="28" maxlength="60" />
</div></td>
                    </tr>
                  <tr>
                    <td align="left" nowrap="nowrap" class="txt12b_black">Email Address:</td>
                    <td height="37">
                      <div align="left">
                        <input name="email_addr" type="text" class="form-field-lt-gry" value="<?php echo $sEmail; ?>" size="28" maxlength="120" />
                    </div></td>
                    </tr>
                  <tr>
                    <td height="37" align="left" nowrap="nowrap" class="txt12b_black">Subject:</td>
                    <td height="37"><div align="left">
                      <input name="subject" type="text" class="form-field-lt-gry" id="subject" value="<?php echo $sSubject; ?>" size="28" maxlength="120" />
                    </div></td>
                    </tr>
                  <tr>
                    <td align="left" nowrap="nowrap" class="txt12b_black">Company:</td>
                    <td height="37">
                      <div align="left">
                        <input name="company_name" type="text" class="form-field-lt-gry" value="<?php echo $sCompany; ?>" size="28" maxlength="100" />
                    </div></td>
                    </tr>
                  <tr>
                    <td align="left" nowrap="nowrap" class="txt12b_black">Phone Number:</td>
                    <td height="37">
                      <div align="left">
                        <input name="phone" type="text" class="form-field-lt-gry" value="<?php echo $sPhone; ?>" size="28" maxlength="25" />
</div></td>
                    </tr>
                  <tr>
                    <td height="37" align="left" nowrap="nowrap" class="txt12b_black">Message:</td>
                    <td align="right"><font class="text-required-orng">&nbsp;&nbsp;&nbsp;</font></td>
                    </tr>
                  <tr>
                    <td colspan="2" align="center" valign="bottom" class="text-form-fields-white">
                      <textarea name="msg" cols="40" rows="10" class="form-textfield-lt-gry" id="textarea2"><?php echo $sMsg; ?>
                </textarea>
                    </td>
                    </tr>
                  <tr>
                    <td colspan="2" class="text-form-fields-white">&nbsp;</td>
                    </tr>
                  <tr>
                    <td height="50" colspan="2" class="text-form-fields-white"><div align="center">
                        <input type="button" name="Button" value="Send Us Your Comments" onclick="SubmitForm()";>
                    </div></td>
                    </tr>
                  <tr height="1">
                    <td colspan="2" height="1" bgcolor="#fbfaf7"><img src="../web_forms/images/black_pixel.png" width="420" height="1" alt="" align="top" /></td>
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
</body>
</html>
