<?php
/*
 * The various operations offered for managing the parameters of a user are 
 * controlled using actions.
 */

$id=(int)$_REQUEST['id'];
if($_REQUEST['action']=='delete')//Delete user account
{
    db_query("delete from ab_admin_users where admin_user_id=$id");
    unset($_REQUEST['id']);
}

if($_REQUEST['action']=='Save')// Save the form details
{
    $groups=$_REQUEST['groups'];
    if(!count($groups))
        $groups=array(0);
    $grs=db_all('select admin_group_name from ab_admin_groups where admin_group_id in ('
            .addslashes(join(',',array_keys($groups)))
            .') order by admin_group_name');
    $groups=array();
    foreach($grs as $r)
        $groups[]=$r['admin_group_name'];
    
    $sql='set admin_user_email="'.addslashes($_REQUEST['email'])
            .'",status="'.(int)$_REQUEST['active'].
            '",admin_user_group="'.addslashes(json_encode($groups)).'"';
    if(isset($_REQUEST['password']) && $_REQUEST['password']!='')
    {
        if($_REQUEST['password']!==$_REQUEST['password2'])
            echo '<em>Password not updated. Must be entered the same twice.</em>';
        else $sql.=',admin_user_pass=md5("'
                .addslashes($_REQUEST['email'].'|'.$_REQUEST['password']).'")';
    }
    if($id==-1)
    {
        db_query('insert into ab_admin_users '.$sql);
        $_REQUEST['id']=  db_last_insert_id();
    }
    else
    {
        db_query('update ab_admin_users '.$sql.' where admin_user_id='.$id);
    }
    echo '<em>users updated</em>';
}