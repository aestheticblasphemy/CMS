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
    <td><div align="right" class="txt24bb_white">Shuffling Arrays </div></td>
  </tr>
</table>
<div align="center"><br>
  
  <span class="txt14bb_white"><br>
  Let's shuffle an array like a deck of cards. </span><br>  
  <br>
</div>
<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
        <tr>
          <td class="txt14b_black">  
		  <?php
		  	echo "Let's create an array of 52 elements...<br><br>";
			$vals = range(1, 52);
			while (list(, $val) = each($vals)) {
				echo "$val, ";
			}
			echo "<br><br> ";
			
			echo "Let's shuffle the elements...<br><br>";
			$temp = $vals;
			shuffle($vals);
			
			while (list(, $val) = each($vals)) {
				echo "$val, ";
			}
		
			echo "<br><br> ";
			
			/*
			reset($temp);
			while (list(, $val) = each($temp)) {
				echo "$val, ";
			}
		
			echo "<br><br> ";
			
			reset($vals);
			while (list(, $val) = each($vals)) {
				echo "$val, ";
			}
		
			echo "<br><br> ";
			
			*/
		?>
		<br>
          <br>
          </p>          </td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
