<?php
	if (!isset($_SESSION['SESSION'])) require ( "../../include/session_init.php");

	//process the post variables...
	
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$email_addr = $_POST["email_addr"];
	$company_name = $_POST["company_name"];
	$subject = $_POST["subject"];
	$phone = $_POST["phone"];
	$msg = $_POST["msg"];
	
	// Construct the message....
	$mail = "Hello $fname,\n\nThank your for your email.\nWe look forward to your evaluation of our product.\n\n";
	$mail .= "Here is the information you have given us:\n\n";
	$mail .= "Name: ".$fname." ".$lname."\n";
	$mail .= "Company: ".$company_name."\n";
	$mail .= "Email Address: ".$email_addr."\n";
	$mail .= "Phone: ".$phone."\n\n";
	$mail .= "Subject: ".$subject."\n";
	$mail .= "Your Message:\n".$msg."\n\n\n";
	$mail .= "Best Regards,\nCustomer Service\n\n";
	
	// If any lines are larger than 70 characters, we will use wordwrap()
	$message = wordwrap($message, 70);
	
	// Send the email...
	mail($email_addr, $subject, $mail, "From: info@".$_SESSION['APP_SERVER']."\r\n");
	
	$mail = str_replace("\n", "<br>", $mail);

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
    <td><div align="right" class="txt24bb_white">Process the Email </div></td>
  </tr>
</table>
<div align="center">
  <form name="form1" method="post" action=".././scripts/process_email.php">
    <div align="center">
      <p>
          <span class="txt14bb_white">The Message:</span><br>
      </p>
    </div>
    <div align="center">
      <table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
        <tr>
          <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
              <tr>
                <td class="txt14b_black"><p align="center">&nbsp;</p>
                  <p align="center">The Message:</p>                  <p align="left" class="txt12_black"><?php echo $mail; ?>&nbsp; </p>
                <p align="center">
                  <input type="button" name="Button" value="Back to the Email Form" onclick="document.location='../email_and__php.php';">
                </p>
                <p align="center">&nbsp;</p></td>
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
