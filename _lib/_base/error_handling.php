<?php

// File Location: /_lib/_base/error_handling.php

/** 
 * reuseable page elements
 *
 * @author Anshul Thakur
 * @version 1.0
 * @since 1.0
 * @access private
 * @copyright Aesthetic Blasphemy
 *
 */

//require_once("/.private/config.php");

// catch page error
function catchErr($sMsg) {
    
    global $ERRORS;
    array_push($ERRORS, $sMsg);
}

// write user errors (usage: must be called inside html body)
function writeErrors() {
  
    global $ERRORS;
    
    if (count($ERRORS)) {
        print "<strong>Error_</strong><br />";
        while(list($key, $value) = each($ERRORS)) {
            print($value)."<br />";
        }
    }
}

// catch system exception
function catchExc($sMsg) {
    
    global $EXCEPTS;
    array_push($EXCEPTS, $sMsg);
}

// write system errors (usage: must be called in javascript tags inside html head)
function writeExceptions() {
    
    global $EXCEPTS;
    $sReturn = '';
    $sReturn .= "// exception reporting
    function trace() {
        var msg = \"\";";
        
        if (count($EXCEPTS)) {
            $sMsg = "";
            while(list($key, $value) = each($EXCEPTS)) {
                $sMsg .= "msg = msg + \"".str_replace("\n", "", addslashes($value))."\\n\";\n";
            }
            $sReturn .= $sMsg;
        }
        
    $sReturn .= "\t
        if (msg != \"\") {
            alert(msg);
        }
    }
    document.onload = trace();\n";

	 return $sReturn;
}

function is_empty($var)
{
	if(empty($var))
	{
    	 //Log exception and return.
		return true;
	}
	return false;
}

?>