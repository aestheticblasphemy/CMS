<?php

	header("Expires: Thu, 17 May 2001 10:17:17 GMT");    // Date in the past
	header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
	header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
	header ("Pragma: no-cache");                          // HTTP/1.0

	/*******
		Cookies are part of the HTTP header!!!!
		setcookie() must be called before any output is sent to the browser.
		It works like header in this regard.
		If you try to set a cookie after any text is sent to the browser,
		you will get a warning!! (and it looks messy)
		
		besides this, cookies will be visible the next time you reference a cookie in another page.
		you will have to refresh this page to see the cookie values after setting them.
	
	*****/

$str = 'I am now set!';

setcookie("DeleteMe!", "I will be deleted soon!");

setcookie("SiteCookie1", $str);
setcookie("SiteCookie2", "Brian", time()+3600);  /* expire in 1 hour */

// there are additional parameters, as well:
//setcookie("SiteCookie2", "email@email.dom", time()+3600, "/user/", ".blah.dom", 1);

// set the expiration date to one hour ago
setcookie ("SiteCookie3", "", time() - 3600);

setcookie("ar_cookie[1]", "my cookie 1");
setcookie("ar_cookie[2]", "my cookie 2");
setcookie("ar_cookie[3]", "my cookie 3");

?>
<?php

 // this is how you delete a cookie...
setcookie("DeleteMe!"); // Only one parameter... the cookie name.

echo "<b>LET'S LOOK AT OUR COOKIES:</b><br>";
// echo single cookies...
if (isset($_COOKIE['DeleteMe!'])) { echo "Using \$COOKIE for DeleteMe!:", $_COOKIE["DeleteMe!"], "<br>"; }
if (isset($_COOKIE['SiteCookie1'])) { echo "Using \$COOKIE for SiteCookie1:", $_COOKIE["SiteCookie1"], "<br>"; }
if (isset($_COOKIE['SiteCookie2'])) { echo "Using \$COOKIE for SiteCookie2:", $_COOKIE["SiteCookie2"], "<br>"; }
if (isset($_COOKIE['SiteCookie3'])) { echo "Using \$COOKIE for SiteCookie3:", $_COOKIE["SiteCookie3"], "<br>"; }

// using http_cookie_vars...
echo "<br>Using \$HTTP_COOKIE_VARS for SiteCookie1: ", $HTTP_COOKIE_VARS["SiteCookie1"], "<br>";

// Another way to debug/test is to view all cookies
echo "<br><b>The cookie array...</b><br>", print_r($_COOKIE), "<br><br>";

// show the cookies...
if (isset($_COOKIE['ar_cookie'])) {
   foreach ($_COOKIE['ar_cookie'] as $name => $value) {
       echo "$name : $value <br />\n";
   }
}

?>  
<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>

