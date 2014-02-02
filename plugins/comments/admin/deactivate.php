<?php
require $_SERVER['DOCUMENT_ROOT'].'/core/core_lib.php';
$id=(int)$_REQUEST['id'];
db_query('update ab_admin_comments set admin_comment_status=0
where admin_comment_id='.$id);
echo '0';