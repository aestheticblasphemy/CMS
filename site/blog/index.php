<?php

//File Location: /site/blog/index.php

//include the tpl_unsecure.php file that has the needed functions for the rest of the page
require_once("../tpl_unsecure.php");

//generate the header information
set_header();

//start a new page with a banner advertisement
open_page(TRUE);
?>

<!-- main content -->
<link href="../../_lib/_css/ab_blog_global.css" rel="stylesheet" type="text/css">

<table border="0" cellpading="0" cellspacing="0">
	<tr>
    	<td><div class="header"><?php echo ENTITY; ?> Newsfeed</div></td>
    </tr>
    <tr>
    	<td><div class="copy">To view news articles, select a news type from the list below.</div></td>
    </tr>
</table>

<table width="608" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td><div class="section">Something about Aesthetic Blasphemy</div></td>
	</tr>
    <tr>
    	<td><div class="copy">This is some test blog...</div></td>
    </tr>
  	<tr>
    	<td class="dotrule"><img src="../../_img/spc.gif" width="1" height="15" alt="" border="0" /></td>
    </tr>
    ....
    <tr>
    	<td align="right"><div class="section">
        <!-- |paging| -->
        
        <table width="35" border="0" cellpadding="0" cellspacing="0">
        	<tr>
            	<td width="15"><img src="../../_img/buttons/btn_prev.gif" width="15" height="15" alt="" border="0" /></td>
                <td width="5"><img src="../../_img/spc.gif" width="5" height="1" alt="" border="0" /></td>
                <td width="15"><img src="../../_img/buttons/btn_next.gif" width="15" height="15" alt="" border="0" /></td>
            </tr>
       </table>
       
       <!-- | paging | -->
       </div></td>
   </tr>
</table>

<?php 
//print out footer information
close_page();
?>
        