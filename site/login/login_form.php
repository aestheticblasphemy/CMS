<?php
require_once '/_lib/_base/basics.php';

/*
 * Displays a login form if the user is not logged in, else, displays the welcome message
 */
function show_login_form()
{
    if(!is_admin())
        return '<form method="post" action="'.SCRIPTBASE.'site/login/login.php?redirect='.$_SERVER['PHP_SELF'].'">
            <table>
                <tr>
                <th>e-mail</th><td><input type="email"  name="email"/></td>
                <th>Password</th><td><input type="password" name="password" /></td>
                <td><input type="submit" value="Login" name="action"/></td></tr>
            </table>
        </form>';
    else
        return 'Welcome '.$_SESSION['userdata']['admin_user_email'].
            '<div class="logged-in"><a href="/core/">Dashboard</a>
                &nbsp;&nbsp;
                <a href="/site/login/logout.php?redirect=/site">Logout</a>
                </div>';            
}