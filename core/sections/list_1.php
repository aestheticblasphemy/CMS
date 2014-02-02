<?php

/*
 * This file lists the sections present on the website in a heirarchical order
 * 
 */
function insert_node($node, &$into)
{
    //if(isset($into[$node['admin_section_parent_id']]))
    if($into['admin_section_id']==$node['admin_section_parent_id'])
    {
        //The index value is initialized. Found a parent
        //$into[$node['admin_section_parent_id']][$node['admin_section_id']]=array();
        //Push node into child
        array_push($into['children'], intval($node['admin_section_id']));
        return true;
    }
    //else we need to look iteratively into each of the node
    /*
    foreach($into as $parent)
    {
        if(insert_node($node, $parent))
                return true;
    }
     */
    return false;
}

function display_section_tree($section_id)
{
    global $sections;
    echo '<tr>
          <th><a href="sections.php?id='.$sections[$section_id]['admin_section_id']
                .'">'.$sections[$section_id]['admin_section_name']
                .'</a></th>';
        echo '<td><a href="sections.php?id='.$sections[$section_id]['admin_section_id'].'">edit</a>';
        echo '&nbsp;<a href="sections.php?id='.$sections[$section_id]['admin_section_id']
                .'&amp;action=delete" onclick="return confirm(\'are you
                    sure you want to delete this section?\')">[x]</a></td></tr>';
        if(!empty($sections[$section_id]['children']))
        {
            foreach($sections[$section_id]['children'] as $key=>$value)
            display_section_tree($value);               
        }
}  

$sections = db_all("SELECT * FROM ab_admin_sections ORDER BY 
        admin_section_parent_id,admin_section_id ;", 'admin_section_id');

//We have all the sections ordered by their parent IDs and then their own IDs
//here. Now, we can put them into hierarchy.
//$hierarchy = array();
$hierarchy = &$sections;


foreach($sections as &$section)
{
    //Initialize an array of possible children.
    //$hierarchy[$section['admin_section_id']]['children']= array();
        $section['children']=array();
    
    
    if($section['admin_section_parent_id']==NULL)
    {
        //$hierarchy[$section['admin_section_id']]=array();
        //$hierarchy[$section['admin_section_id']]=$section;
        continue;
        
    }
    else
    {        
        reset($hierarchy);
        foreach($hierarchy as &$parent)
        {
            if(insert_node($section,$parent))
            {
                $found = true;
                break;
            }
            //$found = false;            
            continue;
        }
        if(!$found)
        {
            print "Did not find a proper place for ".$section['admin_section_id'];
        }
    }    
}
//Now we have a hierarchical list of sections which we can display accordingly.
echo '<table style="min-width:50%">
        <tr>
            <th>Section</th>
            <th>Actions</th>
        </tr>';
foreach($sections as &$section)
{
    if(empty($section['admin_section_parent_id']))
    {
        echo '<tr>
          <th><a href="sections.php?id='.$section['admin_section_id']
                .'">'.$section['admin_section_name']
                .'</a></th>';
        echo '<td><a href="sections.php?id='.$section['admin_section_id'].'">edit</a>';
        echo '&nbsp;<a href="sections.php?id='.$section['admin_section_id']
                .'&amp;action=delete" onclick="return confirm(\'are you
                    sure you want to delete this section?\')">[x]</a></td></tr>';
        if(array_key_exists('children',$section) && !empty($section['children']))
        {
            foreach($section['children'] as $key=>$value)
            {
                display_section_tree($value);
            }
        }
    }
}
echo '</table>';
echo '<a class="button" href="sections.php?id=-1">Create Section</a>';

