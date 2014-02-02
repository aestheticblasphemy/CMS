<?php
echo '<div id="pages-wrapper">';
$sql = 'select * from ab_admin_content_info ';
if(isset($_REQUEST['view_section']))
{
    $sql .= 'where admin_content_section_id='.$_REQUEST['view_section'];
}
$sql .= ' order by admin_content_modify_date';
$rs=db_all($sql);

if(!empty($rs))
{
    $sections = db_all("SELECT * FROM ab_admin_sections ORDER BY 
        admin_section_parent_id,admin_section_id ;", 'admin_section_id');
echo '<table style="min-width:50%">
        <tr>
            <th>Post Title</th>
            <th>Section</th>
            <th>Actions</th>
        </tr>';

foreach($rs as $entry)
    {
        echo '<tr>
                <th><a href="#'.$entry['admin_content_id']
                .'">'.htmlspecialchars($entry['admin_content_title'])
                .'</a></th>';
        echo '<td><a href="authoring.php?view_section='.$sections[$entry['admin_content_section_id']]['admin_section_id'].'">'
                .$sections[$entry['admin_content_section_id']]['admin_section_name'].'</a></td>';
        echo '<td><a href="authoring.php?id='.$entry['admin_content_id'].'">edit</a>';
        echo '&nbsp;<a href="authoring.php?id='.$entry['admin_content_id']
                .'&amp;action=delete" onclick="return confirm(\'are you
                    sure you want to delete this post?\')">[x]</a></td></tr>';
    }

echo '</table>';
}
else
{
    echo 'No content created yet<br/><br/>';
}
echo '<a class="button" href="authoring.php?id=-1">Create Post</a>';
echo '</div>';