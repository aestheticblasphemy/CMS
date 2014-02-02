<?php

// check that the captcha is provided
function check_is_captcha_provided(){
    if(
        !isset($_REQUEST["recaptcha_challenge_field"]) || 
                $_REQUEST["recaptcha_challenge_field"]=='' ||
                !isset($_REQUEST["recaptcha_response_field"]) || 
                $_REQUEST["recaptcha_response_field"]=='')
        {
            $GLOBALS['PLUGIN_ERROR'][]="Captcha Not provided";
        } 
        else 
            return true;
    }
    
// check that the captcha is valid
function check_is_captcha_valid(){
    $resp=recaptcha_check_answer(
                                    RECAPTCHA_PRIVATE,
                                    $_SERVER["REMOTE_ADDR"],
                                    $_REQUEST["recaptcha_challenge_field"],
                                    $_REQUEST["recaptcha_response_field"]
                                );
    if(!$resp->is_valid){
        $GLOBALS['PLUGIN_ERROR'][]="Incorrect Captcha Response.";
        }
    else
        return true;
}