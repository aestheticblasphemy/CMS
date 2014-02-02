<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php

	$bool = FALSE;
	$bool2 = TRUE; $bool3 = FALSE; $bool4 = TRUE; $bool5 = TRUE;
	$a = 1000; $b = 2000;
	
	if ($a > $b) {
	  //  echo "a is larger than b<br>";
	   $a = $b;
	}
	
	if ($a < $b) {
	   // echo "a is smaller than b<br>";
	   $b = $a;
	}
	
	if (($a > 100) && ($a < 2000)) {
			    // echo "a number is greater than 100 but less than 2000";        
	}
		   
	if ( ($a > 100) or ($a < 2000) ) {
			   // echo "number is greater than 10 but less than 2000";        
	}
		   
	if ($a > 100 and $a < 2000) {
			   // echo "a number is greater than 100 but less than 2000";        
	}
		   
	if ( ($a > 100) or ($a < 2000) )
		{
			   // echo "number is greater than 10 but less than 2000";        
    }
	
	if ($b > $a) {
	   echo "n is smaller than a";
	} else {
	   echo "b is NOT larger than a";
	}
	
	/*
		if($bool) { print("bool is true"); }
		elseif($bool2) {  print("bool2 is true"); }
		elseif($bool3) {  print("bool3 is true"); }
		elseif($bool4) {  print("bool4 is true"); }
		elseif($bool5) {  print("bool5 is true"); }
		else { print("nothing!"); }
	*/
	
	if ($a > $b) {
	  // echo "a is larger than b";
	} elseif ($a < $b) {
	   // echo "a is smaller to b";
	} else {
	   // echo "a is equal to b";
	}
	
	/*
	if ( file_exists($filename) && filemtime($filename) > time() )
	   do_something();
	// filemtime will never give an file-not-found-error, since php will stop parsing as soon as file_exists returns FALSE
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
    <td><div align="right" class="txt24bb_white">if /else /elseif Statements </div></td>
  </tr>
</table>
<br>
<br>
<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
        <tr>
          <td class="txt14b_black"> <div align="center">              We'll be using <span class="txt14_green">logical operators</span> &amp;&amp; (and), || (or), ! (not)
              <br>
              (Comparision Operators: ==, !=, &lt;&gt;, &lt;, &gt;, &gt;=, &lt;=)<br>
              TRUE, FALSE
              <br>
          </div></td>
        </tr>
    </table></td>
  </tr>
</table>
<br>
<br>
<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="2" cellspacing="2">
        <tr class="txt24b_black">
          <td width="25%" class="tbl_gray"><div align="center">
            <?php if ($bool) { echo "TRUE"; } else { echo "FALSE"; } ?>
          </div></td>
          <td width="25%" class="tbl_gray"><div align="center">
            <p>              
              <?php if ($bool2) { echo "TRUE"; } else { echo "FALSE"; } ?>
            </p>
            </div></td>
          <td width="25%" class="tbl_gray"><div align="center">
            <?php if ($bool3) { echo "TRUE"; } else { echo "FALSE"; } ?>
          </div></td>
          <td width="25%" class="tbl_gray"><div align="center">
            <?php if (($bool4) || ($bool5)) { echo "TRUE"; } else { echo "FALSE"; } ?>
          </div></td>
        </tr>
    </table></td>
  </tr>
</table>
<div align="center"><br>
  <br> 
    <span class="txt14bb_white">What is this line below?!? </span><br>
</div>
<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><?php if ($bool != false) { ?><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray">
        <tr>
		

          <td class="txt14b_black">
            <p align="center"><span class="txt16b_blue"> </span> if $bool is FALSE then I will be visible! <br>
          </p></td>
        </tr>
    </table><?php } ?></td>
  </tr>
</table>
<br>
<br>
<?php if ($bool != TRUE) { ?>
<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="tbl_border">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="tbl_gray">
        <tr>
		

          <td class="txt14b_black">
            <p align="center"><span class="txt16b_blue"> </span> <br>
              
              $bool is TRUE so I am visible! <br>
                <br>
          </p></td>
        </tr>
    </table></td>
  </tr>
</table>
<?php } ?>
</body>
</html>