<html>
	<head>
    	<title>String Functions</title>
	</head>
    <body>
    	<?php
			$firstString = "The quick brown fox";
			$secondString = " jumped over the lazy dog"
			?>
         <?php
		 	$thirdString = $firstString;
			$thirdString .= $secondString;
			echo $thirdString;
			?>
            <br/>
         <?php
		 	echo "Lowercase: ". strtolower($thirdString)."<br/>";
			echo "Uppercase: ". strtoupper($thirdString)."<br/>";
			echo "Uppercase First: ". ucfirst($thirdString)."<br/>";
			echo "Uppercase Words: ".ucwords($thirdString)."<br/>";
		 ?>
         Length: <?php echo strlen($thirdString);?><br/>
         Trim: <?php echo $fourtString = $firstString.trim($secondString);?><br/>
         Find: <?php echo strstr($thirdString,"brown");?><br/>
         Replace by string: <?php echo str_replace("quick","super-fast",$thirdString)?><br/>
         </body>
</html>