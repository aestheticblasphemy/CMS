<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php
	$fname = "George";
	$lname = "Martin";
	$email_addr = "hello@hello.dom";
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
    <td><div align="right" class="txt24bb_white">Selection Lists </div></td>
  </tr>
</table>
<div align="center">
  <form name="form1" method="GET" action="./scripts/process_lists.php">
    <div align="center">
      <p>
          <span class="txt14bb_white">Let's Process our Variables using POST and GET:</span><br>
      </p>
    </div>
    <div align="center">
      <table width="420" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
        <tr>
          <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
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
                    <td height="26" colspan="2" align="left" nowrap="nowrap" class="txt12b_black">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="26" colspan="2" align="left" nowrap="nowrap" class="txt12b_black">What is your education Level? </td>
                  </tr>
                  <tr>
                    <td height="26" colspan="2" align="left" nowrap="nowrap" class="txt12b_black"><p><select name="education" id="education">
                      <option value="-1" selected>Please select one...</option>
                            <option value="1">High School</option>
                            <option value="2">Some College</option>
                            <option value="3">College Grad</option>
                            <option value="4">Post Grad</option>
                            <option value="99">Other</option>
                          </select>
                      </p>                      </td>
                  </tr>
                  <tr>
                    <td height="26" colspan="2" align="left" nowrap="nowrap" class="txt12b_black">What Operating Systems do you use? </td>
                  </tr>
                  <tr>
                    <td height="26" colspan="2" align="left" nowrap="nowrap" class="txt12b_black">                      
					<select name="operating_system[]" size="5" multiple id="operating_system">
                      <option value="-1" selected>Please select one or more...</option>
                      <option value="Windows">Windows</option>
                      <option value="OS X">Mac OS X</option>
                      <option value="OS 9">Older Mac</option>
                      <option value="Linux">Linux</option>
                      <option value="Other">Other</option>
                                                                                                      </select></td>
                  </tr>
                  <tr>
                    <td height="26" colspan="2" align="left" nowrap="nowrap" class="txt12b_black">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="26" colspan="2" align="left" nowrap="nowrap" class="txt12b_black">
					<select name="OS[]" size="5" multiple id="OS">
                      <option value="-1" selected>Please select one or more...</option>
                      <option>Windows</option>
                      <option>Mac OS X</option>
                      <option>Older Mac</option>
                      <option>Linux</option>
                      <option>Other</option>
                     </select></td>
                  </tr>
                  <tr>
                    <td height="26" colspan="2" align="left" nowrap="nowrap" class="txt12b_black">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="26" colspan="2" align="left" nowrap="nowrap" class="txt12b_black"><div align="center">
                        <input type="submit" name="Submit" value="Send Us Your Comments">
                    </div></td>
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
