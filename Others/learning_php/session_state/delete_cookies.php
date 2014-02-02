<?php
	header("Expires: Thu, 17 May 2001 10:17:17 GMT");    // Date in the past
	header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
	header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
	header ("Pragma: no-cache");                          // HTTP/1.0
	
	// delete all the cookies...
   foreach ($_COOKIE as $name => $value) {
	  // setcookie($name); // deletes a single cookie!
	  setcookie($name, "", mktime(12,0,0,1, 1, 1990)); // best way to remove it.

	  unset($_COOKIE[$name]);
   }
   $_COOKIE = array();
   
	echo "<b>LET'S DELETE THE COOKIES:</b><br>";
	echo "Are there any cookies now?<br>";
	if (isset($_COOKIE['cookie'])) {
		foreach ($_COOKIE as $name => $value) {
		   echo "$name : $value <br />\n";
		}
	}
	echo "...<br>I guess not.<br>";
	
?>  
<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>

