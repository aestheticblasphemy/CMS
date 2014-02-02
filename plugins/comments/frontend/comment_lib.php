<?php


/*
 * @function: ckeditor
 * @purpose: Launches the Rich Text Editor for editing purposes.
 * @arguments: $name - 
 *             $value - 
 *             $height - 
 */
function ckeditor($name,$value='',$height=250)
{
    return '<textarea style="width:100%;height:'.$height.'px"
    name="'.addslashes($name).'">'.htmlspecialchars($value)
    .'</textarea><script>$(function(){
    CKEDITOR.replace("'.addslashes($name).'", {
    toolbar:  [
    { name: \'document\', items: [ \'Source\' ] },
    { name: \'basicstyles\', items: [ \'Bold\', \'Italic\' ] }
],
    uiColor: \'#FFFFFF\',
    allowedContent: {
		\'b i \': true,
		a: { attributes: \'!href,target\' }		
	}
});
    });</script>';
}