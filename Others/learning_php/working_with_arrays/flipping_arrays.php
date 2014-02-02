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
    <td><div align="right" class="txt24bb_white">Flipping Arrays </div></td>
  </tr>
</table>
<div align="center"><br>
  
  <span class="txt14bb_white"><br>
  Flipping an array will exchange the keys and values. </span><br>  
  <br>
</div>
<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
        <tr>
          <td class="txt14b_black">  
		  <?php
		  		
				$ar_values["a"] = 100;
				$ar_values['b'] = 200;
				$ar_values['c'] = 300;
				// Now flip the array....
				$ar_flipped = array_flip($ar_values);
				
				echo "Display the array...<br><br>";
				echo print_r($ar_values), "<BR><BR>";
				echo "Display the flipped array...<br><br>";
		  		echo print_r($ar_flipped), "<BR>";
		  
		   ?><br>
          <br>
          </p>          </td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
