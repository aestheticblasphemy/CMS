<html>
	<head>
    	<title>Reading Cookies</title>
    </head>
    <body>
    	<?php
			$var = 0; 
			if (isset($_COOKIE['test']))
			{
				$var1 = $_COOKIE['test'];
				echo $var1;
			}
		 ?>

         <?php
		          /* This will delete the cookie */
		 	setcookie('test',0, time()-(60*60*24*7));
		 ?>
    </body>
        
</html>