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
    <td><div align="right" class="txt24bb_white">Substrings</div></td>
  </tr>
</table>
<div align="center"><br>
  <br>
  <br>
</div>
<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
        <tr>
          <td class="txt14b_black">
            <p align="center"><span class="txt16b_blue">Sample Output: </span><br>
              <br>
<?php
	$str = "The Quick Brown Fox.";
	echo $str, "<br><br>";
	$part = substr($str, 1);   
	echo $part, "<BR>";
	$part = substr($str, 1, 5);
	echo $part, "<BR>";
	$part = substr($str, 0, 7);
	echo $part, "<BR>";
	$part = substr($str, 0, 11);
	echo $part, "<BR><BR>";
	$part = substr($str, -1);   
	echo $part, "<BR>";
	$part = substr($str, 0, -7);
	echo $part, "<BR>";
	// doesn't matter how long this is below, only goes to the end of the string.
	$part = substr($str, -3, 111); 
	echo $part, "<BR>";
	$part = substr($str, -3, 5);
	echo $part, "<BR><BR>";
	
	echo "\$str{4} = ", $str{4}, "<BR>"; 
	echo "\$str{11} = ", $str{10}, "<BR>";
	
?>
<br>
              <br>
          </p></td>
        </tr>
    </table></td>
  </tr>
</table>

</body>
</html>
