<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php
	$ar_values = array( 100 , 217 , 333 , 212 , 11 , 44, 17, 89, 109, 10 );
	
	$months = array(1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July',
		'August', 'September', 'October', 'November', 'December');
		
	$courses = array ("a" => "Introduction", "b" => "Getting Started", "c" => "Intermediate",
				"d" => "Advanced", "e" => "Conclusion"); 
		
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
    <td><div align="right" class="txt24bb_white">Creating and Using Arrays </div></td>
  </tr>
</table>
<br>

<br>
<br>
<table width="600" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="1" cellspacing="1" class="tbl_border">
      <tr align="center" class="tbl_drk_gray">
        <td width="10%">0</td>
        <td width="10%">1</td>
        <td width="10%">2</td>
        <td width="10%">3</td>
        <td width="10%">4</td>
        <td width="10%">5</td>
        <td width="10%">6</td>
        <td width="10%">7</td>
        <td width="10%">8</td>
        <td width="10%">9</td>
      </tr>
      <tr align="center" class="tbl_gray">
        <td><?php echo $ar_values[0]; ?></td>
        <td><?php echo $ar_values[1]; ?></td>
        <td><?php echo $ar_values[2]; ?></td>
        <td><?php echo $ar_values[3]; ?></td>
        <td><?php echo $ar_values[4]; ?></td>
        <td><?php echo $ar_values[5]; ?></td>
        <td><?php echo $ar_values[6]; ?></td>
        <td><?php echo $ar_values[7]; ?></td>
        <td><?php echo $ar_values[8]; ?></td>
        <td><?php echo $ar_values[9]; ?></td>
      </tr>
    </table></td>
  </tr>
</table>
<br>
<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
        <tr>
          <td class="txt14b_black"><p align="center">Array Values of $month:<br>
<?php print_r($months); ?> <br>
              <br>
          </p></td>
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
          <td class="txt14b_black">            <p align="left">The 10th month is: <?php echo $months[10]; ?><br>
            <br>
            The &quot;c&quot; course is ($courses[&quot;c&quot;]): <?php echo $courses["c"]; ?><br>
            <br>
            <br>
          $ar_values2 output: <br>
          <?php 
		    echo "\$ar_values2[0] = ", $ar_values2[0], "<BR>";
			echo "\$ar_values2[4] = ",$ar_values2[4], "<BR>";
			echo "\$ar_values2[17] = ",$ar_values2[17], "<BR><BR>";
			
			echo "<BR><BR>Let's look at count of 0 to the # of elements assigned:<BR>";
			for ($i=0; $i < count($ar_values2); $i++) {
   				echo $i, ": ", $ar_values2[$i], "<BR>";
			}
			
			echo "<BR><BR>Let's look at sizeof keyword:<BR>";
			for ($i=0; $i < sizeof($ar_values2); $i++) {
   				echo $i, ": ", $ar_values2[$i], "<BR>";
			}
			
			echo "<BR><BR>Now Let's look at a count of 0 to 22:<BR>";
			
			for ($i=0; $i < 23; $i++) {
   				echo $i, ": ", $ar_values2[$i], "<BR>";
			}
			
		  ?>
          <br>
          <br>
          print_r($ar_values2):<br> 
          <?php print_r($ar_values2); ?><br>
          <br>
          </p>          </td>
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
<p><br>
</p>
</body>
</html>
