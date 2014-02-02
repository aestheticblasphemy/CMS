<?php
require 'header.php';
echo '<h1>Plugin Management</h1>';
echo '<div class="left-menu">';
foreach($rsTmp as $app)
                        {
                            if($app['admin_perm'] >= 4)
                            {
                                echo '<a href="'
                                        .$apps[$app['admin_app_id']]['admin_app_path'] .'">'
                                        .$apps[$app['admin_app_id']]['admin_app_name'] .'</a>';
                            }
                        }
echo '</div>';
echo '<div class="has-left-menu">';
echo '<h2>Plugin Management</h2>';
require 'plugins/list.php';
echo '</div>';
require 'footer.php';