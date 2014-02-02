<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php
// most errors will be displayed with this page named if errors are in this file!
// errors in included files will exist there.
// this makes things a bit harder to debug, 
// but you should get the idea once you know that an include is used.

#### Make sure you just include one or more files at the beginning here.
### you can include multiple files that can be headers and footer code,
### watch for errors if you try to redefine a function, for example!!!
### Include files can also include files ;-)

	include './include/funcs2.php';
	//include './include/funcs1.php';
	include_once './include/funcs2.php';
	// include './include/vars.php';
	
	echo "### INCLUDE FILES:<br>";
	echo "Let's output some simple variables:<br>";
	echo $my_var, "<br>";
	echo $my_num, "<br>";
	
	// include './include/funcs1.php';
	
	echo "calling a function...<br>";
	echo myFunction(900);

/*
	// This is possible...
	$test = TRUE;
	$file1 = "file1.php";
	$file2 = "file2.php";
	if ($test) {
	   include $file1;
	} else {
	   include $file2;
	}
*/
?>