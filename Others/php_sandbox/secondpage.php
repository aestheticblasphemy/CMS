<html>
	<head>
    	<title>First Page</title>
    </head>
    <body>
    <?php
		/*SuperArray*/
		print_r($_GET);
		$id = $_GET['id'];
		$name=urldecode($_GET['name']);
		echo "<br/><strong>".$id.":". $name."</strong><br/>";
	?>
    <?php
		$strings = "kevin skoglund";
		echo urlencode($strings)."<br/>";
		echo rawurlencode($strings);
	?>
    </body>
        
</html>