<?php
/*
 * The various operations offered for managing the parameters of a section are 
 * controlled using actions.
 */
require 'sections_lib.php';

$id=(int)$_REQUEST['id'];
if($_REQUEST['action']=='delete')//Delete user account
{    
    delete_section($id);
    unset($_REQUEST['id']);
}

if($_REQUEST['action']=='Save')// Save the form details
{
    if($id==-1)
    {
        if($_REQUEST['parent']=='')
        {
            $parent_id = NULL;
        }
        else
        {
            $parent_id = intval($_REQUEST['parent']);
        }
        if(!isset($_REQUEST['content-type']))
        {
            $iContentType = '';
        }
        else
        {
            $iContentType = $_REQUEST['content-type'];
        }
        if(create_new_section($_REQUEST['name'],$parent_id, $iContentType))
                $_REQUEST['id']=  db_last_insert_id();
    }
    else
    {
       // db_query('update ab_admin_users '.$sql.' where admin_user_id='.$id);
       update_section($_REQUEST['id'],$_REQUEST['name']);
    }
    echo '<em>users updated</em>';
}

if($_REQUEST['action']=='Move')
{
    if(move_section($id, $_REQUEST['parent']))
        echo 'Moved';
    else
        echo 'Failed';
}