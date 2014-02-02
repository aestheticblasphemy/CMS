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
    <td><div align="right" class="txt24bb_white">Global Variables </div></td>
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
				// this global won't be visible inside a function.
				// global is to be used within a function to see variables at the page level.
				global $str;
				$str = "hello!";
				
				// this variable is local scope to the page.
				$int = 1000;
				// currently these two variables have local scope to the page.
				$another = 3000;
				$sum = 1;
				
				check($int);
				
				function check($i) {
					// the function can not see the global variable
					echo "\$str:", $str, "<br>";
					global $str;
					// now it can see $str!!
					echo "\$str:", $str, "<br>";
					
					echo "\$i:", $i, "<br>";
					// the following variable can't see the local page variables.
					echo "\$int:", $int, "<br>";
					
					// now the two variables outside the function will be global
					global $another, $sum;
					
					// increment and assign the global variables
					$sum = $another++;
					echo "\$another:", $another, "<br><br>";
					echo "\$sum:", $sum, "<br><br>";
					
					// $GLOBALS is an array that can be used to set globals...
					$GLOBALS['str'] = "goodbye!";
					echo "\$str:", $str, "<br><br>";
										
										
					echo "<br>Show the Globals:<BR><BR>";
					foreach ($GLOBALS as $k => $v) {
						if (($k != "LS_COLORS") && ($k != "PATH") && ($k != "SERVER_SOFTWARE"))
							echo "key: ", $k, "=> ", $v, "<br>";
					}
					
					
				}
					
					// see that the global variables changed within the function:
					echo "\$str:", $str, "<br><br>";
					echo "\$another:", $another, "<br>";
					echo "\$sum:", $sum, "<br>";
					
					echo "<BR><BR>Show the Globals:<BR><BR>";
					foreach ($GLOBALS as $k => $v) {
						if (($k != "LS_COLORS") && ($k != "PATH") && ($k != "SERVER_SOFTWARE"))
							echo "key: ", $k, "=> ", $v, "<br>";
					}
					
					
					function some_function ( $parameters ) {
						if(version_compare(phpversion(),"4.3.0")>=0) {
							foreach($GLOBALS as $k=>$v) {
							 global $$k;
						}
					}
					  
					  // All the global variables are locally available in this function
					  return true;
					}

			?>
              </p></p>
            </td>
          </tr>
      </table></td>
    </tr>
  </table>
</body>
</html>
