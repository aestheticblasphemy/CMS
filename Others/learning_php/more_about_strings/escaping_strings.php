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
    <td><div align="right" class="txt24bb_white">Escaping Strings </div></td>
  </tr>
</table>
<form name="form1" method="post" action="">
  <p>&nbsp;</p>
  <p align="center" class="txt14bb_white">Let's look at the chart of some of the possibilities:</p>
  <table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
    <tr>
      <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
          <tr>
            <td class="txt14b_black">
              <table>
                <tr>
                  <td width="114" class="txt14b_black"><div align="center">\</div></td>
                  <td width="370" class="txt12_black"> the common escape indicator </td>
                </tr>
                <tr>
                  <td class="txt14b_black"><div align="center">\n</div></td>
                  <td class="txt12_black"> <p>Newline (ASCII 10) </p></td>
                </tr>
                <tr>
                  <td class="txt14b_black"><div align="center">\r</div></td>
                  <td class="txt12_black"> <p>Carriage return (ASCII 13) </p></td>
                </tr>
                <tr>
                  <td class="txt14b_black"><div align="center">
                    <p>\t </p>
                  </div></td>
                  <td class="txt12_black">  <p>Tab (ASCII 9) </p></td>
                </tr>
                <tr>
                  <td class="txt14b_black"><div align="center">\\</div></td>
                  <td class="txt12_black">  <p>\ </p></td>
                </tr>
                <tr>
                  <td class="txt14b_black"><div align="center">\$</div></td>
                  <td class="txt12_black">  <p>$ </p></td>
                </tr>
                <tr>
                  <td class="txt14b_black"><div align="center">\&quot;</div></td>
                  <td class="txt12_black"><p>" </p></td>
                </tr>
                <tr>
                  <td class="txt14b_black"><div align="center">\0 .. \777</div></td>
                  <td class="txt12_black"> <p>Octal (base 8) number </p></td>
                </tr>
                <tr>
                  <td class="txt14b_black"><div align="center">\x0 .. \xFF</div></td>
                  <td class="txt12_black"> <p>Hexadecimal (base 16) number </p></td>
                </tr>
                <tr>
                  <td class="txt14b_black">&nbsp;</td>
                  <td class="txt12_black">&nbsp;</td>
                </tr>
                <tr>
                  <td class="txt14b_black"><div align="center">%%</div></td>
                  <td class="txt12_black"> %  </td>
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

						print '<ul>
						
						<li>Pentium I</li>
						<li>Pentium II</li>
						<li>Pentium III</li>
						<li>Pentium IV</li>				
						</ul>';
						
						print "\n\t\t<ul>\n\t\t\t<li>Pentium I</li>\n\t\t\t<li>Pentium II</li>\n\t\t\t<li>Pentium III</li>\n\t\t\t<li>Pentium IV</li>\n\t\t\t</ul>\n\n\n";
 						
						# This line won't output correctly because it uses ' instead of "
						print '<ul>\n\t\t\t<li>Pentium I</li>\n\t\t\t<li>Pentium II</li>\n\t\t\t<li>Pentium III</li>\n\t\t\t<li>Pentium IV</li>\n\t\t\t</ul>\n\n\n';
 	
						### HTML Special Characters...
						$str = htmlspecialchars("\n\n\n<br><br><br><a href='link.php'>'Click Me!'</a>\n\n\n<br><br><br>", ENT_QUOTES);
						echo $str;
						$str = "\n\n\n<br><br><br><a href='link.php'>'Click Me!'</a>\n\n\n<br><br><br>";
						echo $str; 
						### HTML Entities...
						$str = htmlentities("\n\n\n<br><br><br><a href='link.php'>'Click Me!'</a>\n\n\n<br><br><br>");
						// $str = htmlentities("<br><a href='link.php'>'Click Me!'</a>", ENT_QUOTES);
						echo $str;


				?>
                <br>
                <br>
                <br>
              </p>
              <p align="left" class="txt12_black"> <strong>htmlspecialchars </strong> converts the following characters:<br>
                (htmlentities converts all test that is possible to convert to html representation) </p>
              <ul>
                <li>
                  <p class="txt12_black">'&amp;' (ampersand) becomes '&amp;amp;' </p>
                <li>
                  <p class="txt12_black">'"' (double quote) becomes '&amp;quot;' when <strong>ENT_NOQUOTES </strong> is not set. </p>
                <li>
                  <p class="txt12_black">''' (single quote) becomes '&amp;#039;' only when <strong>ENT_QUOTES </strong> is set. </p>
                <li>
                  <p class="txt12_black">'&lt;' (less than) becomes '&amp;lt;' </p>
                <li>
                  <p class="txt12_black">'&gt;' (greater than) becomes '&amp;gt;' </p>
                </li>
              </ul>
              <p align="left" class="txt12_black">&nbsp; </p></td>
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
