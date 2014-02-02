<?php
	// errors will be displayed with this page named if errors are in this file!
	function myFunction($var)
	{
		echo "This is a function in funcs1.php!!!<br>";
		$test = "I am set!";
		echo $var, "<br>";
		
		if (!isset($var)) return FALSE;
		
		if ($var > 1000) return TRUE;
		
		return FALSE;
	}
?>