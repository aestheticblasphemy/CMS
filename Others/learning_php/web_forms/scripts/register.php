<?php

$debug = FALSE;

/************************************************************
   Adjust the headers...
************************************************************/
	header("Expires: Thu, 17 May 2001 10:17:17 GMT");    // Date in the past
  	header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
	header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
	header ("Pragma: no-cache");                          // HTTP/1.0

/*****************************************************************************
   Check the session details.
   we will store all the post variables in session variables
   this will make it easier to work with the verification routines
*****************************************************************************/
	session_start();


	if (!isset($_SESSION['SESSION'])) require_once( "../include/session_init.php" );

	$arVal = array();
	require_once("../include/session_funcs1.php");
		
	reset ($_POST);
	while (list ($key, $val) = each ($_POST)) {
		if ($val == "") $val = "NULL";
		$arVals[$key] = (get_magic_quotes_gpc()) ? $val : addslashes($val); // O\'reilly
		if ($val == "NULL")
			$_SESSION[$key] = NULL;
		else
			$_SESSION[$key] = $val;

		if ($key != "access_period" && $key != "passwd") $arVals[$key] = "'".$arVals[$key]."'";
		if ($debug) echo $key . " : " . $arVals[$key] . "<br>";
	}

/**********************************************************************************************
   Make sure session variables have been set and then check for required fields
   otherwise return to the registration form to fix the errors.
**********************************************************************************************/

	// check to see if these variables have been set...
	if ((!isset($_SESSION["fname"])) || (!isset($_SESSION["lname"])) || (!isset($_SESSION["email"])) ||  (!isset($_SESSION["phone"]))
		 || (!isset($_SESSION["city"])) || (!isset($_SESSION["state"])) || (!isset($_SESSION["pcode"]))) {
		 resendToForm("?flg=red");
	}
		// form variables must have something in them...
	if ($_SESSION['fname'] == "" || $_SESSION['lname'] == "" || $_SESSION['email'] == "" || $_SESSION['phone'] == "" || $_SESSION['addr1'] == ""
		 || $_SESSION['city'] == "" || $_SESSION['state'] == "" || $_SESSION['pcode'] == "") {
		resendToForm("?flg=red");
	}
	
	// make sure fields are within the proper range...
	if (strlen($_SESSION['fname']) > 35 || strlen($_SESSION['mname']) > 35 || strlen($_SESSION['lname']) > 35
		|| strlen($_SESSION['email']) > 35 || strlen($_SESSION['phone']) > 35 
		|| strlen($_SESSION['addr1']) > 35 || strlen($_SESSION['addr2']) > 40
		|| strlen($_SESSION['city']) > 35 || strlen($_SESSION['state_name']) > 35 
		|| strlen($_SESSION['pcode']) > 35 || strlen($_SESSION['phone']) > 30 || strlen($_SESSION['passwd']) > 30) {
		resendToForm("?flg=white");
	}
	
	// make sure fields are within the proper range... cut off any extra...
	if (strlen($_SESSION['q1']) > 60) $_SESSION['q1'] = substr($_SESSION['q1'],0,60);
	if (strlen($_SESSION['q2']) > 60) $_SESSION['q2'] = substr($_SESSION['q2'],0,60);
	if (strlen($_SESSION['q3']) > 60) $_SESSION['q3'] = substr($_SESSION['q3'],0,60);

	
/**********************************************************************************************
  Check the DB for records...
**********************************************************************************************/

	// check for the email already in the database...
	$query = "SELECT COUNT(sEmail) FROM tbl_users where sEmail = '".$_SESSION['email']."'";
	if ($debug) echo "<br>SQL STATEMENT:<br>".$query."<br><br>";
	
	mysql_pconnect($_SESSION['MYSQL_SERVER1'],$_SESSION['MYSQL_LOGIN1'],$_SESSION['MYSQL_PASS1'])
                   or die("Unable to connect to SQL server");
    mysql_select_db($_SESSION['MYSQL_DB1']) or die("Unable to select database");
   
	 $result = mysql_query($query) or die("Invalid query (login): " . mysql_error());
	 $row = mysql_fetch_row($result);
	 
	if ($row[0] > 0) {  // an email aleady exists in the database, because the row count > 0...
		resendToForm("?flg=yellow");
	}	
	
	/* WHEN YOU INSERT USE MD5 for Passwords!!!! */
	$password = $arVals['passwd'];
	$arVals['passwd'] = "'".md5($arVals['passwd'])."'";
	
/**********************************************************************************************
  Insert into the database...
**********************************************************************************************/
	
	$query = "INSERT INTO tbl_users (sFName, sMName, sLName, sAddr1, sAddr2, sCity, sState, sPCode, "
		."cCountryCode, sPhone, sEmail, sPassword, sQ1, sQ2, sQ3, sAccessPeriod) "
		."VALUES (".$arVals['fname'].", ".$arVals['mname'].", ".$arVals['lname'].", ".$arVals['addr1'].", ".$arVals['addr2']
		.", ".$arVals['city'].", ".$arVals['state'].", ".$arVals['pcode'].", 'US'"
		.", ".$arVals['phone'].", ".$arVals['email'].", ".$arVals['passwd'].", ".$arVals['q1'].", ".$arVals['q2']
		.", ".$arVals['q3'].", ".$arVals['access_period'].")";

	//echo $query;

	$result = mysql_query($query) or die("Invalid query: " . mysql_error() . "<br><br>". $query);
	$insertid = mysql_insert_id();
	
	SendMail($insertid, $password);
	
	function SendMail($userid, $password) {
			// Construct the message....
			$mail = "Hello ".$_SESSION['fname'].",\n\nThank your for your email.\nWe look forward to your evaluation of our product.\n\n";
			$mail .= "Here is your userid: ".$userid."\n\n";
			$mail .= "Here is your password: ".$password."\n\n";
			$mail .= "Name: ".$_SESSION['fname']." ".$_SESSION['lname']."\n";
			$mail .= "Company: ".$_SESSION['company_name']."\n";
			$mail .= "Email Address: ".$_SESSION['email']."\n";
			$mail .= "Phone: ".$_SESSION['phone']."\n\n";
			$mail .= "Best Regards,\nCustomer Service\n\n";
			
			// If any lines are larger than 70 characters, we will use wordwrap()
			$message = wordwrap($mail, 70);
			
			// Send the email...
			mail($_SESSION['email'], 'Welcome to Our Site', $message, "From: info@invisiontek.com\r\n");
			
			$mail = str_replace("\n", "<br>", $mail);		
			echo "<b>The following mail was sent:</b><br>".$mail;
		}	
	
	/*** This following function will update session variables and resend to the form so the user can fix errors ***/

	function resendToForm($flags) {
			reset ($_POST);
			// store variables in session...
			while (list ($key, $val) = each ($_POST)) {
				$_SESSION[$key] = $val;
			}	
			// go back to the form...
			//echo $flags;
			header("Location: ../user_registration.php".$flags);
			exit;
	}
					
?>
<p>SUCCESS!<br>
  The data was entered in the database!<br>
  You probably want to redirect to a thank you page or send an email to the user for confirmation.<br>
  <br>
  <br>
  Here are the variables...<br>
  
<?php
	reset ($arVals);
	while (list ($key, $val) = each ($arVals)) {
		echo $key . " : " . $arVals[$key] . "<br>";
	}
	
	echo "<br><br>The SQL Statment was:<br>";
	echo $query."<br><br><br><br>";
?>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
