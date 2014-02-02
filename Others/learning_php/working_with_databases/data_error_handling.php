<?php
	header("Expires: Thu, 17 May 2001 10:17:17 GMT");    // Date in the past
	header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
	header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
	header ("Pragma: no-cache");                          // HTTP/1.0
	
	session_start();

	if (!isset($_SESSION['SESSION'])) require ( "../include/session_init.php");
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
    <td><div align="right" class="txt24bb_white">Data Error Handling</div></td>
  </tr>
</table>
<div align="center">
  <p>
    <br>
      <span class="txt14bb_white">Checking for DB Errors:</span><br>
</p>
</div>
<div align="center">
  <table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
        <tr>
          <td class="txt14b_black"><p align="center" class="txt16b_blue">&nbsp;                  </p>
            <p align="center" class="txt12_red">
			
			<?php
				$connect = mysql_connect($_SESSION['MYSQL_SERVER1'], $_SESSION['MYSQL_LOGIN1'], $_SESSION['MYSQL_PASS1']);
				
				if (!mysql_select_db("this_is_not_a_db", $connect)) {
					echo mysql_errno($connect) . ": " . mysql_error($connect). "<br><br>";
				}
				
				// mysql_select_db("this_is_not_a_db2", $connect);
				if (!mysql_query("SELECT * FROM this_is_not_a_ttable", $connect)) {
					echo mysql_errno($connect) . ": " . mysql_error($connect) . "<br><br>";
				}
?> 
			</p>
            <p align="center" class="txt12_black"><br>
                <br>
              </p></td>
        </tr>
    </table></td>
  </tr>
</table>
<br>
<br>
</div>
</body>
</html>
