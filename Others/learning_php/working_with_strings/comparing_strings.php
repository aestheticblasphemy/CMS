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
    <td><div align="right" class="txt24bb_white">Comparing Strings </div></td>
  </tr>
</table>
<div align="center"><br>

  <br>

</div>
<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
        <tr>
          <td class="txt14b_black"><p align="center"><span class="txt16b_blue"><br>
</span>int<span class="txt14_green"> <strong>strcmp </strong> ( string </span>str1<span class="txt14_green">, string </span>str2<span class="txt14_green"> ) </span><span class="txt16b_blue"><br>
<br>
</span><span class="txt12_black"><strong>Returns:</strong><br>
 If <strong>$str1 == $str2 </strong>strcmp returns <strong>0</strong>. <br>
If <strong>$str1&nbsp; &gt; $str2 </strong>strcmp returns <strong>1</strong>. <br>
If <strong>$str1&nbsp; &lt; $str2</strong> strcmp returns <strong>-1</strong>.</span>
              
          <br>
          <br>
          <span class="txt16b_blue">There are other functions:</span><br>
          ereg(), strcasecmp(), substr(), stristr(), strncasecmp(), strncmp(), and strstr().          <br>
          <br>
          </td>
        </tr>
    </table></td>
  </tr>
</table>
<br>
<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
        <tr>
          <td class="txt14b_black">
            <p align="center"><span class="txt16b_blue">Sample Output: </span><br>
              <br>
<?php

 	$p1 = "pass1";
	$p2 = "pass1";
	echo "\$p1 = '$p1' and \$p2 = '$p2'<br>";
	echo "strcmp(\$p1, \$p2) will return ", strcmp($p1, $p2), "<br><br>";
	
	$p1 = "pass2";
	$p2 = "pass1";
	echo "now \$p1 = '$p1' and \$p2 = '$p2'<br>";
	echo "strcmp(\$p1, \$p2) will return ", strcmp($p1, $p2), "<br><br>";
	
	$p1 = "pass1";
	$p2 = "password";
	echo "now \$p1 = '$p1' and \$p2 = '$p2'<br>";
	echo "strcmp(\$p1, \$p2) will return ", strcmp($p1, $p2), "<br><br>";
	
	
	if (strcmp($p1, $p2)) {
		// $p1 and $p2 are NOT the same.
		echo "\$p1 and \$p2 are not the same!<BR>";
	  } else {
		// $p1 and $p2 are the same.
		echo "\$p1 and \$p2 are the same!<BR>";
	  }

	  if ($p1 == $p2) {
		// $pw1 and $pw2 are the same.
		echo "\$p1 and \$p2 are the same!<BR>";
	  } else {
		// $pw1 and $pw2 are NOT the same.
		echo "\$p1 and \$p2 are not the same!<BR>";
  } 
	
?>
<br>
              <br>
          </p></td>
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
</body>
</html>
