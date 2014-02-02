<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php
	$str = "0123456789";
	$str2 = $str;
	$str2[4] = "X";
	$str2[6] = "Y";
	
	$str3 = "The string ends in escape:";
	$str3 .= chr(32).chr(55); // add a space and the number 7 as two ascii chars.
	echo $str3;
	
	for ($i = 0; $i < strlen($str3); $i++)
		echo $str3[$i];
	
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
    <td><div align="right" class="txt24bb_white">String and Character Indexes</div></td>
  </tr>
</table>
<div align="center"><br>

  <br>

  <span class="txt14bb_white">Let's view a string like an array:</span><br>
<br>
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
          <td><?php echo $str[0]; ?></td>
          <td><?php echo $str[1]; ?></td>
          <td><?php echo $str[2]; ?></td>
          <td><?php echo $str[3]; ?></td>
          <td><?php echo $str[4]; ?></td>
          <td><?php echo $str[5]; ?></td>
          <td><?php echo $str[6]; ?></td>
          <td><?php echo $str[7]; ?></td>
          <td><?php echo $str[8]; ?></td>
          <td><?php echo $str[9]; ?></td>
        </tr>
    </table></td>
  </tr>
</table>
<p align="center"><br>
  <span class="txt14bb_white">Now let's change the a couple of positions of a string:</span><br>
</p>
<table width="600" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="1" cellspacing="1" class="tbl_border">
        <tr align="center" class="tbl_drk_gray">
          <td width="10%">0</td>
          <td width="10%">1</td>
          <td width="10%">2</td>
          <td width="10%">3</td>
          <td width="10%" class="tbl_gray">4</td>
          <td width="10%">5</td>
          <td width="10%" class="tbl_gray">6</td>
          <td width="10%">7</td>
          <td width="10%">8</td>
          <td width="10%">9</td>
        </tr>
        <tr align="center" class="tbl_gray">
          <td><?php echo $str2[0]; ?></td>
          <td><?php echo $str2[1]; ?></td>
          <td><?php echo $str2[2]; ?></td>
          <td><?php echo $str2[3]; ?></td>
          <td class="txt14b_black"><?php echo $str2[4]; ?></td>
          <td><?php echo $str2[5]; ?></td>
          <td class="txt14b_black"><?php echo $str2[6]; ?></td>
          <td><?php echo $str2[7]; ?></td>
          <td><?php echo $str2[8]; ?></td>
          <td><?php echo $str2[9]; ?></td>
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
          <td class="txt14b_black"><p align="center"><span class="txt16b_blue">Our Sample Code:</span><br>
              <p><span class="txt14b_red">&lt;?php</span><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                $str = <span class="txt14b_red">&quot;0123456789&quot;</span>;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $str2 = $str;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $str2[4] = <span class="txt14_red">&quot;X&quot;</span>;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $str2[6] = <span class="txt14b_red">&quot;Y&quot;</span>;<br>
<br>
<span class="txt14b_red">?&gt; <br>
</span></p>
              <p align="center"><span class="txt16b_blue">See the source code for other examples!</span></p>              <br>
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
                
</p>
</body>
</html>
