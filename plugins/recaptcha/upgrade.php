<?php

/*
 * Show an alert that you need to set up the keys in its settings
 */
if($version == 0)
{
    echo '<script type="text/javascript"> alert("You have enabled the recaptcha plugin"+
        "Please configure its Public and Private Keys in its settings tab");</script>';
    $version++;
}

