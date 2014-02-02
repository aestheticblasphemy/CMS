<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php
/*

	$num = 100; $item = "memory modules";
	$format = "There are %d %s in your cart.<br>" ; 
	printf ( $format , $num , $item );
	echo "<br>"; 
	
	$ar_date = getdate();
	echo "<br>".print_r($ar_date)."<br>";
	$dt = sprintf ( "%04d-%02d-%02d" , $ar_date['year'] , $ar_date['mon'] , $ar_date['wday']); 
	echo "<br>".$dt;
	
	$month = "1"; $day = "12"; $year = "2005"; 
	$dt = sprintf ( "%04d-%02d-%02d" , $year , $month , $day ); 
	echo "<br>".$dt; 
*/

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
    <td><div align="right" class="txt24bb_white">Formatting Output </div></td>
  </tr>
</table>
<form name="form1" method="post" action="">
  <p>&nbsp;</p>
  <table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
    <tr>
      <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
          <tr>
            <td class="txt14b_black">
              <p align="center">  <span class="txt16b_blue"><br>
              sprintf() and printf() </span></p>
              <p align="left">                <span class="txt12_black">$num = 100; $item = &quot;memory modules&quot;;<br>
                $format = "There are  %d %s in your cart." ; <br>
                <strong>printf</strong> ( $format , $num , $item );              <br>
              </span></p>
              <p align="left" class="txt12_black">$month = &quot;1&quot;; $day = &quot;12&quot;; $year = &quot;2005&quot;; <br>
                <span class="txt12_black">$dt = <strong>sprintf </strong>( "%04d-%02d-%02d" , $year , $month , $day ); </span><br>
                echo $dt;
                <br>
              </p>              
              <p align="center" class="txt16b_blue">Output:
              <p align="center" class="txt12_black"><?php
					$num = 100; $item = "memory modules";
					$format = "There are %d %s in your cart.<br>" ; 
					printf ( $format , $num , $item ); 
					
					// below: won't work as is, see the function at the top of the page.
					$month = "1"; $day = "12"; $year = "2005"; 
					$dt = sprintf ( "%04d-%02d-%02d" , $year , $month , $day ); 
					echo $dt, "<br>";
				?> </p></p>
            </td>
          </tr>
      </table></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
    <tr>
      <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
          <tr>
            <td class="txt14b_black">              <p align="center"><span class="txt16b_blue"> </span> <br>
                <span class="txt16b_blue">sscanf()</span></p>
              <p align="left">                    <span class="txt12_black">$dt = "January 01 2005" ; <br>
                  <strong>list</strong>( $month , $day , $year ) = <strong>sscanf</strong> ( $dt , "%s %d %d" ); <br>
              echo "The invoice date is: $year-" . substr ( $month , 0 , 3 ). "-$day&lt;br&gt;" ; </span></p>
              <p align="left" class="txt12_black"> </p>
              <p align="center" class="txt16b_blue">Output:
              <p align="center" class="txt12_black">
                <?php
					$dt = "January 01 2005" ; 
					list( $month , $day , $year ) = sscanf ( $dt , "%s %d %d" ); 
					echo "The invoice date is: $year-" . substr ( $month , 0 , 3 ). "-$day.<br>"; 
				?>
              </p>
            </td>
          </tr>
      </table></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p align="center" class="txt14bb_white">Let's look at the chart of possibilities:</p>
  <table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
    <tr>
      <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
          <tr>
            <td class="txt14b_black">
              <table>
                <tr>
                  <td width="30" class="txt14b_black"><div align="center">%</div></td>
                  <td width="454" class="txt12_black"> a literal percent character.</td>
                </tr>
                <tr>
                  <td class="txt14b_black"><div align="center">b</div></td>
                  <td class="txt12_black"> an integer presented as a <strong>binary</strong> number. </td>
                </tr>
                <tr>
                  <td class="txt14b_black"><div align="center">c </div></td>
                  <td class="txt12_black"> an integer presented as a character with that <strong>ASCII</strong> value. </td>
                </tr>
                <tr>
                  <td class="txt14b_black"><div align="center">d</div></td>
                  <td class="txt12_black">  an integer presented as a (signed) <strong>decimal number.</strong> </td>
                </tr>
                <tr>
                  <td class="txt14b_black"><div align="center">e</div></td>
                  <td class="txt12_black">  a number presented as <strong>scientific notation</strong> (e.g. 2.4e+5). </td>
                </tr>
                <tr>
                  <td class="txt14b_black"><div align="center">u</div></td>
                  <td class="txt12_black">  an integer presented as an <strong>unsigned decimal number</strong>. </td>
                </tr>
                <tr>
                  <td class="txt14b_black"><div align="center">f</div></td>
                  <td class="txt12_black">a float presented as a <strong>floating-point number</strong> (locale aware). </td>
                </tr>
                <tr>
                  <td class="txt14b_black"><div align="center">F</div></td>
                  <td class="txt12_black"> a float presented as a <strong>floating-point number</strong> (non-locale aware). <br>
                  (PHP 4.3.1+ and PHP 5.0.3+)</td>
                </tr>
                <tr>
                  <td class="txt14b_black"><div align="center">o</div></td>
                  <td class="txt12_black"> an integer presented as an <strong>octal number</strong>. </td>
                </tr>
                <tr>
                  <td class="txt14b_black"><div align="center">s</div></td>
                  <td class="txt12_black">  a string presented as a string. </td>
                </tr>
                <tr>
                  <td class="txt14b_black"><div align="center">x</div></td>
                  <td class="txt12_black">  an integer presented as a <strong>hexadecimal number</strong>.<br>
                  (output as lowercase letters). </td>
                </tr>
                <tr>
                  <td class="txt14b_black"><div align="center">X</div></td>
                  <td class="txt12_black">  an integer presented as a <strong>hexadecimal number</strong>.<br>
(output as uppercase letters). </td>
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
					$n =  1234567890;
					$u = -1234567890;
					$c = 70; // ASCII 65 is 'F'
					echo "\$n =  1234567890;<br>";
					echo "\$u =  -1234567890;<br>";
					echo "\$c = 65; // ASCII 65 is 'F'<br><br>";
					
					// %% below prints the literal %
					printf("%%b = '%b'<br>", $n); // binary representation
					printf("%%s = '%s'<br>", $n); // string representation
					printf("%%c = '%c'<br><br>", $c); // same as chr() function, prints the ascii character
					
					printf("%%d = '%d'<br>", $n); // standard integer representation
					printf("%%u = '%u'<br>", $n); // unsigned integer representation of a positive integer
					printf("%%u = '%u'<br><br>", $u); // unsigned integer representation of a negative integer
					
					printf("%%e = '%e'<br>", $n); // scientific notation
					printf("%%f = '%f'<br><br>", $n); // floating point representation
					
					printf("%%o = '%o'<br>", $n); // octal representation					
					printf("%%x = '%x'<br>", $n); // hexadecimal representation (lower-case)
					printf("%%X = '%X'<br><br>", $n); // hexadecimal representation (upper-case)
					
					printf("%%+d = '%+d'<br>", $n); // sign specifier on a positive integer
					printf("%%+d = '%+d'<br><br>", $u); // sign specifier on a negative integer
				?>
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
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><br>
  <br>
</p>
</body>
</html>
