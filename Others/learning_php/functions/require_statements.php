<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php

# require and include are identical except require will calls a fatal error that won't allow the script to continue
# include will try to continue.

# also try: require_once that works like include_once. If there is duplicate included file it won't be reused.

// most errors will be displayed with this page named if errors are in this file!
// errors in required files will exist there.
// this makes things a bit harder to debug, 
// but you should get the idea once you know that an require is used.

#### Make sure you just require one or more files at the beginning here.
### you can require multiple files that can be headers and footer code,
### watch for errors if you try to redefine a function, for example!!!
### require files can also require files ;-)

	require_once './include/funcs2.php';
	// require './include/vars.php';
	echo myFunction(900);
	echo "### REQUIRED FILES:<br>";
	echo "Let's output some simple variables:<br>";
	echo $my_var, "<br>";
	echo $my_num, "<br>";
	
	// require './include/funcs1.php';
	echo "calling a function...<br>";
	echo myFunction(900);

/*
	// This is possible...
	$test = TRUE;
	$file1 = "file1.php";
	$file2 = "file2.php";
	if ($test) {
	   require $file1;
	} else {
	   require $file2;
	}
*/
?>