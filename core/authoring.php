<?php

require_once 'header.php';
echo '<h1>Authoring</h1>';

// { load menu
echo '<div class="left-menu">';
echo '<table>
        <tr><td><a href="authoring.php?id=-1">Create Content</a></td></tr>
        <tr><td><a href="authoring.php">List Content</a></td></tr>
        </table>';
echo '</div>';
// }

// { load main page
echo '<div class="has-left-menu">';
echo '<h2>Content Authoring</h2>';
// { perform any actions
if(isset($_REQUEST['action'])){
        require 'authoring/actions.php';
}
if(isset($_REQUEST['id']))
{
    require 'authoring/forms.php';
}
else
{
    require 'authoring/menu.php';
}
// }
echo '</div>';
// }

echo '<style type="text/css">
@import "/core/authoring/css.css";</style>';
require 'footer.php';