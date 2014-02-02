<?php

/*
 * Common Library methods for Login to both admin and users
 */
require '../../_lib/_base/basics.php';

$url='/';
$err=0;

function login_redirect($url, $msg='success'){
    if($msg)
        $url .='?login_msg='.$msg;
    header('Location: '.$url);
    echo '<a href="'.htmlspecialchars($url).'">redirect</a>';
    exit;
}
//set up the redirect
if(isset($_REQUEST['redirect'])){
    $url=  preg_replace('/[\?\&].*/',
            '', 
            $_REQUEST['redirect']);
    /*Anshul*/
   // $url = $_SERVER['DOCUMENT_ROOT'].'/'.$url;
    if($url=='')
        $url='/'; /*Anshul */
      //  $url=$_SERVER['DOCUMENT_ROOT'];
}

// check that the email address is provided and valid
function login_check_is_email_provided(){
    if(
        !isset($_REQUEST['email']) || $_REQUEST['email']==''
        || !filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)
        ){
            login_redirect($GLOBALS['url'],'noemail');
        }
}

?>
