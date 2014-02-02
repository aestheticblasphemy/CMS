<?php

//Check if the CMS is installed or not
if(file_exists(CMSENGINE_ROOT.'/.private/config.php'))
{
    require CMSENGINE_ROOT.'/.private/config.php';
}

else{
    //$path = $_SERVER['HTTP_HOST'].'/installer';
    //header('Location: '.$path);
    header('Location: /installer/');
    exit;
}
