<?php

/*
 * Login functions for all users.
 */
require 'login-libs.php';

login_check_is_email_provided();

//check that the password is provided
if(!isset($_REQUEST['password']) || $_REQUEST['password']=='')
{
    login_redirect($url, 'nopassword');
}

//login_check_is_captcha_provided();
//login_check_is_captcha_valid();
plugin_trigger('form-block-submitted');

// check that the email/password combination matches a row in the user table
$password=md5($_REQUEST['email'].'|'.$_REQUEST['password']);
$r=db_row(
            'select * from ab_admin_users where
            admin_user_email="'.addslashes($_REQUEST['email']).'" and
            admin_user_pass="'.$password.'" and status'
        );
if($r==false){
        login_redirect($url,'loginfailed');
}

// success! set the session variable, then redirect
$_SESSION['userdata']=$r;

$groups=json_decode($r['admin_user_group']);
$_SESSION['userdata']['groups']=array();
foreach($groups as $g)
    $_SESSION['userdata']['groups'][$g]=true;

login_redirect($url);
?>
