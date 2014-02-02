<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php
	echo "<b>Intro: Let's do a little generic database work!</b><BR><BR>";
	$user = "user1";
	$passwd = "testing";
	
	// Connecting, selecting database
	$connect = mysql_connect('localhost', 'user1', 'testing')
	   or die('Could not connect: ' . mysql_error());
	echo '<b>Step 1:</b> Connected successfully! <BR>';
	
	$db = 'samples';
	mysql_select_db($db) or die('Could not select database ('.$db.') because of : '.mysql_error());
	echo '<b>Step 2:</b> Connected to ('.$db.') successful!<BR>';
	
	// Performing SQL query
	$query = 'SELECT * FROM tbl_users';
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	
	
	// Printing results in HTML
	echo "<br><br><b>Let's fetch data...</b><br>";
	echo "<table border='1' width='3000'>\n";
	
	$count = 0;
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
	   echo "\t<tr>\n";
	   foreach ($line as $col_value) {
		   echo "\t\t<td>$col_value</td>\n";
	   }
	   $count++;
	   echo "\t</tr>\n";
	}
	
	echo "</table>\n";
	
	if ($count < 1) {
		echo "<br><br>No rows were found in this table.<br><br>";
	} else {
		echo "<br><br>".$count." rows were found in this table.<br><br>";
	}
	
	// We will free the resultset...
	mysql_free_result($result);
	
	// Now we close the connection...
	mysql_close($connect);
?>