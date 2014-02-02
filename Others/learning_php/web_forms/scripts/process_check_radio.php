<html>
<link href="../../include/main.css" rel="stylesheet" type="text/css">
<body>
<table width="100%"  border="0" cellspacing="6" cellpadding="6">
  <tr>
    <td><div align="right" class="txt24bb_white">Processed Info </div></td>
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
          <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
              <tr>
                <td class="txt12_black"><?php
	echo "<br>\$_SERVER['REQUEST_METHOD']:<br>", $_SERVER['REQUEST_METHOD'];
	echo "<br>\$_SERVER['QUERY_STRING']:<br>", $_SERVER['QUERY_STRING']; // ONLY WORKS WITH GET! NOT POST!!
	echo "<br>\$_SERVER['REQUEST_URI']:<br>", $_SERVER['REQUEST_URI'];
	echo "<br>\$_SERVER['HTTP_REFERER']:<br>", $_SERVER['HTTP_REFERER'];
	
	echo "<br><br>";

	if (count($_GET) > 0) { // $_GET is an array!! check the count!
		echo "There are GET parameters:<br>";
		foreach($_GET as $key => $value) {
				echo $key, ": ", $value, "<br>";
		}
	}
		
		
	if (count($_POST) > 0) { // $_POST is an array!! check the count!
		echo "There are POST parameters:<br>";
		foreach($_POST as $key => $value) {
				echo $key, ": ", $value, "<br>";
		}
	}
		
?>
                  <div align="center"><br>
                    <br>
                    <input name="button" type="button" onClick="javascript:document.location = '../checkboxes_radio_buttons.php';" value="Go Back to The Form">
                </div></td>
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