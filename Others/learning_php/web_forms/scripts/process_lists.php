<html>
<link href="../../include/main.css" rel="stylesheet" type="text/css">
<body>
<table width="100%"  border="0" cellspacing="6" cellpadding="6">
  <tr>
    <td><div align="right" class="txt24bb_white">Processed Lists </div></td>
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
			if (is_array($_GET[$key])) $value = "<b>".join (", ", $_GET[$key])."</b>";
			echo $key, ": ", $value, "<br>";
		}
	}
	
	echo "<br>The 'OS' parameter has ", count($_GET['OS']), " value(s).<br>";
	if (isset($_GET['OS']))
		foreach($_GET['OS'] as $key => $value) {
			echo $key, ": ", $value, "<br>";
		}
		
	echo "<br>The 'operating_system' parameter has ", count($_GET['operating_system']), " value(s).<br>";
	if (isset($_GET['operating_system']))
		foreach($_GET['operating_system'] as $key => $value) {
			echo $key, ": ", $value, "<br>";
		}
		
	echo "<br>The 'fname' parameter has ", count($_GET['fname']), " value(s).<br>";
	if (is_array($_GET['fname'])) {
		foreach($_GET['fname'] as $key => $value) {
			echo $key, ": ", $value, "<br>";
		}	
	} else {
		echo "0: ", $_GET['fname'], "<br>";
	}
?>
                  <div align="center"><br>
                    <br>
                    <input name="button" type="button" onClick="javascript:document.location = '../selection_lists.php';" value="Go Back to The Form">
                </div></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <p><br>
      </p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;          </p>
    </div>
  </form>
</div>
</body>
</html>