<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php

	$value = 100;
	$color = "Black";
	$name = "Shrek";
	
	if ($value == 0) {
		// echo "value is equal to zero.";
	} elseif ($value == 100) {
		// echo "value is equal to one hundred";
	} elseif ($value == 200) {
		// echo "value is equal to two hundred.";
	} else {
		// echo "value is equal to: $a";
	}
	
		switch ($value) {
		case 0:
			// echo "value is equal to zero";
			break;
		
		case 100:
			// echo "value is equal to 100";
			break;
		
		case 200:
			// echo "value is equal to 200";
			break;
		default:
			// echo "value is equal to: $value";
		}
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
    <td><div align="right" class="txt24bb_white">The switch Statement </div></td>
  </tr>
</table>
<br>

<br>
<br>
<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray">
        <tr>
          <td class="txt14b_black">
            <p align="center"><span class="txt16b_blue"> </span> <br>
              <span class="txt14b_red">What is your favorite color? </span><?php echo "$color." ?><br>
    <?php
	
		switch ($color) {
		case "Red":
			echo "Red? Are you looking for someone?";
			break;
		
		case "Blue":
			echo "Blue? Blue is my favorite color, as well.";
			break;
		
		case "Green":
			echo "Green? Sometimes.";
			break;
			
		case "Black":
			echo "Black? Welcome to the Matrix.";
			break;
		default:
			echo "$color? I've never heard of that color before.";
		}
	 ?>
              <br>
              <br>
          </p></td>
        </tr>
    </table></td>
  </tr>
</table>
<br>
<br>
<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray">
        <tr>
          <td class="txt14b_black">
            <p align="center">  <span class="txt14b_red"><br>
              What is your name? </span><?php echo "$name." ?><br>
    <?php
		switch ($name) {
		case "Brian":
			echo "Brian? Do I know you?";
			break;
		
		case "Mary":
			echo "Mary? What a nice name.";
			break;
		
		case "Shrek":
			echo "Shrek?!?!";
			break;
		default:
			// echo "value is equal to: $value";
		}
	 ?>
              <br>
              <br>
          </p></td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>