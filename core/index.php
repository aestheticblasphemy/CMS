<?php

/*
 * This page is the entry point to the admin area and all administation of 
 * content is doled out from here itself. No other entry point should exist to
 * core functions.
 */

/*
 * Before one can actually access anything in the admin area, this page checks 
 * if the person is logged on. If yes, then the appropriate menu items are 
 * loaded, else, a login page is shown.
 */
require 'header.php';
echo 'you are logged in!';
require 'footer.php';