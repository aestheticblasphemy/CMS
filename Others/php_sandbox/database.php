<?php

/* Make a connection */
	$connection = mysql_connect("localhost","root","anshul");
	if(!$connection){
		die("Database connection failed: ".mysql_error());
	}
/* Select database */
	
	$db_select = mysql_select_db("widget_corp",$connection);
	if(!$db_select){
		die("Database selection failed: ".mysql_error());
	}
?>
<html>
	<head>
		<title>Basic</title>
	</head>
	<body>
	<?php
/* Query DB */
		$result = mysql_query("SELECT * FROM subjects", $connection);
		if(!$result)
		{
			die("Database query failed: ".mysql_error());
		}
/* Operate on data */
		while($row = mysql_fetch_array($result)){
			echo $row["menu_name"]." ".$row["position"]."<br/>";
		}
	?>
	</body>
</html>

<?php
/* Close connection */
	mysql_close($connection);
	?>