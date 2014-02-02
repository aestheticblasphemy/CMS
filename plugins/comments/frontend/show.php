<?php
require_once 'class.comment.php';
/*
if(!defined('COMMENT_DIR'))
{
    define('COMMENT_DIR', __DIR__);
}
require_once COMMENT_DIR.'/../../../_lib/htmlpurifier-4.5.0-lite/library/HTMLPurifier.auto.php';

$config = HTMLPurifier_Config::createDefault();
$purifier = new HTMLPurifier($config);
//$clean_html = $purifier->purify($dirty_html);
$comment = new comment();

 */
$c='';
$message='';
// { add submitted comments to database

if(isset($_REQUEST['action']) && $_REQUEST['action']=='Submit Comment')
{
    if(!isset($_REQUEST['post-comments-name']) || $_REQUEST['post-comments-name']=='')
            $message.='<li>Please enter your name.</li>';
    if(!isset($_REQUEST['post-comments-email']) 
            || !filter_var($_REQUEST['post-comments-email'],FILTER_VALIDATE_EMAIL))
            $message.='<li>Please enter your email address.</li>';
    if(!isset($_REQUEST['post-comments-comment']) ||
                    !$_REQUEST['post-comments-comment'])
        $message.='<li>Please enter a comment.</li>';
    
    //trigger plugins here for form submitted event to trigger Captcha Validation
    plugin_trigger('form-block-submitted', $body);
    if(isset($GLOBALS['PLUGIN_ERROR']))
    {
        $message = "<li>";
        foreach($GLOBALS['PLUGIN_ERROR'] as $plugin_error)
        {
            $message .= $plugin_error."&nbsp;&nbsp;&nbsp;";
        }
        $message .= "</li>";
    }
    
    if($message)
        $message='<ulclass="error post-comments-error">'.$message.'</ul>';
    else{
        $website=isset($_REQUEST['post-comments-website'])?$_REQUEST['post-comments-website']:'';
    if($SITEGLOBALS['comments|moderation_enabled']=='yes')
    {
        $status=0;
        if(mail($SITEGLOBALS['comments|moderation_email'],
        '['.$_SERVER['HTTP_HOST'].'] comment submitted',
        'A new comment has been submitted to the page "'
        .$url.'". Please log into the admin area of the site and moderate it using '
        .'that page\'s admin.',
        'From: noreply@'.$_SERVER['HTTP_HOST']
        ."\nReply-to: noreply@".$_SERVER['HTTP_HOST']))
        {
            print "Mail has been sent to moderator.";
        }
        else
        {
            print "OOPS!";
        }
        
        $message='<p>Comments are moderated. It may be a '
        .'few minutes before your comment appears.</p>';
    }
    else 
        $status=1;
db_query('INSERT INTO ab_admin_comments SET admin_comment_body="'
            .addslashes($_REQUEST['post-comments-comment'])
            .'",admin_comment_author_name="'
            .addslashes($_REQUEST['post-comments-name'])
            .'",admin_comment_author_email="'
            .$_REQUEST['post-comments-email']
            .'",admin_comment_author_website="'.addslashes($website)
            .'",admin_comment_create_date=now(),admin_comment_content_id='
            .$_REQUEST['id'].',admin_comment_status='
            .$status
            .";");
    }
}
// }
// { show existing comments
if(isset($_REQUEST['id']) && !isset($_REQUEST['total_only']))
{
    $c.='<h3>Comments</h3>';
    $comments=db_all('SELECT * from ab_admin_comments WHERE
    admin_comment_status=1 and admin_comment_content_id='.$_REQUEST['id'].' order by admin_comment_create_date;');
    if(!count($comments))
    {
        $c.='<p>No comments yet.</p>';
    }
    else foreach($comments as $comment)
    {
       // $c.=htmlspecialchars($comment['admin_comment_author_name']);
        if($comment['admin_comment_author_website'])
            $c.='<a href="http://'.htmlspecialchars($comment['admin_comment_author_website']).'">'
            .htmlspecialchars($comment['admin_comment_author_name']).'</a>';
        else
            $c .= htmlspecialchars($comment['admin_comment_author_name']);
            $c.=' said, at '.date_m2h($comment['admin_comment_create_date'])
            .':<br /><blockquote>'
            .nl2br(htmlspecialchars($comment['admin_comment_body']))
.'</blockquote>';
    }
}
else if(isset($_REQUEST['id']) && isset($_REQUEST['total_only']))
{
    $comments=db_row('SELECT COUNT(*) from ab_admin_comments WHERE
    admin_comment_status=1 and admin_comment_content_id='.$_REQUEST['id'].';');
    foreach($comments as $comment_count)
    $c .= $comment_count." comments.";
}
// }
// { show comment entry form
if(isset($_REQUEST['id']) && !isset($_REQUEST['total_only']))
{
    $c.='<script src="/_lib/ckeditor/ckeditor.js"></script>
        <a name="post-comments-submit"></a>'
    .'<h3>Add a comment</h3>';
    if($message)
        $c.=$message;
    $c.='<form action="'.$_SERVER['REQUEST_URI']/*.$PAGEDATA->getRelativeURL()*/
    .'#post-comments-submit" method="post"><table>';
    $c.='<tr><th>Name</th><td><input name="post-comments-name" />'
    .'</td></tr>';
    $c.='<tr><th>Email</th><td><input type="email" '
    .'name="post-comments-email" /></td></tr>';
    $c.='<tr><th>Website</th><td><input '
    .'name="post-comments-website" /></td></tr>';
    $c.='<tr><th>Your Comment</th><td>'//<textarea '
    //.'name="post-comments-comment"></textarea>'
    .ckeditor('post-comments-comment', '', 25)
    .'</td></tr>';
    //Trigger the form-body-created event here to load captcha if enabled
    plugin_trigger('form-block-created', $c);
    $c.='<tr><th colspan="2"><input type="submit" name="action" '
    .'value="Submit Comment" /></th></tr>';
    $c.='</table></form>';
}
    // }
    $PAGEDATA.='<div id="comments-bar" class="comments-bar">'.$c.'</div class="comments-bar">';
