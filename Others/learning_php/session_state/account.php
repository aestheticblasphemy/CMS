<?php
	header("Expires: Thu, 17 May 2001 10:17:17 GMT");    // Date in the past
	header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
	header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
	header ("Pragma: no-cache");                          // HTTP/1.0
	
	session_start();

	if (!isset($_SESSION['SESSION'])) require ( "/include/session_init.php");
	
	if ($_SESSION['LOGGEDIN'] != true) {
			header("Location: login_system.php");
			exit;
	}

	
?>
<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Member Login</title>
<script language="JavaScript" src="/include/scripts/funcs1.js" type="text/javascript">
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="/include/main.css" type="text/css" />
<script language="JavaScript" src="/include/scripts/validations2.js">
</script>
<script language="JavaScript">
<!--
	function loadedPage() {
	
	}
	
	function submitForm() {
		if (isEmpty(document.forms[0].userid.value)) {
			alert("Please enter your UserID.");
			bSubmit = false;
			return false;
		}

		if (isEmpty(document.forms[0].passwd.value)) {
			alert("Please enter your Password.");
			bSubmit = false;
			return false;
		}
		
		document.forms[0].submit();

	}
	//-->
</script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="loadedPage();">
<table width="100%"  border="0" cellspacing="6" cellpadding="6">
  <tr>
    <td><div align="right" class="txt24bb_white">Login System </div></td>
  </tr>
</table>
	<br />
	<br />
	<form name="form1" id="form1" method="post" action="">
	  <table width="450" border="0" align="center" cellpadding="2" cellspacing="0" class="tbl_border">
        <tr>
          <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
              <tr>
                <td><p class="txt12_red">
                  <?php
				echo "Welcome Back ".$_SESSION['FNAME'].", ";
				
				echo "<br><br><b>let's loop through the session...</b><br>";
				foreach ($_SESSION as $key => $val)  { 
				   echo "\$_SESSION['",$key,"'] = ", $_SESSION[$key], "<br>"; 
				}	
			
			?>
</p>
                  <p align="center" class="txt12_red">
                    <input type="button" name="Submit" value="Logout" onclick="javascript:document.location='scripts/logout.php';" />
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="button" name="Submit2" value="Try the Login Page" onclick="javascript:document.location='login_system.php';" />
&nbsp;&nbsp;&nbsp;&nbsp;</p>
                  <p align="center" class="txt12_red"><br />
                      </p></td>
              </tr>
          </table></td>
        </tr>
      </table>
        </form>
</body>
</html>
