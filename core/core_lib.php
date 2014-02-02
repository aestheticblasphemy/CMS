<?php

/*
 * This file performs the basic URL redirection to the login page if the user
 * is not logged on.
 * The access to the admin area is only for staff members, not even for 
 * registered users. 
 */

require_once $_SERVER['DOCUMENT_ROOT']."/_lib/_base/basics.php";

if(!is_admin())
{
    /*
     * if the user is not logged in, or does not have appropriate permissions,
     * show them the login page. This login page is outside the core area to 
     * hide the core area URLs from potential exposure and scrutiny of prying
     * eyes.
     */
    require SCRIPTBASE.'/site/login/login.php';
    exit;
}

/*
 * @function: ckeditor
 * @purpose: Launches the Rich Text Editor for editing purposes.
 * @arguments: $name - 
 *             $value - 
 *             $height - 
 */
function ckeditor($name,$value='',$height=250)
{
    return '<textarea style="width:100%;height:'.$height.'px"
    name="'.addslashes($name).'">'.htmlspecialchars($value)
    .'</textarea><script>$(function(){
    CKEDITOR.replace("'.addslashes($name).'",{
    });
    });</script>';
}