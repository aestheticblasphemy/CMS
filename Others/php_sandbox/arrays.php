<html>
	<head>
    	<title>Arrays</title>
    </head>
   	<body>
		 <?php $array1 = array(4,8,15,16,23,42);?>
		 Count: <?php echo count($array1);?><br/>
         Max Value: <?php echo max($array1);?><br/>
         Min Value: <?php echo min($array1);?><br/>
         <pre>Sorted : <?php sort($array1); print_r($array1);?><br/>
         Rsorted: <?php rsort($array1); print_r($array1);?><br/>
         Imploded: <?php echo $string1 = implode(" * ", $array1);?><br/>
         Exploded: <?php print_r(explode(" * ", $string1));?><br/>
         In array: <?php echo in_Array(15,$array1);?><br/></pre>
    </body>
</html>