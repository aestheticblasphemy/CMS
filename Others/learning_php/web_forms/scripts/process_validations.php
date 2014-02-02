<?php
$value = ini_get('magic_quotes_gpc');
echo "ini_get('magic_quotes_gpc') = ", $value;

$fname = ini_get('magic_quotes_gpc') ? stripslashes($_POST['fname']) : $_POST['fname'];
	   

	// echo(isset($_POST["Submit"]));
	if (isset($_POST["Submit"])) {
		// $fname =  $_POST["fname"];
		$lname = $_POST["lname"];
		$email_addr = $_POST["email_addr"];
		$subject = $_POST["subject"];
		$company_name = $_POST["company_name"];
		$phone = $_POST["phone"];	
		$msg = $_POST["msg"];
	}
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../../include/main.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%"  border="0" cellspacing="6" cellpadding="6">
  <tr>
    <td><div align="right" class="txt24bb_white">Processed POST</div></td>
  </tr>
</table>
<div align="center">
  <form name="form1" method="GET">
    <div align="center">
      <p>
          <span class="txt14bb_white">Here is the output of the processed variables: </span><br>
      </p>
    </div>
    <div align="center">
      <table width="320" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
        <tr>
          <td><table border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
              <tr>
                <td class="txt14b_black"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr height="1">
                    <td width="100" height="1"><img alt="" src="../images/pixel.gif" width="1" height="1" /></td>
                    <td width="225"><img alt="" src="../images/pixel.gif" width="1" height="1" /></td>
                    </tr>
                  <tr>
                    <td height="13"><img alt="" src="../images/pixel.gif" width="1" height="1" /></td>
                    <td><img alt="" src="../images/pixel.gif" width="1" height="1" /></td>
                    </tr>
                  <tr>
                    <td align="left" valign="middle" nowrap="nowrap" class="txt12b_black">First Name:</td>
                    <td height="37" align="left" valign="middle" class="txt12_black">
                      <div align="left"><?php echo $fname; ?></div></td>
                    </tr>
                  <tr>
                    <td align="left" nowrap="nowrap" class="txt12b_black">Last Name:</td>
                    <td height="37" class="txt12_black">
                      <div align="left"><?php echo $lname; ?> </div></td>
                    </tr>
                  <tr>
                    <td align="left" nowrap="nowrap" class="txt12b_black">Email Address:</td>
                    <td height="37" class="txt12_black">
                      <div align="left"><?php echo $email_addr; ?> </div></td>
                    </tr>
                  <tr>
                    <td height="37" align="left" nowrap="nowrap" class="txt12b_black">Subject:</td>
                    <td height="37" class="txt12_black"><div align="left"><?php echo $subject; ?>
                    </div></td>
                    </tr>
                  <tr>
                    <td align="left" nowrap="nowrap" class="txt12b_black">Company:</td>
                    <td height="37" class="txt12_black">
                      <div align="left"><?php echo $company_name; ?> </div></td>
                    </tr>
                  <tr>
                    <td align="left" nowrap="nowrap" class="txt12b_black">Phone Number:</td>
                    <td height="37" class="txt12_black">
                      <div align="left"><?php echo $phone; ?> </div></td>
                    </tr>
                  <tr>
                    <td height="37" align="left" nowrap="nowrap" class="txt12b_black">Message:</td>
                    <td align="right"><font class="text-required-orng">&nbsp;&nbsp;&nbsp;</font></td>
                    </tr>
                  <tr>
                    <td colspan="2" align="center" valign="bottom" class="txt12_black"><?php echo $msg; ?>
                    </td>
                    </tr>
                  <tr>
                    <td colspan="2" class="text-form-fields-white">&nbsp;</td>
                    </tr>
                  <tr>
                    <td height="50" colspan="2" class="text-form-fields-white"><div align="center">
                        <input type="button" onClick="javascript:document.location = '../processing_post.php';" value="Go Back to The Form">
                    </div></td>
                    </tr>
                  <tr height="1">
                    <td colspan="2" height="1" bgcolor="#fbfaf7"><img src="../images/black_pixel.png" width="420" height="1" alt="" align="top" /></td>
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
      <p><br>
                                              </p>
    </div>
  </form>
</div>
</body>
</html>
