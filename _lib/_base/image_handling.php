<?php

// File Location: /_lib/_base/image_handling.php

/**
 * Image Attributes and handling functions
 *
 * @author Anshul Thakur
 * @version 1.0
 * @since 1.0
 * @access public
 * @copyright Aesthetic Blasphemy
 *
 */ 


// get image properties
function getImage($sFile) {
    
    $aParts = getimagesize($sFile);
    $return["x"] = $aParts[0];
    $return["y"] = $aParts[1];
    $return["type"] = $aParts[2];
    $return["properties"] = $aParts[3];
    return $return;
}

?>