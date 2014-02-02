<?php
require $_SERVER['DOCUMENT_ROOT'].'/core/core_lib.php';
$id=(int)$_REQUEST['id'];
db_query('delete from ab_admin_comments where admin_comment_id='.$id);
echo '1';