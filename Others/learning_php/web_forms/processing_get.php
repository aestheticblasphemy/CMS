<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php
	$fname = "George";
	$lname = "Martin";
	$email_addr = "hello@hello.dom";
	$subject = "Proposal Ideas";
	$company_name = "My Corp Inc.";
	$phone = "212-555-1212";
	$msg = "Hello there! This is my message to you.";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../include/main.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%"  border="0" cellspacing="6" cellpadding="6">
  <tr>
    <td><div align="right" class="txt24bb_white">Processing GET</div></td>
  </tr>
</table>
<div align="center">
  <form name="form1" method="GET" action="./scripts/process_get.php">
    <div align="center">
      <p>
          <span class="txt14bb_white">Let's Process our Variables using GET: </span><br>
      </p>
    </div>
    <div align="center">
      <table width="320" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
        <tr>
          <td><table border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
              <tr>
                <td class="txt14b_black"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr height="1">
                    <td width="100" height="1"><img alt="" src="images/pixel.gif" width="1" height="1" /></td>
                    <td width="225"><img alt="" src="images/pixel.gif" width="1" height="1" /></td>
                  </tr>
                  <tr>
                    <td height="13"><img alt="" src="images/pixel.gif" width="1" height="1" /></td>
                    <td><img alt="" src="images/pixel.gif" width="1" height="1" /></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" nowrap="nowrap" class="txt12b_black">First Name:</td>
                    <td height="37" align="left" valign="middle">
                      <div align="left">
                        <input name="fname" type="text" class="form-field" value="<?php echo $fname; ?>" size="28" />
                    </div></td>
                  </tr>
                  <tr>
                    <td align="left" nowrap="nowrap" class="txt12b_black">Last Name:</td>
                    <td height="37">
                      <div align="left">
                        <input name="lname" type="text" class="form-field-lt-gry" value="<?php echo $lname; ?>" size="28" maxlength="60" />
                    </div></td>
                  </tr>
                  <tr>
                    <td align="left" nowrap="nowrap" class="txt12b_black">Email Address:</td>
                    <td height="37">
                      <div align="left">
                        <input name="email_addr" type="text" class="form-field-lt-gry" value="<?php echo $email_addr; ?>" size="28" maxlength="120" />
                    </div></td>
                  </tr>
                  <tr>
                    <td height="37" align="left" nowrap="nowrap" class="txt12b_black">Subject:</td>
                    <td height="37"><div align="left">
                      <input name="subject" type="text" class="form-field-lt-gry" id="subject" value="<?php echo $subject; ?>" size="28" maxlength="120" />
                    </div></td>
                  </tr>
                  <tr>
                    <td align="left" nowrap="nowrap" class="txt12b_black">Company:</td>
                    <td height="37">
                      <div align="left">
                        <input name="company_name" type="text" class="form-field-lt-gry" value="<?php echo $company_name; ?>" size="28" maxlength="100" />
                    </div></td>
                  </tr>
                  <tr>
                    <td align="left" nowrap="nowrap" class="txt12b_black">Phone Number:</td>
                    <td height="37">
                      <div align="left">
                        <input name="phone" type="text" class="form-field-lt-gry" value="<?php echo $phone; ?>" size="28" maxlength="25" />
                    </div></td>
                  </tr>
                  <tr>
                    <td height="37" align="left" nowrap="nowrap" class="txt12b_black">Message:</td>
                    <td align="right"><font class="text-required-orng">&nbsp;&nbsp;&nbsp;</font></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center" valign="bottom" class="text-form-fields-white">
                      <textarea name="msg" cols="40" rows="10" class="form-textfield-lt-gry" id="textarea2"><?php echo $msg; ?></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" class="text-form-fields-white">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="50" colspan="2" class="text-form-fields-white"><div align="center">
                        <input type="submit" name="Submit" value="Send Us Your Comments">
                    </div></td>
                  </tr>
                  <tr height="1">
                    <td colspan="2" height="1" bgcolor="#fbfaf7"><img src="images/black_pixel.png" width="420" height="1" alt="" align="top" /></td>
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
