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
    <td><div align="right" class="txt24bb_white">Using and Defining Functions </div></td>
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
				// add two numbers together
				function add($number1, $number2) {
				
					return $number1 + $number2;
				}
				
				function add_again($number1, $number2) {
					$sum = $number1 + $number2;
					return $sum;
				}
				
				function list_parameters($str, $int, $bool) {
					echo $str, ", ", $int, ", ", $bool, "<br>";
				}
				
				
				$sum = add(1000, 2000);
				echo "The value of \$number1 + \$number2 is: ", add(1000, 2000), "<br>";
				echo "The value of \$number1 + \$number2 is: ", add(2400, 3200), "<br>";
				$int1 = 250;
				$int2 = 300;
				echo "The value of \$number1 + \$number2 is: ", add($int1, $int2), "<br>";
				
				echo "The parameters values are:", list_parameters("hi there!", 2000, TRUE);
				
						
				// set default parameter values...
				function list_parameters2($str1, $str2 = "default") {
						echo $str1, ", ", $str2 , "<br>";
				}
				
				echo "The parameters are: ", list_parameters2("testing"), "<br>";
				
				
				$ar = array("Apple", "Ice Cream", "Danish");
				
				// passing an array...
				function check_array($array) {
					foreach ($array as $k => $v) {
						echo $k, "; ", $v, "<br>";
					}
					
					echo "<br>";
					return array_reverse($array);
				}
				
				check_array($ar);
				
				foreach ($ar as $k => $v) {
					echo $k, "; ", $v, "<br>";
				}
				echo "<br>";
				$ar = check_array($ar);
				
				foreach ($ar as $k => $v) {
					echo $k, "; ", $v, "<br>";
				}
				echo "<br>";
					
				// passing an array by reference...
				function check_array2(&$array) {
					foreach ($array as $k => $v) {
						echo $k, "; ", $v, "<br>";
					}
					$array = array_reverse($array);
					echo "<br>";
				}
				
				check_array2($ar);

				foreach ($ar as $k => $v) {
					echo $k, "; ", $v, "<br>";
				}
				echo "<br>";
					
				// returning values by reference...
				function do_something($bool, &$str1, &$int1, $str2) {
					$str1 = "I am changing forever!";
					$int1 = 999;
					$str2 = "I am changing here only!";
					
					if ($bool)
						return FALSE;
					else
						return TRUE;
				}
				
				$s1 = "I am now set!";
				$i1 = 1;
				$s2 = "I am now set, as well!";
				$bool = TRUE;
				
				echo "values:", $bool, ", ", $s1, ", " ,$i1, ", ",$s2, "<br>";
				$bool = do_something(TRUE, $s1, $i1, $s2);
				echo "values:", $bool, ", ", $s1, ", ",$i1, ", ",$s2, "<br>";

			?>
              </p></p>
            </td>
          </tr>
      </table></td>
    </tr>
  </table>
</body>
</html>
