<?php

require '../core_lib.php';
if(in_array($_REQUEST['n'],$SITEGLOBALS['plugins']))
{
    unset($SITEGLOBALS['plugins']
            [array_search($_REQUEST['n'],$DBVARS['plugins'])]);
    config_rewrite();
}
header('Location: /core/plugins.php');