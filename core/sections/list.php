<?php

require_once 'sections_lib.php';
echo '<div id="pages-wrapper">';
echo '<script src="/_lib/jstree-master/libs/jquery.js"></script>
<script src="/_lib/jstree-master/libs/jquery.ui.touch.js"></script>
<script src="/_lib/jstree-master/dist/jstree.js"></script>
<script src="/_lib/_scripts/pages/menu.js"></script>';
$results = db_all("SELECT * FROM ab_admin_sections ORDER BY 
        admin_section_parent_id,admin_section_id ;", 'admin_section_id');
$sections=array();

foreach($results as $sec){
    if((!isset($sec['admin_section_parent_id'])))
    {
        if(!isset($sections[0])) 
            $sections[0]=array();//The only case where we'll not have a parent in list 
        ////is root elements
        //$pages[$r['parent']]=array();
        $sections[0][]=$sec;
    }
    else
        $sections[$sec['admin_section_parent_id']][]=$sec;
    
}

function show_sections($id,$sections){
    if(!isset($sections[$id]))
        return;
    
    echo '<ul>';
    foreach($sections[$id] as $section){
        echo '<li id="'.$section['admin_section_id'].'">'
             .'<a href="sections.php?id='.$section['admin_section_id'].'">'
             .'<ins>&nbsp;</ins>'.htmlspecialchars($section['admin_section_name'])
             .'</a>';
        show_sections($section['admin_section_id'],$sections);
        echo '</li>';
        }
    echo '</ul>';
}

show_sections(0,$sections);
echo '</div>';

echo '<br><br><div id="create_section"><a class="button" href="sections.php?id=-1">Create Section</a></div>';