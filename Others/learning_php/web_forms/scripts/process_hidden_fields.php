<?php

	// echo(isset($_GET["Submit"]));
	if (isset($_GET["Submit"])) {
		$fname =  $_GET["fname"];
		$lname = $_GET["lname"];
		$email_addr = $_GET["email_addr"];
		$suprise = $_GET["suprise"];
		$h1 = $_GET["h1"];
		$status = $_GET["status"];	
	}
	
	// The following code is a nice alternative...
	$i = -1;
	$ar_fields = array('fname', 'lname', 'email_addr', 'suprise', 'h1', 'status');
	foreach($_GET as $key => $value) {
		if (in_array($key, $ar_fields)) {
			// echo $key, ": ", $value, "<br>";
			$$key = $value;
		}
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
    <td><div align="right" class="txt24bb_white">Processed GET</div></td>
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
                    <td height="37" colspan="2" align="left" nowrap="nowrap" class="txt12b_black"><div align="left" class="txt16b_blue">Hidden Fields... </div></td>
                    </tr>
                  <tr>
                    <td align="left" nowrap="nowrap" class="txt12b_black">suprise:</td>
                    <td height="37" class="txt12_black">
                      <div align="left"><?php echo $suprise; ?> </div></td>
                    </tr>
                  <tr>
                    <td align="left" nowrap="nowrap" class="txt12b_black">h1:</td>
                    <td height="37" class="txt12_black">
                      <div align="left"><?php echo $h1; ?> </div></td>
                    </tr>
                  <tr>
                    <td height="37" align="left" nowrap="nowrap" class="txt12b_black">status:</td>
                    <td align="left" class="txt12_black"><?php echo $status; ?>&nbsp;&nbsp;&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="2" class="text-form-fields-white">&nbsp;</td>
                    </tr>
                  <tr>
                    <td height="50" colspan="2" class="text-form-fields-white"><div align="center">
                        <input type="button" onClick="javascript:document.location = '../hidden_fields.php';" value="Go Back to The Form">
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
