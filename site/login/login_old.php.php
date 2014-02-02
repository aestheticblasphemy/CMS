<?php

// File Location: /site/login/login.php
require_once(getcwd()."/../../_lib/_base/initialize.php");
require_once(BASE_PATH.DS."error_handling.php");
require_once(BASE_PATH.DS."validation.php");
require_once(BASE_PATH.DS."string_handling.php");

require_once(SITE_DIR."/site/tpl_unsecure.php");

if ($_POST) { // check for http post vars
    
    // assign post vars
    $sUser = $_POST["user"];
    $sPass = $_POST["pass"];
    
    // validate user name
    if (!validUser($sUser)) {
        
        catchErr("Enter a valid user name");
        $FORMOK = false;
    }
    
    // validate user password
	/*
    if (!validPass($sPass)) {
        
        catchErr("Enter a valid password");
        $FORMOK = false;
    }
    */
    // if forms variables validated
    if ($FORMOK) {
        
        // assign array values
        $aArgs["User Name"] = $sUser;
        $aArgs["Password"] = $sPass;
        
        $oSess = new session;
        
        // try login and redirect
		$sPath = $oSess->login($aArgs);
		unset($sPath);
		//Path wrt Base URL only
		$sPath = SITE_URL.'/core/users/index.php';
        if (!empty($sPath)) {
            header("Location: {$sPath}");
        }
    }
    
} else { // post vars not sent
    
    // initialize page vars
    $sUser = null;
}

setHeader();
openPage();

?>

<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td><div class="header"><?php print ENTITY ?> Administrator Login</div></td>
    </tr>
    <tr>
        <td><div class="copy">Please complete the form below to log in to the system.</div></td>
    </tr>
    <tr>
        <td><div class="error"><?php writeErrors() ?></div></td>
    </tr>
</table>

<form action="<?php print SELF ?>" method="post" name="ab_login_form">
<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td><div class="formlabel">User Name:</div></td>
        <td><input type="text" name="user" value="<?php print clean($sUser) ?>" class="textfield" /></td>
    </tr>
    <tr>
        <td><div class="formlabel">Password:</div></td>
        <td><input type="password" name="pass" class="textfield" /></td>
    </tr>
    <tr>
        <td class="dotrule" colspan="2"><img src="../../_img/spc.gif" width="1" height="15" alt="" border="0" /></td>
    </tr>
    <tr>
        <td align="right" colspan="2"><input type="image" src="../../_img/buttons/btn_submit.gif" width="58" height="15" alt="" border="0" onfocus="this.blur();" name="Submit" /></td>
    </tr>
    <tr>
        <td colspan="2"><a href="reminder.php">Forgot your password?</a></td>
    </tr>
</table>
</form>

<?php //closePage(); ?>
