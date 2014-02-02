<?php
/*
 * The various operations offered for content creation or deletion
 */
require_once 'authoring_lib.php';
require_once 'class.post.php';


    $id=(int)$_REQUEST['id'];

if($_REQUEST['action']=='delete')//Delete entry
{    
    if(isset($id) && $id>0)
    {
        delete_entry($id);
    
        unset($_REQUEST['id']);
        
    }
    else 
        print "No post to delete";
}

if($_REQUEST['action']=='Insert')// Save the entry
{
    $post = new post();
    $post->AuthorID = $_SESSION['userdata']['admin_user_id'];
    $post->CreateDate = date('Y-m-d H:i:s', time());
    $post->EntryType = (int)$_REQUEST['type'];
    $post->SectionID = (int)$_REQUEST['sections'];
    
    $post->Title = $_REQUEST['title'];
    $post->LinkedRes = 0;
    $post->Summary = isset($_REQUEST['summary'])?$_REQUEST['summary']: '';
    $post->Published = 1;
    $post->Data = isset($_REQUEST['body'])?$_REQUEST['body']:'';
    $post->Special = 0;
    
    if(create_entry($post))
                $_REQUEST['id']=  db_last_insert_id();
    //Also update Page Routing Table 
    //_REQUEST['id'] is the last Auto Incremented Value
    $sTitle = create_url($post->Title, $post->SectionID);
    $route_query = "INSERT INTO ab_admin_page_router (admin_post_id, admin_post_url) VALUES ({$_REQUEST['id']},'{$sTitle}');";
    $res = db_all($route_query);
    
    echo '<em>Entry Saved</em>';
}

if($_REQUEST['action']=='Update')
{
    $post = new post();
    
        $post->PostID = (int)$_REQUEST['id'];
   
    if(isset($_SESSION['userdata']['admin_user_id']) )
        $post->ModifyUserID = (int)$_SESSION['userdata']['admin_user_id'];
    else 
        die();
    
        $post->EntryType = (int)$_REQUEST['type'];
    
    
    $post->SectionID =(int)$_REQUEST['sections'];
    
    $post->Title = $_REQUEST['title'];
    $post->LinkedRes = 0;
    $post->Summary = isset($_REQUEST['summary'])?$_REQUEST['summary']: '';
    $post->Published = 1;
    $post->Data = isset($_REQUEST['body'])?$_REQUEST['body']:'';
    $post->Special = 0;
    
    if(update_entry($post))
               // $_REQUEST['id']=  db_last_insert_id();
    //Update Page Routing Table
    echo '<em>Entry Updated</em>';
}