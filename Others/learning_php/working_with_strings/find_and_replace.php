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
    <td><div align="right" class="txt24bb_white">Cleaning up Strings </div></td>
  </tr>
</table>
<div align="center"><br>
  <br>
  <br>
</div>
<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
        <tr>
          <td class="txt14b_black">            <p>              <span class="txt16b_blue">str_replace:</span><br>
              <span class="txt12_black">Replace all occurrences of a search string with a replacement string.</span></p>
            <p align="center">              <span class="txt16b_blue">Other functions:</span><br>
            str_ireplace(), substr_replace(), ereg_replace(), preg_replace(), and strtr().</p>
            <p><span class="txt16b_blue">strpos:</span><br>
              <span class="txt12_black">Finds the first occurance of a string. &quot;needle in a haystack.&quot;<br>
              <br>
$str= 'The quick brown fox jumped over the lazy dog.' ; <br>
$pos = strpos ( $str , 'quick' , 1 );</span></p>
            <p align="center"><span class="txt12_black"><span class="txt16b_blue">Other functions:</span><br>
  </span>strrpos(), stripos(), strripos(), strrchr(),<br>
  substr(), stristr(), and strstr().  </p>
            <p align="center"><span class="txt16b_blue">Replace String Output:</span></p>
            <p align="left">
			<?php
					// let's replace some strings!!!!
					$name = 'Brian';
					$job_title = "Computer Programmer";
					echo "Name: ",  $name, "<br>";
					echo "Job Title: ", $job_title, "<br><br>";
					
					$template = 'My name is %name%. My job title is %job_title%.';
					echo $template, "<br>";
					
					$template_vars = str_replace("%name%", $name, $template);
					echo $template_vars, "<br>";
					$template_vars = str_replace("%job_title%", $job_title, $template_vars);
					echo $template_vars, "<br>";
					// The count parameter is available since PHP 5.0
					//$template_vars = str_replace("%job_title%", $job_title, $template_vars, $count);
					// $count is returned from the function in 5.0+.
					
					echo "<br><br>";
					$str = "There are 12305 other planets.";
					$nums = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
					$newstr = str_replace($nums, "X", $str);
					echo $str, "<br>";
					echo $newstr, "<br><br>";
					
					$str  = "Possible names for our baby: Jeff, Mike, Kevin, Steve.<br><br>";
					$boy_names = array("Jeff", "Mike", "Kevin", "Steve");
					$girl_names = array("Mary", "Sarah", "Brenda", "Cloe");
					
					echo "It's a Boy! ", $str;
					$newstr = str_replace($boy_names, $girl_names, $str);
					echo "Whoops! It's a Girl! ", $newstr;
				?>            
            </p>            <p align="center"><span class="txt16b_blue">Find Position String Output: </span></p>
            <p align="left">              <?php
			  			  		// let's find some strings!!
					
					$str= 'The quick brown fox jumped over the lazy dog.' ; 
					echo $str, "<br>";
					// we force this to start at 1, instead of 0 or another number.
					$pos = strpos ( $str , 'quick' , 1 );
					echo "'quick' was found in the string at position $pos.", "<br><br>";
					echo $str, "<br>";
					// we force this to start at 11, instead of 0 or another number.
					$start = 11;
					$pos = strpos ( $str , 'quick' , $start );
					if ($pos)
						echo "'quick' was found in the string at position $pos.", "<br>";
					else
						echo "'quick' NOT found in the string after position $start.", "<br><br><br>";
				?>
              <br>            
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
</body>
</html>
