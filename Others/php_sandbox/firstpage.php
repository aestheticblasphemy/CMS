<html>
	<head>
    	<title>First Page</title>
    </head>
    <body>
    <a href="secondpage.php?name=<?php echo urlencode("Anshul&");?>&id=1">
    <?php $linktext = "<Click> & you'll see"; ?>
    <?php echo htmlspecialchars($linktext);?></a>
    </body>
        
</html>