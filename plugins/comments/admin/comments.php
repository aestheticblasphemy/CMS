<?php

$htmlurl= htmlspecialchars('/core/plugin.php?_plugin='
        .'comments&_page=comments');

// { moderation settings
echo '<form action="',$htmlurl,'" method="post">'
,'<h2>Moderation</h2><table><tr><th>Enabled</th>'
,'<th>Moderator\'s email</th></tr>';
// { moderation enabled
echo '<tr><td><select name="moderation_enabled">'
,'<option value="no">No</option><option value="yes"';
if($SITEGLOBALS['comments|moderation_enabled']=='yes')
echo ' selected="selected"';
echo '>yes</option></select></td>';
// }
// { moderation email
echo '<td><input name="moderation_email" value="',htmlspecialchars(
$SITEGLOBALS['comments|moderation_email'])
,'" /></td>';
// }
echo '<td><input type="submit" name="action" value="save" '
,'/></td></tr></table></form>';
