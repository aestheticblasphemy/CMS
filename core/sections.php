<?php

/*
 * This is the entry point to the section/category management of the admin area.
 * Any permission check must be done here, or linked to from here. 
 */

require "header.php";

echo '<h1>Section Management</h1>'
    .'<div class="left_menu">'
    .'<a href="/core/sections.php">Sections</a>'
    .'</div>'
    .'<div class="has-left-menu">'
    .'<h2>Section Management</h2>';

if(isset($_REQUEST['action']))
    require 'sections/actions.php';
if(isset($_REQUEST['id']))
    require 'sections/form.php';
require 'sections/list.php';

echo '</div>';
require "footer.php";
