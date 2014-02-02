<?php
	header("Expires: Thu, 17 May 2001 10:17:17 GMT");    // Date in the past
  	header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
	header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
	header ("Pragma: no-cache");                          // HTTP/1.0
	session_start();
	
	if (!isset($_SESSION['SESSION'])) require ( "../../include/session_init.php");
	
	// reset session variables...
	$_SESSION['USERID'] = "";
	$_SESSION['LOGGEDIN'] = false;
	$_SESSION['EMAIL'] = "";
	$_SESSION['FNAME'] = "";
	$_SESSION['LNAME'] = "";

	// initialize variables...
	$userid = "";
	$passwd = "";
	$email = "";
	
	// make sure post parameters were sent...
	if (isset($HTTP_POST_VARS["userid"])) $userid = addslashes($HTTP_POST_VARS["userid"]);
	if (isset($HTTP_POST_VARS["passwd"])) $passwd = addslashes($HTTP_POST_VARS["passwd"]);
	
	$_SESSION['USERID'] = $userid;
	
	// form variables must have something in them...
	if ($userid == "" || $passwd == "" || !is_numeric ($userid)) { header("Location: ../login_system.php?flg=red&userid=".$userid); exit; }
	
	// check in database...
	 $query = "SELECT * FROM tbl_users WHERE iUserID = ".$userid;
	 
	 //echo $query;
	  mysql_pconnect($_SESSION['MYSQL_SERVER1'],$_SESSION['MYSQL_LOGIN1'],$_SESSION['MYSQL_PASS1'])
                   or die("Unable to connect to SQL server");
  	  mysql_select_db($_SESSION['MYSQL_DB1']) or die("Unable to select database");
		$result = mysql_query($query) or die("Invalid query: " . mysql_error());
		
		// if userid is not present in DB go back to login page...
		if (mysql_affected_rows() != 1) { header("Location: ../login_system.php?flg=red&userid=".$userid);; exit; }
		
		// check for password, active state, user type, and then send to appropriate section...
		if ($row = mysql_fetch_assoc($result)) {
			// echo $row['sPassword'] . "<br>" . md5($passwd);
			if (strcmp($row['sPassword'], md5($passwd)) != 0) { header("Location: ../login_system.php?flg=red&userid=".$userid); exit; }
				
			// set standard session variables...
			$_SESSION['LOGIN_TYPE'] = $user_type;
			$_SESSION['USERID'] = $userid;
			$_SESSION['EMAIL'] = $email;
			$_SESSION['LOGGEDIN'] = true;
			$_SESSION['FNAME'] = $row['sFName'];
			$_SESSION['LNAME'] = $row['sLName'];
			
			header("Location: ../account.php");
			exit;

		} else {
			header("Location: ../login_system.php?flg=red&userid=".$userid); exit;
		}		

?>
