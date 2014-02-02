<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php
	$simple_web_site = "^www\.[a-z]+\.com$";
	$simple_web_site2 = "^www\.[a-z]+\.com|edu|co.uk|gov|biz|tv|info$";
	$domain_check = "^([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$";
	
	$url_prefix = "http://";
	
	
	// examples
	$ar_domains = array ("www.lynda.com", "www.lynda.edu", "www.lynda.co.uk", "www.lynda.tv"
				, "www.lynda.info", "www.lynda.gov");
	
	
	$ar_domains2 = array ("www.lynda.com", "www.lynda.dom", "www.lynda.org", "www.lynda.de"
				, "www.lynda.ws", "www.lynda.org.uk");
	
	

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
    <td><div align="right" class="txt24bb_white">Regular Expressions </div></td>
  </tr>
</table>
<br>
<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
        <tr>
          <td class="txt14b_black">
            <table>
              <tr>
                <td width="114" class="txt14b_black"><div align="center"> <strong>^</strong></div></td>
                <td width="370" class="txt12_black"> Matches the beginning of a line.</td>
              </tr>
              <tr>
                <td class="txt14b_black"><div align="center"> <strong>$ </strong> </div></td>
                <td class="txt12_black">
                  <p> Matches the end of a line.</p></td>
              </tr>
              <tr>
                <td class="txt14b_black"><div align="center"><strong>. </strong> </div></td>
                <td class="txt12_black">
                  <p> Matches any single character. </p></td>
              </tr>
              <tr>
                <td class="txt14b_black"><div align="center">
                  <p><strong>*</strong></p>
                </div></td>
                <td class="txt12_black">
                <p> Matches zero or more occurences of the character immediately preceding it. </p></td>
              </tr>
              <tr>
                <td class="txt14b_black"> <div align="center">+</div></td>
                <td class="txt12_black"> Matches one or more occurences of the character or regular expression immediately preceding it. </td>
              </tr>
              <tr>
                <td class="txt14b_black"><div align="center">?</div></td>
                <td class="txt12_black"> Matches 0 or 1 occurence of the character or regular expression immediately preceding it. </td>
              </tr>
              <tr>
                <td class="txt14b_black"><div align="center">\</div></td>
                <td class="txt12_black">
                  <p>Escapes a special character like: <strong>\$</strong> literally means<strong> $. </strong></p></td>
              </tr>
              <tr>
                <td class="txt14b_black"><div align="center">[ ]</div></td>
                <td class="txt12_black">
                <p> Matches any character inside the brackets. </p></td>
              </tr>
              <tr>
                <td class="txt14b_black"><div align="center"> <strong>[c 1-c 2 ]</strong></div></td>
                <td class="txt12_black"><p>A range, like: 

 
                    <strong>[0-9] </strong>or<strong> <strong>[A-Za-z] </strong> </strong>for digits and numbers. </p></td>
              </tr>
              <tr>
                <td class="txt14b_black"><div align="center"> <strong>[^c 1-c 2 ]</strong></div></td>
                <td class="txt12_black">
                  <p>Matches any character not in this range, like: [^,] which matches any character that is not a comma.</p></td>
              </tr>
              <tr>
                <td class="txt14b_black"><div align="center"> <strong>|</strong></div></td>
                <td class="txt12_black">
                <p> An Or condition, like 

 
                <strong>(him|her)</strong></p></td>
              </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>
<br>
<br>
<br>
<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
        <tr>
          <td class="txt14b_black">
            <p align="center"><span class="txt16b_blue"> </span> <br>
              Sample Output and Examples:<br>
              <br>
              <?php 
			  	reset($ar_domains);
			  	while (list($key, $str) = each($ar_domains)) {
					
					if (ereg($simple_web_site2, $str)) {
						print "Simple test on \"$str\" was successful!<br><br>";
					} else {
						print "Simple test on \"$str\" was NOT successful!<br><br>";
					}
				}
				echo "<br>-------<br>";		
				reset($ar_domains2);
				while (list($key, $str) = each($ar_domains2)) {
					
					if (ereg($simple_web_site2, $str)) {
						print "Simple test on \"$str\" was successful!<br><br>";
					} else {
						print "Simple test on \"$str\" was NOT successful!<br><br>";
					}
				}
				
				echo "<br>-------<br>";
				reset($ar_domains2);
				while (list($key, $str) = each($ar_domains2)) {
					
					if (ereg($domain_check, $str)) {
						print "Simple test on \"$str\" was successful!<br><br>";
					} else {
						print "Simple test on \"$str\" was NOT successful!<br><br>";
					}
				}	  


 ?> <br>
              <br>
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
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>