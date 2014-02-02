<?php
	header("Expires: Thu, 17 May 2001 10:17:17 GMT");    // Date in the past
	header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
	header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
	header ("Pragma: no-cache");                          // HTTP/1.0
	
	session_start();
	// Unset session data
	//$_SESSION=array();
	// or...
	session_unset();
	// Clear the session cookie
	unset($_COOKIE[session_name()]);
	// Destroy session data
	session_destroy();
	
	header("Location: ../login_system.php");
	exit;
?>
