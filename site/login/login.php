<?php
//require SCRIPTBASE.'ab.includes/recaptcha.php';
//We'll develop captch as a plugin, not core.

//$captcha=recaptcha_get_html(RECAPTCHA_PUBLIC);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="charset=utf-8" />
        <title>Login to Aesthetic Blasphemy</title>
        <link rel="stylesheet" type="text/css" href=
              "//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/south-street/jquery-ui.css"/>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/site/login/login.css"/>
       <script src="<?php echo BASE_URL; ?>site/login/login.js"></script>

    </head>
    <body>
        <div id="header"></div>
        <?php
            if(isset($_REQUEST['login_msg']))
                {
                    require SCRIPTBASE.'/core/login/login-codes.php';
                    $login_msg=(int)$_REQUEST['login_msg'];
                    if(isset($login_msg_codes[$login_msg]))
                        {
                            echo '<script>
                                    $(function()
                                        {
                                            $("<strong>'
                            .htmlspecialchars($login_msg_codes[$login_msg])
                            .'</strong>").dialog({modal:true});});
                                    </script>';
                        }
                }
        ?>
        <div class="tabs" id="tabs">
            <ul>
                <li><a href="#tabs-1" class="form-element">Login</a></li>
                <li><a href="#tabs-2" class="form-element">Forgotten Password</a></li>                
            </ul>
        <div id="tabs-1">
            <form method="post"
                action="login/login.php?redirect=<?php echo $_SERVER['PHP_SELF'];?>">
                
                <table>
                    <tr>
                        <th>email</th>
                        <td>
                            <input id="email" name="email" type="email" />
                        </td>
                    </tr>
                    <tr>
                        <th>password</th>
                        <td>
                            <input type="password" name="password" />
                        </td>
                    </tr>
                    <?php
                        $html = '';
                        plugin_trigger('form-block-created', $html);
                        
                        echo $html;
                        ?>
                    </tr>
                    <tr>
                        <th colspan="2" align="right">
                            <input name="action" type="submit"
                                    value="login" class="login" />
                        </th>
                    </tr>
                </table>
            </form>
        </div>
            <div  id="tabs-2">
                <form method="post"
                      action="login/password-reminder.php?redirect=<?php echo $_SERVER['PHP_SELF']; ?>">
                    <table>
                        <tr>
                            <th>email</th>
                            <td>
                                <input id="email" type="text" name="email" />
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" align="right">
                                <input name="action" type="submit"
                                    value="resend my password" class="login" />
                            </th>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>
