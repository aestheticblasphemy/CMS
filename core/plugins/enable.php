<?php

require_once '../core_lib.php';
//$glob = explode(',',$SITEGLOBALS['plugins']);
if(!in_array($_REQUEST['n'],$SITEGLOBALS['plugins']))
//if(!in_array($_REQUEST['n'],$glob))
{
//    $glob[]=$_REQUEST['n'];
//    $SITEGLOBALS['plugins'] = $glob;
    $SITEGLOBALS['plugins'][]=$_REQUEST['n'];
    config_rewrite();
}
header('Location: /core/plugins.php');
