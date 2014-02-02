<?php
	if (!isset($_SESSION['SESSION'])) require ( "../../include/session_init.php");
	
	//process the post variables...
	
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$email_addr = $_POST["email_addr"];
	$company_name = $_POST["company_name"];
	$phone = $_POST["phone"];
	$msg = $_POST["msg"];
	
	$server_name = $_SESSION['APP_SERVER'];
	
	// Construct the message....
	$mail = "
	<html>
	<head>
	  <title>$subject</title>
	</head>
	<body>
	  <p>".$subject."</p>
	  <table>
	   <tr>
		 <th>Name:</th><th>Company:</th><th>Email:</th><th>Phone</th>
	   </tr>
	   <tr>
		 <td>".$fname." ".$lname."</td><td>".$company."</td><td>".$email_addr."</td><td>".$phone."</td>
	   </tr>
	  </table>
	</body>
	</html>
	";
	
	// With HTML Emails we have to set the Content Type and MIME headers...
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	// Additional headers
	$headers .= "To: Brad Rogers <webmaster@quixelvideo.com>, Brian Maxx <bmaxx@quixelvideo.com>\r\n";
	$headers .= "From: sales@".$server_name."\r\n";
	$headers .= "Cc: webmaster@".$server_name."\r\n";
	$headers .= "Bcc: info@".$server_name."\r\n";
	$headers .= "X-Mailer: PHP/" . phpversion();  
	   
	// Send the email...
	if (!@mail($email_addr, $subject, $mail, $headers)) {
		echo "The mail could not be sent!<br>";
		echo "You would want a more robust message in html or return the user back to the form.<br>";
		echo "The @ sign in front of a function will suppress the warnings.<br>";
		echo "Try to submit a bad email and take off the @ sign to see the warnings.<br>";
		exit;
	}
	
	$mail = str_replace("\r\n", "<br>", $mail);
	$headers = str_replace("\r\n", "<br>", $headers);

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
    <td><div align="right" class="txt24bb_white">Process the Email2 </div></td>
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
                  <p align="center">The Message was sent.</p>
                  <p align="center"><strong>------</strong></p>                  
                  <p align="left" class="txt12_black"><?php echo $headers; ?></p>                  <p align="center">
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
