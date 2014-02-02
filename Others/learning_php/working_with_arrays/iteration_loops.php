<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php
	$ar_values = array( 100 , 217 , 333 , 212 , 11 , 44, 17, 89, 109 );
	
	$ar_values2 = array(43, 22, 17, 1, 10 => 14,  5 => 12, 77, 17 => 56);
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
    <td><div align="right" class="txt24bb_white">Interation Arrays Loops </div></td>
  </tr>
</table>
<div align="center">
  <p>
    <br>
      <span class="txt14bb_white">A great, fast way to iterate through loops: </span>
<br>
</p>
</div>
<div align="center">
  <table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
        <tr>
          <td class="txt14b_black"><p align="center" class="txt16b_blue">                  Array 1:</p>
            <p align="center"> 
                <?php 
					reset ($ar_values);
					while (list ($key, $val) = each ($ar_values)) {
						echo $key . ' => ' . $ar_values[$key] . "<BR>";
					}
				?> 
                <br>
                <br>
                
              <span class="txt16b_blue">Array 1 another way:</span></p>
            <p align="center">
            <?php 
				reset($ar_values);
				$value = current ($ar_values);
				echo "the current array value is: $value.<br>";
				$value = next ($ar_values);
				echo "the next array value is: $value.<br>";
				$value = next ($ar_values);
				echo "the next array value is: $value.<br>";
				echo "the current key is: ", key($ar_values), ".<br>";
				echo "now resetting the array.<br>";
				reset($ar_values);
				echo "the current key is: ", key($ar_values), ".<br>";
				echo "going to the end of the array.<br>";
				end($ar_values);
				echo "the current key is: ", key($ar_values), ".<br>";
			?>
            <br>
            <br>
              </p>
            </td>
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
</div>
</body>
</html>
