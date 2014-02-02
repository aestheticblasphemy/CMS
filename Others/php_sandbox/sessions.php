<?php 
	session_start();
?>
<html>
	<head>
    	<title>Sessions</title>
    </head>
    <body>
    	<?php
			$_SESSION['name'] = "Anshul";
		 ?>

         <?php
		    $name= $_SESSION['name'];
			echo $name."<br/>";
			print_r($_SESSION);
		 ?>
    </body>
        
</html>