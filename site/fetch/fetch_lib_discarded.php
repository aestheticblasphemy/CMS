<?php

function load_sections($id,$sections){
    if(!isset($sections[$id]))
        return;
    
    $nav_element = '<ul class="nav">';
    foreach($sections[$id] as $section){
        $nav_element .= '<li id="'.$section['admin_section_id'].'">'
             .'<a href="?section='.$section['admin_section_id'].'">'
             ./*'<ins>&nbsp;</ins>'.*/htmlspecialchars($section['admin_section_name'])
             .'</a>';
        $nav_element .= load_sections($section['admin_section_id'],$sections);
        $nav_element .= '</li>';
        }
    $nav_element .= '</ul>';
    return $nav_element;
}

function load_nav_bar()
{
    $navbar = <<<NAVBAR
           <div class="navbar" id="navbar">
            <ul class="nav">
           <li id="home"><a href="http://localhost/root/site/">Home</a></li>
            </ul>
NAVBAR;
$results = db_all("SELECT * FROM ab_admin_sections 
    ORDER BY admin_section_parent_id,admin_section_id ;", 'admin_section_id');
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
    $navbar .= load_sections(0,$sections);
    $navbar .= '</div>';
    $script = <<<SCRIPT
            <script type="text/javascript">
                   $('.nav').jqsimplemenu();
            </script>
SCRIPT;
    $navbar .=$script;
    
    return $navbar;
}