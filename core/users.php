<?php

/*
 * This is the entry point to all the functions that are there to User Management.
 * To put it inside the Users folder as index.php can be considered. But, under
 * the assumption that the core area links are accessible only to authenticated 
 * users, it should be suitable for now.
 */
require 'header.php';

echo '<h1>User Management</h1>';
echo '<div class="left-menu">';
    echo '<a href="/core/users.php">Users</a>';
echo '</div>';
echo '<div class="has-left-menu">';
    echo '<h2>User Management</h2>';

    if(isset($_REQUEST['action']))
        require 'users/actions.php';
    if(isset($_REQUEST['id']))
        require 'users/form.php';
    require 'users/list.php';
echo '</div>';
echo '<script src="/core/users/users.js"></script>';

require 'footer.php';