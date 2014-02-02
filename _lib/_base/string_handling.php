<?php

// File Location: /_lib/_base/string_handling.php

/**
 * String Cleanup and displaying functions
 *
 * @author Anshul Thakur
 * @version 1.0
 * @since 1.0
 * @access public
 * @copyright Aesthetic Blasphemy
 *
 */ 

// cleans a string
function clean($sStr) {
    
    $return = stripslashes($sStr);
    $return = htmlentities($return);
    return $return;
}

// add links to a string
function addLinks($sStr) {
    
    $return = preg_replace("/((http(s?):\/\/)|(www\.))([\w\.]+)([\w|\/]+)/i", "<a href=\"http$3://$4$5$6\" target=\"_blank\">$4$5$6</a>", $sStr);
    $return = preg_replace("/([\w|\.|\-|_]+)(@)([\w\.]+)([\w]+)/i", "<a href=\"mailto:$0\">$0</a>", $return);
    return $return;
}

// formats a string
function format($sStr) {
    
    $return = clean($sStr);
    $return = nl2br($return);
    $return = addLinks($return);
    return $return;
}
//Cleans a string for DB insertion
function prepareText($sStr)
{
    $return = addslashes($sStr);
    
}


//strips blank spaces from beginning and end and replaces inner spaces by _
//additionally, concats the two strings to form a table name
function format_table_name($sTablePrefix = '', $sTableName='')
{
	if(!empty($sTableName))
	{
		$sTableName = trim($sTableName);
		$sTableName = str_replace(" ", "_", $sTableName);
		$sTableName = strtolower($sTableName);
		$sResult = $sTablePrefix.$sTableName;
		return $sResult;
	}
	else
	return(false);
}

?>