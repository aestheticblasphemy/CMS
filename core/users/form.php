<?php
/*
 * Form for creating a new user or editing an existing one.
 */

$id=(int)$_REQUEST['id'];
$groups=array();
$r=  db_row("select * from ab_admin_users where admin_user_id=$id");
if(!is_array($r) || !count($r))
    {
        $r=array('admin_user_id'=>-1,'admin_user_email'=>'','status'=>0, 
            'admin_user_group'=>'');
    }
echo '<form action="users.php?id='.$id.'" method="post">'
        .'<input type="hidden" name="id" value="'.$id.'" /><table>'
        .'<tr><th>Email</th>
        <td><input name="email" value="'.htmlspecialchars($r['admin_user_email'])
        .'" /></td></tr>'
        .'<tr><th>Password</th>'
        .'<td><input name="password" type="password" /></td></tr>'
        .'<tr><th>(repeat)</th>'
        .'<td><input name="password2" type="password" /></td>'
        .'</tr>'
        .'<tr><th>Groups</th><td class="groups">';

$grs=  db_all('select admin_group_id, admin_group_name from ab_admin_groups');
$gms=array();

foreach($grs as $g)
{ 
    $groups[$g['admin_group_id']]=$g['admin_group_name'];
}
unset($grs);
$gms=json_decode($r['admin_user_group']);
if(empty($gms))
{
    $gms = array();
}
foreach($groups as $k=>$g)
    {
        echo '<input type="checkbox" name="groups['.$k.']"';
        if(in_array($g,$gms))
                echo ' checked="checked"';
        echo ' />',htmlspecialchars($g),'<br />';
    }
echo '</td></tr>';
// }
echo '<tr><th>Active</th><td><select name="active">
<option value="0">No</option>
<option value="1"'.($r['status']?'
selected="selected"':'').'>Yes</option></select></td></tr>';
echo '</table>';
echo '<input type="submit" name="action" value="Save" />';
echo '</form>';