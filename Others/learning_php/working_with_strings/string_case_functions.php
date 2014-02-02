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
    <td><div align="right" class="txt24bb_white">String Case Functions </div></td>
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
          <td class="txt14b_black">            <p><strong class="txt16b_blue">strtoupper() or strtolower()</strong>:<br>
                <span class="txt12_black">Returns a string with all capital or lowercase letters. </span><br>            
              <br>
                <span class="txt14b_red"><strong>&lt;?php</strong></span><strong><br>
&nbsp;&nbsp;&nbsp;$str = <span class="txt14b_red">&quot;i am not bold enough.&quot;</span>;<br>
&nbsp;&nbsp;&nbsp;echo strtoupper($str);<br>
&nbsp;&nbsp;&nbsp;<strong>echo strtolower($str);</strong><br>
<span class="txt14b_red">?&gt;</span></strong><br>
              <br>
              <span class="txt16b_blue">ucfirst()</span>:<br>
              <span class="txt12_black">Capitalizes only the first letter of a string.</span><br>            
              <br>
              <span class="txt14b_red"><strong>&lt;?php</strong><strong></strong></span><strong><br>
              <strong>&nbsp;&nbsp;&nbsp;</strong>$str =<span class="txt14b_red">&quot;the quick brown fox. &quot; </span>;<br>
              <strong>&nbsp;&nbsp;&nbsp;</strong>echo ucfirst($str);<br>
              <span class="txt14b_red">?&gt;</span></strong><br>            
              <br>
              <span class="txt16b_blue">ucwords()</span>:<br>
              <span class="txt12_black">Capitalizes the first letter of each word in a string.</span><br>            
              <br>
              <span class="txt14b_red"><strong>&lt;?php</strong></span><strong><br>
              <strong>&nbsp;&nbsp;&nbsp;</strong>$str =<span class="txt14b_red"> &quot;blame it on the rain. &quot;</span>;<br>
              <strong>&nbsp;&nbsp;&nbsp;</strong>$str_caps = ucwords($str);<br>
              <strong>&nbsp;&nbsp;&nbsp;</strong>echo <strong>$str_cap</strong>s;<br>
              <span class="txt14b_red">?&gt;</span></strong></p>
            <p align="center"><span class="txt16b_blue">The Output: </span><br>            
              <?php
				$str = "i am not bold enough.";
				echo strtoupper($str), "<br>", strtolower($str), "<br><br>";
				
				$str ="the quick brown fox.";
				echo ucfirst($str), "<br>";
				
				$str = "blame it on the rain.";
				$str_caps = ucwords($str);
				echo $str_caps, "<br>";
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
