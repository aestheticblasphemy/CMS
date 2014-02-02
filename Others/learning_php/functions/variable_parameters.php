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
    <td><div align="right" class="txt24bb_white">Variable Parameter Lists </div></td>
  </tr>
</table>
  <p>&nbsp;</p>
  <table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
    <tr>
      <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
          <tr>
            <td class="txt14b_black">
              <p align="center">  <span class="txt16b_blue"><br>
              </span>View the source code for the php code. 
              </p>
              <p align="center" class="txt16b_blue">Output:
              <p align="center" class="txt12_black">
			<?php
			// find the average of a group of numbers
				function getAverage() {
					$total = 0;
					
					// let's get the number of arguments...
					$count = func_num_args();
					
					echo "There are $count numbers<br><br>";
					
					// iterate through the arguments...
					for ($i = 0; $i < $count; $i++) {
						$val = func_get_arg($i);
						if (!isset($val)) $val = 0;
						echo "adding : ", $val , "<br><br>";
						$total += $val;
					}
					
					echo "There total is $total.<br><br>";
					
					$avg = $total / $count;

					// return the average...
					return $avg;
					}
					
					$n1 = 15; $n2 = 25; $n3 = 50; $n4 = 100; $n5 = 1000; $n7=-1190;
					$amount = getAverage($n1, $n2, $n3, $n4, $n5, $n6, 10000, $n7);
					echo "<br>The average of the numbers is: ", $amount, ".<br>";
	
			?>
              </p></p>
            </td>
          </tr>
      </table></td>
    </tr>
  </table>
</body>
</html>
