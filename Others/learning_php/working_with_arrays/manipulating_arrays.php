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
    <td><div align="right" class="txt24bb_white">Manipulating Arrays </div></td>
  </tr>
</table>
<div align="center">
  <p><br>
  
    <br>
      <span class="txt14bb_white">The first array set up: <br>
  </span></p>
</div>
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
<p align="center"><span class="txt14bb_white">The array after we modify it: <?php $ar_values[4] = 999;
$ar_values[7] = "998"; $ar_values[9] = "997"; ?></span></p>
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
          <td class="txt14b_black"><?php echo $ar_values[4]; ?></td>
          <td><?php echo $ar_values[5]; ?></td>
          <td><?php echo $ar_values[6]; ?></td>
          <td class="txt14b_black"><?php echo $ar_values[7]; ?></td>
          <td><?php echo $ar_values[8]; ?></td>
          <td class="txt14b_black"><?php echo $ar_values[9]; ?></td>
        </tr>
    </table></td>
  </tr>
</table>
<p align="center"><span class="txt14bb_white">Now we sort the array using sort():
      <?php sort($ar_values); ?>
</span></p>
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
<p align="center"><span class="txt14bb_white">Now we sort the 2nd array using asort():
</span></p>
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
<p align="center"><span class="txt14bb_white">Now we sort the 2nd array using sort():
      <?php sort($ar_values2); ?>
</span></p>
<table width="600" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="1" cellspacing="1" class="tbl_border">
        <tr align="center" class="tbl_drk_gray">
          <td width="10%" class="tbl_gray"><strong>0</strong></td>
          <td width="10%" class="tbl_gray"><strong>1</strong></td>
          <td width="10%" class="tbl_gray"><strong>2</strong></td>
          <td width="10%" class="tbl_gray"><strong>3</strong></td>
          <td width="10%" class="tbl_gray"><strong>4</strong></td>
          <td width="10%" class="tbl_gray"><strong>5</strong></td>
          <td width="10%">g</td>
          <td width="10%">h</td>
          <td width="10%">i</td>
          <td width="10%">j</td>
        </tr>
        <tr align="center" class="tbl_gray">
          <td><?php echo $ar_values2[0]; ?></td>
          <td><?php echo $ar_values2[1]; ?></td>
          <td><?php echo $ar_values2[2]; ?></td>
          <td><?php echo $ar_values2[3]; ?></td>
          <td><?php echo $ar_values2[4]; ?></td>
          <td><?php echo $ar_values2[5]; ?></td>
          <td><?php echo $ar_values2['g']; ?></td>
          <td><?php echo $ar_values2['h']; ?></td>
          <td><?php echo $ar_values2['i']; ?></td>
          <td><?php echo $ar_values2['j']; ?></td>
        </tr>
    </table></td>
  </tr>
</table>
<div align="center"><br>
  <br>
  <span class="txt14bb_white">Now we remove some elements using = &quot;&quot; and unset($array): </span>
  	<?php 
		$ar_values2 = array("b" => 200, "a" => 100, "d" => 400, "e" => 600, "f" => 300,
			"i" => 200, "c" => 100, "j" => 400, "h" => 600, "g" => 300);
	
		$ar_values2['c'] = "";
		unset($ar_values2['f']);
	?>
  <br>
  <br>
  <table width="600" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
    <tr>
      <td><table width="100%"  border="0" cellpadding="1" cellspacing="1" class="tbl_border">
          <tr align="center" class="tbl_drk_gray">
            <td width="10%">a</td>
            <td width="10%">b</td>
            <td width="10%" class="tbl_gray"><strong>c</strong></td>
            <td width="10%">d</td>
            <td width="10%">e</td>
            <td width="10%" class="tbl_gray"><strong>f</strong></td>
            <td width="10%">g</td>
            <td width="10%">h</td>
            <td width="10%">i</td>
            <td width="10%">j</td>
          </tr>
          <tr align="center" class="tbl_gray">
            <td><?php echo $ar_values2["a"]; ?></td>
            <td><?php echo $ar_values2["b"]; ?></td>
            <td><?php echo $ar_values2["c"]; ?></td>
            <td><?php echo $ar_values2["d"]; ?></td>
            <td><?php echo $ar_values2["e"]; ?></td>
            <td><?php echo $ar_values2["f"]; ?></td>
            <td><?php echo $ar_values2['g']; ?></td>
            <td><?php echo $ar_values2['h']; ?></td>
            <td><?php echo $ar_values2['i']; ?></td>
            <td><?php echo $ar_values2['j']; ?></td>
          </tr>
      </table></td>
    </tr>
  </table>
  <br>
<br>
<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
        <tr>
          <td class="txt14b_black"><p align="center">Array Values of $ar_values2<br>
            (notice 'f' is missing! It was unset().)
            :<br>
                  <?php print_r($ar_values2); ?> <br>
                  <br>
                  <span class="txt16b_blue">You can also try:<br> 
                  rsort, arsort, ksort, unsort, and more! </span><br>
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
<p><br>
    <br>
</p>
</div>
</body>
</html>
