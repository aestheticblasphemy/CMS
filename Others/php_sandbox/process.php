<html>
	<head>
    	<title>Form Processing</title>
    </head>
    <body>
    	<?php 
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			echo "{$username}: {$password}";
		?>
        <pre><?php 			print_r($_POST);?></pre>
    </body>
        
</html>