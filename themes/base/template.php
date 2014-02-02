<?php
/*
 * This file defines the functions to render the page on the website.
 */

// render page header
function setHeader() {
?>
<?php print "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\r\n" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<!--| version <?php print VERSION ?> |-->

<head>
    <?php if(!empty($_COOKIE["cACCOUNT"])) { ?>
    <meta http-equiv="Refresh" content="<?php print TIMEOUT / 2 ?>; url=index.php" />
    <?php } ?>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title><?php print TITLE ?></title>
    <link href="<?php print SITE_DIR; ?>/_lib/_css/ab_blog_global.css" rel="stylesheet" media="screen" />
    <script language="javascript" src="<?php print SITE_DIR ?>_lib/_scripts/ab_blog_global.js" type="text/javascript"></script>
    <script language="javascript" type="text/javascript"><!--
    <?php print writeExceptions() ?>
    
    // verify action
    function verify() {
        if (confirm("Are you certain that you want to do that?")) {
            return true;
        } else {
            return false;
        }
    }
    
    // --></script>
</head>
<?php

} // end setHeader()

 require_once 'templates/html.tpl.php';
 require_once 'templates/header.tpl.php';