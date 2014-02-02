<?php
/*
 * This is the standard way of declaring the plugin to the CMS.
 */
$plugin=array(
'name' => 'Recaptcha',
'description' => 'Displays Antispam Recaptcha text from the library.',
'version' => '1',
'category' => 'Antispam',
'admin' => array(
                'menu' => array(
                                'Antispam>Recaptcha' => 'recaptcha'
                                ) ,
                'settings' => array('file'=>'settings')
                ),
'triggers' => array(
                    'form-block-created' => 'recaptcha_show',
                    'form-block-submitted'=> 'recaptcha_validate'
                ),
);

function recaptcha_show(&$PAGEDATA)
{
    global $SITEGLOBALS, $url;
   
    require_once SCRIPTBASE.'plugins/recaptcha/lib/recaptcha.php';
    
    if(is_admin())
    return;
    require_once SCRIPTBASE.'plugins/recaptcha/'.'frontend/show.php';
}

function recaptcha_validate(&$PAGEDATA)
{
    global $SITEGLOBALS, $url;
    if(is_admin())
        return;
    
    require_once SCRIPTBASE.'plugins/recaptcha/lib/recaptcha.php';
    //Check if the captcha was correct
    if(check_is_captcha_provided())
        check_is_captcha_valid();
}