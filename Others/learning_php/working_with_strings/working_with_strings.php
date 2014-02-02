<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php
	$str = 'Hello World! You\'ve seen me before!';
	$str2 = '"Hello World!" You\'ve seen me before!';
	
	$str3 = 'This should not be so popular but you can
	extend strings across multiple lines, even with an assignment.
	You end the string when you end the quotes - single or double.';
	
	$str4 = 'A better way to extend a string is to end quotes on each line'.
	' Then you use the dot to concatenate lines of strings together!'.
	' This is a more effective way to extend strings!';
	
	$str5 = "A better way to extend a string is to end quotes on each line".
	" Then you use the dot to concatenate lines of strings together!".
	" Note that I used \" instead of ' !";
	
	$str6 = "The quick";
	$str7 = "brown fox";
	$str8 = "jumped over the lazy dog.";
	$str9 = $str6 + $str7 + $str8; // this is wrong... this is math!!
	$str10 = $str6.$str7.$str8; // concatenate your strings!
	$str11 = $str6." ".$str7." ".$str8; // use enough spaces!
	
?> 
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
    <td><div align="right" class="txt24bb_white">Working with Strings </div></td>
  </tr>
</table>
<br>

<br>

<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
        <tr>
          <td class="txt14b_black"><p align="center"><span class="txt16b_blue">Output our Sample Strings:</span><br>
              <p><?php 
			  	echo "\$str (strlen is ", strlen($str)."):<br>", $str, "<br><br>";
				echo "\$str2 (strlen is ", strlen($str2)."):<br>", $str2, "<br><br>";
				echo "\$str3 (strlen is ", strlen($str3)."):<br>", $str3, "<br><br>";
				echo "\$str4 (strlen is ", strlen($str4)."):<br>", $str4, "<br><br>";
				echo "\$str5 (strlen is ", strlen($str5)."):<br>", $str5, "<br><br>";
				echo "\$str9 (strlen is ", strlen($str9)."):<br>", $str9, " <- THIS IS WRONG!<br><br>";
				echo "\$str10 (strlen is ", strlen($str10)."):<br>", $str10, "<br><br>";
				echo "\$str11 (strlen is ", strlen($str11)."):<br>", $str11, "<br><br>";
			?></p>
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
<p><br>
                
</p>
</body>
</html>
