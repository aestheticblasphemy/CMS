<?php

$html='';
$comments=db_all('SELECT * FROM ab_admin_comments WHERE admin_comment_content_id='.$_REQUEST['id'].' order by admin_comment_create_date desc;');
if(!count($comments))
{
    $html='<em>No comments yet.</em>';
    return;
}
$html.='<table id="post-comments-table"><tr><th>Name</th>'.'<th>Date</th><th>Contact</th>'.'<th>Comment</th><th>&nbsp;</th></tr>';
foreach($comments as $comment){
    $html.='<tr class="';
    if($comment['admin_comment_status'])
        $html.='active';
    else 
        $html.='inactive';

    $html.='" id="post-comments-tr-'.$comment['admin_comment_id'].'">';
    $html.='<th>'.htmlspecialchars($comment['admin_comment_author_name'])
            .'</th>';
    $html.='<td>'.date_m2h($comment['admin_comment_create_date'],'datetime')
            .'</td>';
    $html.='<td>';
    $html.='<a href="mailto:'
        .htmlspecialchars($comment['admin_comment_author_email']).'">'
        .htmlspecialchars($comment['admin_comment_author_email']).'</a><br />';
    
    if($comment['admin_comment_author_website'])
        $html.='<a href="'
                .htmlspecialchars($comment['admin_comment_author_website']).'">'
                .htmlspecialchars($comment['admin_comment_author_website']).'</a>';
    $html.='</td>';
    $html.='<td>'.htmlspecialchars($comment['admin_comment_body']).'</td>';
    $html.='<td></td></tr>';
}
$html.='</table><script src="/plugins/comments'
.'/admin/page-tab.js"></script>';
