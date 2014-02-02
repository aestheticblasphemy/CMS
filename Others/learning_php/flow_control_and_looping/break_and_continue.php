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
    <td><div align="right" class="txt24bb_white">break and continue </div></td>
  </tr>
</table>
<div align="center"><br> 
  <span class="txt14bb_white">Take a look at the source and find the &quot;continue&quot; statement. </span><br>
  <br>
  <?php for ($i = 0; $i <= 6; $i++) { 
  		echo "<div align='center'>i is equal to $i</div>";
		if ($i > 4) break;

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

<?php
	foreach ($arr as $i) { 
?><br>

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
</body>
</html>
