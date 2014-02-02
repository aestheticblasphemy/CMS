<?php
	header("Expires: Thu, 17 May 2001 10:17:17 GMT");    // Date in the past
	header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
	header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
	header ("Pragma: no-cache");                          // HTTP/1.0
	
	session_start();
	
	$_SESSION['LOGGEDIN'] = TRUE;
	$_SESSION['USERID'] = "12345";
	$_SESSION['USERNAME'] = "Brian";
	$_SESSION['SESSION'] = TRUE;
?>
<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
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
    <td><div align="right" class="txt24bb_white">Session Super Globals </div></td>
  </tr>
</table>
<br>

<br>

<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray">
        <tr>
          <td class="txt14b_black">
            <p align="center" class="txt12_black"><span class="txt16b_blue"> </span> <br>
              <span class="txt16b_blue">Checking the Session:</span><br>
              <br> 
              <?php
				echo "<B>LET'S CHECK THE SESSION VARIABLES:</B><br>";
				
				if (isset($_SESSION['LOGGEDIN'])) {
					if ($_SESSION['LOGGEDIN']) {
						echo "The user is logged in! \$_SESSION['LOGGEDIN'] = ", $_SESSION['LOGGEDIN'], "<br>";
						echo "What is the USERID? ", $_SESSION['USERID'], "<br>";
						echo "What is the USERNAME? ", $_SESSION['USERNAME'], "<br>";
						
						echo "We'll unset the username....";
						unset($_SESSION['USERNAME']);
						echo "What is the USERNAME?", $_SESSION['USERNAME'], "<br>";
						echo "See? It is no longer set!<br>";
					} else {
					echo "The user is not logged in!<br>";
					}
				} else {
					echo "The user is not logged in!<br>";
				}
				
				echo "<br><br><b>let's loop through the session...</b><br>";
				foreach ($_SESSION as $key => $val)  { 
				   echo "\$_SESSION['",$key,"'] = ", $_SESSION[$key], "<br>"; 
				} 			
				
				echo "<br><br><b>We'll unset the session variables...</b><br>";
				foreach ($_SESSION as $key => $val)  { 
					echo "unsetting... \$_SESSION['",$key,"']<br>";
					unset ($_SESSION[$key]); 
				} 
				
				echo "<br><br><b>let's loop through the session again...</b><br>";
				foreach ($_SESSION as $key => $val)  { 
				   echo "\$_SESSION['",$key,"'] = ", $_SESSION[$key], "<br>"; 
				}
				echo "Whoops! Nothing was output,<br>because the count of session vars is: ", count($_SESSION), ".<br>";
				
				$_SESSION['testing'] = 'hello!'; 
				if (isset($_SESSION['testing'])) echo "the 'testing' session variable was set.<br>";
				
				
	
			 ?>
	 <br>
              <br>
          </p></td>
        </tr>
    </table></td>
  </tr>
</table>
<br>
<br>
<p>&nbsp;</p>
</body>
</html>
