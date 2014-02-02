<?php
if(file_exists(SCRIPTBASE."plugins/recaptcha/lib/recaptcha.php"))
{
    require_once SCRIPTBASE."plugins/recaptcha/lib/recaptcha.php";
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=='save')
{
    $error = false;
    $captcha_enabled=($_REQUEST['recaptcha_enabled']=='yes')?'yes':'no';
    
    if($captcha_enabled == 'yes')
    {
        if(isset($_REQUEST['public_key']) && !empty($_REQUEST['public_key']))
            $captcha_public_key=($_REQUEST['public_key']);
        else
            $error = true;
        
        if(isset($_REQUEST['private_key']) && !empty($_REQUEST['private_key']))
            $captcha_private_key=$_REQUEST['private_key'];
        else
            $error = true;
        if(!$error)
        {
            $config = <<<CONFIG
            <?php 
            require_once SCRIPTBASE.'plugins/recaptcha/lib/recaptcha-php-1.11/recaptchalib.php';
            require_once SCRIPTBASE.'plugins/recaptcha/lib/site_lib.php';
            require_once SCRIPTBASE.'core/core_lib.php';
            if(!defined('RECAPTCHA_PRIVATE'))
                define('RECAPTCHA_PRIVATE','{$captcha_private_key}'); // place private key here
            if(!defined('RECAPTCHA_PUBLIC'))
                define('RECAPTCHA_PUBLIC','{$captcha_public_key}'); // place public key here
CONFIG;
        file_put_contents(SCRIPTBASE."plugins/recaptcha/lib/recaptcha.php",$config);
        }
        else
          $captcha_enabled = 'no';  
    }
    $SITEGLOBALS['recaptcha|enabled']=$captcha_enabled;
    config_rewrite();
    if(!$error)
    echo '<em>Recaptcha options saved</em>';
    else
        echo '<em>The Public and the Private Key must be provided</em>';

}

$htmlurl= htmlspecialchars('/core/plugins/plugin.php?_plugin='
        .'recaptcha&_page=settings');

// { recaptcha settings
echo '<form action="',$htmlurl,'" method="post">'
    ,'<h2>Recaptcha AntiSpam Checking</h2><table><tr><th>Enabled</th>'
    ,'</tr>';

// { recaptcha enabled
echo '<tr><td><select name="recaptcha_enabled">'
    ,'<option value="no">No</option><option value="yes"';
if(isset($SITEGLOBALS['recaptcha|enabled']) &&($SITEGLOBALS['recaptcha|enabled']=='yes'))
echo ' selected="selected"';
echo '>yes</option></select></td></tr>';
// }
//{ recaptcha configuration
if(defined('RECAPTCHA_PUBLIC'))
{
    $pub_key = RECAPTCHA_PUBLIC;
}
else
    $pub_key = '';

if(defined('RECAPTCHA_PRIVATE'))
{
    $priv_key = RECAPTCHA_PRIVATE;
}
else
    $priv_key = '';
print '<tr><th>Public Key</th><td><input name="public_key" value="'.$pub_key.'"/></td></tr>';
print '<tr><th>Private Key</th><td><input name="private_key" value="'.$priv_key.'"/></td></tr>';
//}

echo '<tr><td><input type="submit" name="action" value="save" ','/></td></tr></table></form>';