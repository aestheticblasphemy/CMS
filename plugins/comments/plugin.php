<?php
/*
 * This is the standard way of declaring the plugin to the CMS.
 */
$plugin=array(
'name' => 'Comments',
'description' => 'Allow people to comment on content.',
'version' => '2',
'category' => 'Communication',
'admin' => array(
                'menu' => array(
                                'Communication>Comments' => 'comments'
                                ) ,
                'settings' => array('file'=>'settings')
                ),
'user' => array(
                'menu' => array('Communication>Comments' => 'comments'),
                'page_tab' => array(
                                'name' => 'Comments',
                                'function' => 'post_comments_admin_page_tab'
                                )
                ),
'triggers' => array(
                    'content-block-created' => 'post_comments_show'
                ),
'stylesheet'    => 'style'
);

function post_comments_admin_page_tab(&$PAGEDATA)
{
    require_once SCRIPTBASE.'plugins/comments/'.'admin/page-tab.php';
    return $html;
}

function post_comments_show(&$PAGEDATA)
{
    global $SITEGLOBALS, $url;
    
    if(isset($_REQUEST['comments_disabled']) &&
                $_REQUEST['comments_disabled']=='yes')
    {
        $PAGEDATA .= '<div id="comments-bar" class="comments-bar alpha60">'.
                        'Comments have been disabled for this post </div>';
        
    return;
    }
    
    require_once SCRIPTBASE.'plugins/comments/'.'frontend/comment_lib.php';
    require SCRIPTBASE.'plugins/comments/'.'frontend/show.php';
}