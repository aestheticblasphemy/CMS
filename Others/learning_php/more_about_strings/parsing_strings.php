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
    <td><div align="right" class="txt24bb_white">Parsing Strings </div></td>
  </tr>
</table>
<form name="form1" method="post" action="">
  <p>&nbsp;</p>
  <p align="center" class="txt14bb_white">This just touches the surface of the deep parsing in PHP:</p>
  <table width="200" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
    <tr>
      <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
          <tr>
            <td class="txt14b_black">
              <table width="100%">
                <tr>
                  <td width="370" height="35" class="txt16b_blue"> <div align="left">parse_str()</div></td>
                </tr>
                <tr>
                  <td height="35" class="txt16b_blue"><div align="left">split(), spliti() </div></td>
                </tr>
                <tr>
                  <td height="35" class="txt16b_blue"> <p align="left">pre_split()</p></td>
                </tr>
                <tr>
                  <td height="35" class="txt16b_blue">  <p align="left">explode()</p></td>
                </tr>
              </table>              </td>
          </tr>
      </table></td>
    </tr>
  </table>
  <p align="center" class="txt14bb_white">More Output: </p>
  <table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
    <tr>
      <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
          <tr>
            <td class="txt14b_black"><p align="center" class="txt16b_blue">Output:              </p>
              <p align="left" class="txt12_black">
                <?php
					$str = "a1=value1&b1=hello+there&fname=George&lname=Martin";
					echo $str, "<br>";
					parse_str($str);
					echo $a1, "<br>";
					echo $b1, "<br>";
					echo $fname, "<br>";
					echo $lname, "<br>";
					
					$str = "ar_array[]=This+is&ar_array[]=just&ar_array[]=a+test";
					echo "<br>", $str, "<br>";
					parse_str($str);
					echo $ar_array[0], "<br>";
					echo $ar_array[1], "<br>";
					echo $ar_array[2], "<br>";
					echo $ar_array[3], "<br>";
					
					$str = "a1=value1&b1=hello+there&fname=George&lname=Martin";
					echo $str, "<br>";		
					parse_str($str, $output);
					echo $output["a1"], "<br>";
					echo $output["b1"], "<br>";
					echo $output["fname"], "<br>";
					echo $output["lname"], "<br>";
					
					echo "<br>SPLIT FUNCTION:<br>";
					$sentence = "The quick brown fox jumped over the lazy dog"; 
					list($word1, $word2, $word3, $the_rest) = split(" ", $sentence, 4);
					// the next line delimits by ":" and won't work with our sentence...
					// list($word1, $word2, $word3, $the_rest) = split(":", $sentence, 4);
					echo $word1, "<br>";
					echo $word2, "<br>";
					echo $word3, "<br>";
					echo $the_rest, "<br>";
					
					echo "<br>PRE_SPLIT FUNCTION:<br>";
					$ar_strs = preg_split('/ /', $sentence);
					print_r($ar_strs);
					echo "<br><br>";
					for ($i=0; $i < count($ar_strs); $i++) {
						echo $i, ": ", $ar_strs[$i], "<BR>";
					}
					
					echo "<br>EXPLODE FUNCTION:<br>";
					$sentence = "The, quick, brown, fox, jumped, over, the, lazy, dog"; 
					$ar_strs = explode(", ", $sentence);
					print_r($ar_strs);
					echo "<br><br>";
					for ($i=0; $i < count($ar_strs); $i++) {
						echo $i, ": ", $ar_strs[$i], "<BR>";
					}
					
					echo "<br>IMPLODE FUNCTION:<br>";
					$sentence2 = implode(" ", $ar_strs);
					echo "$sentence2<br>";

				?>                
                <br>
                <br>
                <br> 
              </p>              </td>
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
  <p>&nbsp;</p>
</form>
<p><br>
  <br>
</p>
</body>
</html>
