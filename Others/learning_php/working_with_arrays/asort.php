<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php
	$ar_values = array( 100 , 217 , 333 , 212 , 11 , 44, 17, 89, 109 );
	
	$ar_values2 = array("b" => 200, "a" => 100, "d" => 400, "e" => 600, "f" => 300,
		"i" => 200, "c" => 100, "j" => 400, "h" => 600, "g" => 300);
	

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
    <td><div align="right" class="txt24bb_white">asort()</div></td>
  </tr>
</table>
<div align="center">
  <p><br>
  <span class="txt14bb_white">Array BEFORE we sort using asort():
</span></p>
  <p>
  <?php 		
			echo("<br>"); reset($ar_values2);
			while (list($key, $val) = each($ar_values2)) {
			echo "$key = $val; ";
			}
			echo("<br>");
			
			asort($ar_values2);
	?>
  </p>
  <p><span class="txt14bb_white">Now we sort the 2nd array using asort(): </span></p>
</div>
<table width="600" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="1" cellspacing="1" class="tbl_border">
        <tr align="center" class="tbl_drk_gray">
          <td width="10%">a</td>
          <td width="10%">b</td>
          <td width="10%">c</td>
          <td width="10%">d</td>
          <td width="10%">e</td>
          <td width="10%">f</td>
          <td width="10%">g</td>
          <td width="10%">h</td>
          <td width="10%">i</td>
          <td width="10%">j</td>
        </tr>
        <tr align="center" class="tbl_gray">
          <td><?php echo $ar_values2['a']; ?></td>
          <td><?php echo $ar_values2['b']; ?></td>
          <td><?php echo $ar_values2['c']; ?></td>
          <td><?php echo $ar_values2['d']; ?></td>
          <td><?php echo $ar_values2['e']; ?></td>
          <td><?php echo $ar_values2['f']; ?></td>
          <td><?php echo $ar_values2['g']; ?></td>
          <td><?php echo $ar_values2['h']; ?></td>
          <td><?php echo $ar_values2['i']; ?></td>
          <td><?php echo $ar_values2['j']; ?></td>
        </tr>
    </table></td>
  </tr>
</table>
<p align="center"><span class="txt14bb_white">Array AFTER we sort using asort():
</span></p>
<div align="center"><p>
  <?php 		
			echo("<br>"); reset($ar_values2);
			while (list($key, $val) = each($ar_values2)) {
			echo "$key = $val; ";
			}
			echo("<br>");
			
			asort($ar_values2);
	?>
  </p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><br>
    <br>
</p>
</div>
</body>
</html>
