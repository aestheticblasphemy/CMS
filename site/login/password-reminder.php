<?php

require 'login-libs.php';

login_check_is_email_provided();
//login_check_is_captcha_provided();
//login_check_is_captcha_valid();

// check that the email matches a row in the user table
$r=dbRow('select admin_user_email from ab_admin_users where
            admin_user_email="'.addslashes($_REQUEST['email']).'" and status'
        );
if($r==false){
    login_redirect($url,'nosuchemail');
}

// success! generate a validation email, then redirect
$validation_code=md5(time().'|'.$r['email']);
$email_domain=preg_replace('/^www\./','',$_SERVER['HTTP_HOST']);

dbQuery('update ab_admin_users set admin_user_act_key="'.$validation_code.'"
            where admin_user_email="'.addslashes($r['email']).'"');

$validation_url='http://'.$_SERVER['HTTP_HOST'].'/site/login/forgottenpassword-
validate.php?verification_code='.$validation_code.'&email='.$r['email'].'&redirect_url='.$url;

mail(
$r['email'],
"[$email_domain] forgotten password",
"Hello!\n\nThe forgotten password form at http://".$_SERVER['HTTP_
HOST']."/ was submitted. If you did not do this, you can safely
discard this email.\n\nTo log into your account, please use the link
below, and then reset your password.\n\n$validation_url",
"From: no-reply@$email_domain\nReply-to: no-reply@$email_domain"
);

login_redirect($url,'validationsent');
