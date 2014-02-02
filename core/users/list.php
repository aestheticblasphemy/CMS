<?php
//Run a database query to find all the users.
$users=db_all('select admin_user_id, admin_user_email, admin_user_group from 
    ab_admin_users order by admin_user_email');

echo '<table style="min-width:50%">
        <tr>
            <th>User</th>
            <th>Groups</th>
            <th>Actions</th>
        </tr>';

foreach($users as $user)
    {
        echo '<tr>
                <th><a href="users.php?id='.$user['admin_user_id']
                .'">'.htmlspecialchars($user['admin_user_email'])
                .'</a></th>';
        echo '<td>'.join(', ',json_decode($user['admin_user_group'])).'</td>';
        echo '<td><a href="users.php?id='.$user['admin_user_id'].'">edit</a>';
        echo '&nbsp;<a href="users.php?id='.$user['admin_user_id']
                .'&amp;action=delete" onclick="return confirm(\'are you
                    sure you want to delete this user?\')">[x]</a></td></tr>';
    }

echo '</table>';
echo '<a class="button" href="users.php?id=-1">Create User</a>';