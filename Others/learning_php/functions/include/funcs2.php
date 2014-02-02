<?php
	// errors will be displayed with this page named if errors are in this file!
	$my_var = "testing!";
	$my_num = 1001;
	
	function myFunction($var)
	{
		echo "This is a function in funcs2.php!!!<br>";
		$test = "I am set!";
		echo $var, "<br>";
		echo $my_num, "<br>";
		
		if (!isset($var)) return FALSE;
		
		if ($var > 1000) return TRUE;
		
		return FALSE;
	}
	
	?>