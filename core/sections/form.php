<?php

/*
 * Form for creating a new section or editing an existing one.
 */

$id=(int)$_REQUEST['id'];
$sections=  db_all("SELECT * FROM ab_admin_sections ORDER BY 
        admin_section_parent_id,admin_section_id ;", 'admin_section_id');
//if(!is_array($r) || !count($r))
if($id== -1)
    {
        //Create a new section
        $r=array('admin_section_id'=>-1,'admin_section_terminal'=>1, 
            'admin_section_level'=>0, 'admin_section_name'=>'');
    }
else
{
    //Edit an old section
    $r=$sections[$id];
}
    //Get all the content types supported for this new entry.
    //If we are editing previous entry, we cannot modify it's entry type.
    $sql = "SELECT * FROM ab_admin_content_types ";
    /*if($edit==true)
    {
        $sql .= " WHERE admin_content_type_id=".$page['admin_content_entry_type'];
    }
     */
    $sql .= " ;";
    $types = db_all($sql);
echo '<form action="sections.php?id='.$id.'" method="post">'
        .'<input type="hidden" name="id" value="'.$id.'" /><table>'
        .'<tr><th>Section Name</th>
        <td><input name="name" value="'./*htmlspecialchars*/($r['admin_section_name'])
        .'" /></td></tr>'
        .'<tr><th>Parent Section</th>'
        .'<td><select name="parent" id="parent">'
        //Root element is also possible and default for new nodes
        .'<option value=""';
        if($r['admin_section_id']== -1)
            echo ' selelcted';
        else if($r['admin_section_parent_id'] && $r['admin_section_parent_id']==NULL)
                echo ' selected';
echo    '>_Root</option>';
foreach($sections as $parent_node)
        {
            if($parent_node['admin_section_id']!=$r['admin_section_id'])
            {
               echo '<option value="'.$parent_node['admin_section_id'].'"';
               if(array_key_exists('admin_section_parent_id',$r))
               {
               if($r['admin_section_parent_id']== $parent_node['admin_section_id'])
                    echo ' selelcted';
               }
               echo    '>'.$parent_node['admin_section_name'].'</option>';
            }
        }
echo '</td></tr>';
echo '<tr><th>Content Type</th><td><select name="content-type" id="content-type">';

foreach($types as $type)
{
    echo '<option value="'.$type['admin_content_type_id'].'"';
            if($type['admin_content_type_id']==1)
                echo ' selected ';
            echo   '>'.$type['admin_content_type_name'].'</option>';
}
echo '</select></td></tr>';
echo '</table>';
echo '<input type="submit" name="action" value="Save" />';
echo '</form>';