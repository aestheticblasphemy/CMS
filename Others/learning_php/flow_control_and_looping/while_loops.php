<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>While and Do-While Loops</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../include/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="100%"  border="0" cellspacing="6" cellpadding="6">
  <tr>
    <td><div align="right" class="txt24bb_white">While and Do-While Loops </div></td>
  </tr>
</table>
<?php

echo "A While Loop:<BR>";
$value = 1;
while ($value <= 3) {
   echo $value, ", ";
   $value++;
}

echo"<BR>";
echo "An Alternative While Loop:<BR>";
$value = 1;
while ($value <= 3):
   echo $value, ", ";
   $value++;
endwhile;

echo"<BR>";
echo "A Do-While Loop:<BR>";
$value = 1;
do {
   echo $value, ", ";
   $value++;
} while ($value <= 3);

echo"<BR>";
?> 
<br>
<br>
<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="2" cellspacing="2" class="tbl_drk_gray">
        <tr class="txt24b_black">
          <td width="25%" class="tbl_drk_gray"><div align="center">
              h1
          </div></td>
          <td width="25%" class="tbl_drk_gray"><div align="center"> 
              h2
          </div></td>
          <td width="25%" class="tbl_drk_gray"><div align="center">
              h3
          </div></td>
          <td width="25%" class="tbl_drk_gray"><div align="center">
              h4
          </div></td>
        </tr>
        <tr class="txt24b_black">
		<?php
			// for ($i = 1; $i < 5; $i++) {
			$i = 1;
			while ($i < 5) {
				$class = "tbl_gray";
				switch ($i) {
					case 1:	$class = "tbl_gray"; break;
					case 2:	$class = "tbl_blue"; break;
					case 3:	$class = "tbl_green"; break;
					default: $class = "tbl_red";
				}
				
				echo "          <td class=\"$class\" align=\"center\">$i</td>\n"; 			
			
				$i++; // have to increment $i or you will be in an infinite loop!!!!
			}
			
				for ($j = 1; $j < 4; $j++) {
					echo "          <tr>\n"; 
					for ($i = 1; $i < 5; $i++) {
						$class = "tbl_gray";
						switch ($i) {
							case 1:	$class = "tbl_gray"; break;
							case 2:	$class = "tbl_gray"; break;
							case 3:	$class = "tbl_gray"; break;
							default: $class = "tbl_gray";
						}
					
						echo "          <td class=\"$class\" align=\"center\">$i</td>\n"; 			
					}
					echo "          </tr>\n"; 
				}
	
		 ?>
        </tr>
    </table></td>
  </tr>
</table>
<br>
<?php $i = 1; while ($i <= 6) { ?>
<br>
<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray">
        <tr>
          <td class="txt14b_black">
            <p align="center"><span class="txt16b_blue"> </span> <br>
              Box #<?php echo $i; $i++; ?> <br>
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
