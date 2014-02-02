<?php
    header('Content-type: text/html; Charset=utf-8');
    require 'core_lib.php';
?>
<html>
    <head>
        <title>Aesthetic Blasphemy Admin Area</title>
       <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> -->
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>-->
        <script src="/_lib/_scripts/jquery.min.js"></script>
      <!--  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script> -->
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>-->
        <script src="/_lib/_scripts/jquery-ui.min.js"></script>
        <script src="/_lib/ckeditor/ckeditor.js"></script>
        <link rel="stylesheet" href="/_lib/_css/admin/admin.css" type="text/css" />
        <!--<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/themes/south-street/jquery-ui.css" type="text/css" />-->
        <!--<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/south-street/jquery-ui.css" type="text/css" />-->
        <link rel="stylesheet" href="/_lib/_scripts/jquery-ui.css" type="text/css" />
        <script src="/_lib/jqsimplemenu/js/jqsimplemenu.js"></script>
        <link rel="stylesheet" href="/_lib/jqsimplemenu/css/jqsimplemenu.css" type="text/css" />
        <script src="/_lib/_scripts/admin/admin.js"></script>
    </head>
    
    <body>
        <div id="header">
                    <!-- This list must be automated except the last 'Logout' button and the 'Main Site' button -->
                    <?php 
                        $sql = "SELECT admin_app_id,admin_perm FROM ab_admin_app_perms WHERE admin_user_id="
                                .$_SESSION['userdata']['admin_user_id'].";";
                        $rsTmp = db_all($sql);
                        $sql = "SELECT * FROM ab_admin_apps ;";
                        $apps = db_all($sql,'admin_app_id');
                        
                        $menus=array();

                        foreach($rsTmp as $app)
                        {
                            if($app['admin_perm'] >= 4)
                            {
                                $menus[$apps[$app['admin_app_id']]['admin_app_name']]
                                        = array('_link'=>$apps[$app['admin_app_id']]['admin_app_path']);
                               /* echo '<li><a href="/root'
                                        .$apps[$app['admin_app_id']]['admin_app_path'] .'">'
                                        .$apps[$app['admin_app_id']]['admin_app_name'] .'</a></li>';
                                */
                            }
                        }
                        
                        // { add custom items (from plugins)
                        foreach($PLUGINS as $pname=>$p)
                        {                      
                            if(isset($p['category']) && $p['category'])
                            {
                                if(!isset($p['user']) || !isset($p['user']['menu']))
                                continue;
                            
                                foreach($p['user']['menu'] as $name=>$page)
                                {
                                    if(preg_match('/[^a-zA-Z0-9 >]/',$name))
                                            continue;
                                   $json='{"'.str_replace('>','":{"',$name)
                                            .'":{"_link":"plugins/plugin.php?_plugin='
                                            .$pname.'&amp;_page='.$page.'"}}'
                                           .str_repeat('}',substr_count($name,'>'));
                                    $menus=array_merge_recursive($menus,json_decode($json,true));
                                }
                            }
                         }
                        // }
                         // { display menu as UL list
                    function admin_menu_show($items,$name=false,$prefix,$depth=0)
                    {
                        $ul_prefix = "";
                        if(isset($items['_link']))
                        {
                            echo '<a href="'.$items['_link'].'">'.$name.'</a>';
                        }
                        else if($name!='top')
                        {
                            echo '<a id="sub-menu" href="#'.$prefix.'-'.$name.'">'.$name.'</a>';
                        }
                        else
                            $ul_prefix = ' class="nav" id="nav"';
                        
                        if(count($items)==1 && isset($items['_link']))
                            return;
                        if($depth<2)
                        {
                            if($depth==0)
                                echo '<div id="'.$prefix.'-'.$name.'">';
                        }
                        echo '<ul'. $ul_prefix .'>';
                        
                        foreach($items as $iname=>$subitems)
                        {
                            if($iname=='_link')
                                continue;
                            echo '<li>';
                            admin_menu_show($subitems,$iname,$prefix.'-'.$name,$depth+1);
                            echo '</li>';
                        }
                    echo '</ul>';
                    if($depth<2)
                    {
                        if($depth==0)
                            echo '</div>';
                    }
                    }

// }
                    $menus['Log Out']=array('_link'=>
'/site/login/logout.php?redirect=/site/');
                    $menus['Main Site']=array('_link'=>'/site/index.php');
                    admin_menu_show($menus,'top','menu');
?>
                    <!-- <li><a href="/root/core/users.php"> Users</a></li>
                    <li><a href="/root/core/sections.php"> Sections</a></li>
                    <li><a  href="/root/site/login/logout.php?redirect=/root/core/"> Log Out</a></li>-->
        </div>
    <div id="wrapper">