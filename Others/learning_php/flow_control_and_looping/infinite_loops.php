<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php


$rows = 10;
$cols = 4;
$arr = array(1, 2, 3, 4);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Break and Continue</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../include/main.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%"  border="0" cellspacing="6" cellpadding="6">
  <tr>
    <td><div align="right" class="txt24bb_white">Beware of Infinite Loops! </div></td>
  </tr>
</table>
<div align="center"><br>
  <br>
  <?php
  	// If $i was set to 1000 the while loop would never execute!
  	$i = 1001;
	while ($i > 1000 ) { 
		$i++; // comment this out and the loops goes on for ever!!!!!
			// with an infinite loop you have to hit stop on the browser.
		if ($i > 1010) break; // this is a failsafe. break is your friend.
?>
  <br>
</div>
<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray">
        <tr>
          <td class="txt14b_black">
            <p align="center"><span class="txt16b_blue"> </span> <br>
              Box #<?php echo $i ?> <br>
              <br>
          </p></td>
        </tr>
    </table></td>
  </tr>
</table>
<p><?php } ?></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
