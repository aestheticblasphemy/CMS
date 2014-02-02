<?php
	// echo $_SERVER['PHP_SELF']; exit;
	
	header("Location: http://www.lynda.com/"); break;
	// exit;
	
	header("Location: http://" . $_SERVER['HTTP_HOST'] 
		. dirname($_SERVER['PHP_SELF']) . "/page_redirection2.php");
?>
<html>
<body>
This code will never execute.<br>
And if you move the PHP below any HTML text you will get an error.<br>
This is because the headers will already have been sent.
</body>
</html>
