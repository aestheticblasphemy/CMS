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
    <td><div align="right" class="txt24bb_white">Server Variables </div></td>
  </tr>
</table>
<div align="center">
  <form name="form1" method="GET" action="./scripts/show_server_variables.php">
    <div align="center">
      <p>
          <span class="txt14bb_white">Let's Process our Variables using POST and GET:</span><br>
      </p>
    </div>
    <div align="center">
      <table width="420" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
        <tr>
          <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_gray">
              <tr>
                <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
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
                    <td height="37" colspan="2" align="left" nowrap="nowrap" class="txt12b_black">
                      <input name="newsletter" type="checkbox" id="newsletter" value="1">
      Would you like to receive our newsletter?
      <div align="left"> </div></td>
                  </tr>
                  <tr>
                    <td height="37" colspan="2" align="left" nowrap="nowrap" class="txt12b_black"><input name="spam" type="checkbox" id="spam" value="1">
      Can we send your email to third-parties? </td>
                  </tr>
                  <tr>
                    <td colspan="2" align="left" nowrap="nowrap" class="txt12b_black">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="37" colspan="2" align="left" nowrap="nowrap" class="txt12b_black">What timeframe is best for you? </td>
                  </tr>
                  <tr class="txt12_black">
                    <td height="26" colspan="2" align="left" nowrap="nowrap"><input name="timeframe" type="radio" value="0-6">
      less than 6 months </td>
                  </tr>
                  <tr class="txt12_black">
                    <td height="26" colspan="2" align="left" nowrap="nowrap"><input name="timeframe" type="radio" value="6-12">
      6 months to 12 months </td>
                  </tr>
                  <tr class="txt12_black">
                    <td height="26" colspan="2" align="left" nowrap="nowrap">
                      <input name="timeframe" type="radio" value="12+">
      Longer than 1 year </td>
                  </tr>
                  <tr class="txt12_black">
                    <td height="26" colspan="2" align="left" nowrap="nowrap"><input name="timeframe" type="radio" value="0">
      I don't want to buy your software</td>
                  </tr>
                  <tr class="txt12_black">
                    <td height="26" colspan="2" align="left" nowrap="nowrap">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="37" colspan="2" align="left" nowrap="nowrap" class="txt12b_black">What best describes your education?</td>
                  </tr>
                  <tr class="txt12_black">
                    <td height="26" colspan="2" align="left" nowrap="nowrap"><input name="education" type="radio" value="high school">
      High School Graduate </td>
                  </tr>
                  <tr class="txt12_black">
                    <td height="26" colspan="2" align="left" nowrap="nowrap"><input name="education" type="radio" value="in college">
      Currently in College </td>
                  </tr>
                  <tr class="txt12_black">
                    <td height="26" colspan="2" align="left" nowrap="nowrap"><input name="education" type="radio" value="college graduate">
      College Graduate </td>
                  </tr>
                  <tr class="txt12_black">
                    <td height="26" colspan="2" align="left" nowrap="nowrap"><input name="education" type="radio" value="post-graduate">
      Post-Graduate</td>
                  </tr>
                  <tr class="txt12_black">
                    <td height="26" colspan="2" align="left" nowrap="nowrap"><input name="education" type="radio" value="other">
      Other</td>
                  </tr>
                  <tr>
                    <td height="26" colspan="2" align="left" nowrap="nowrap" class="txt12b_black">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="26" colspan="2" align="left" nowrap="nowrap" class="txt12b_black"><div align="center">
                        <p>
                          <input type="submit" name="Submit" value="Send Us Your Comments">
                  </p>
                        <p>&nbsp;      </p>
                    </div></td>
                  </tr>
                </table></td>
              </tr>
          </table></td>
        </tr>
      </table>
      
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </div>
  </form>
</div>
</body>
</html>
