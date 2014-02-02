<?php

/*
 * Functions related to Content Creation, Editing and Deleting.
 *
 */

//This function receives the content in the form of a generic content class and makes
//the entry into the database.
// Text is sanitized here.
require_once ($_SERVER['DOCUMENT_ROOT']."/_lib/_classes/class.post.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/_lib/_base/error_handling.php");
function create_entry($oPost)
{
	//global $db;
	if(is_empty($oPost->AuthorID))
	{
		return false;
	}
	if(is_empty($oPost->Title))
	{
		return false;
	}
	if(is_empty($oPost->Data))
	{
		return false;
	}
	
	//sanitize_text(&$oPost->Title);
	//sanitize_text(&$oPost->Data);
	if(!is_empty($oPost->Summary))
	{
		//sanitize_text(&$oPost->Summary);
	}
	$sql = "INSERT INTO ab_admin_content_info ";
	$sql .= "(admin_content_create_date, admin_content_entry_type, admin_content_author_id, admin_content_title, admin_content_linked_res, admin_content_summary, admin_content_published_flag, admin_content_data, admin_content_special, admin_content_section_id)";
	//date('Y-m-d H:i:s','1299762201428')
	$sql .= "VALUES";
	$sql .= "('"
                .date('Y-m-d H:i:s', time())."',"
                .$oPost->EntryType
                .",".$oPost->AuthorID
                .",'".$oPost->Title
                ."',".$oPost->LinkedRes
                .",'".$oPost->Summary
                ."',".$oPost->Published
                .",'".$oPost->Data
                ."',".$oPost->Special
                .",".$oPost->SectionID
                .");";
	
	//$rsTmp = $db->query($sql);
        //print $sql;
        $rsTmp = db_all($sql);
	return true;
}


//Function to make the necessary changes.

function update_entry($oPost = null)
{
//		global $db;
	if(is_empty($oPost->PostID))
	{
		return false;
	}
	if(is_empty($oPost->ModifyUserID))
	{
		return false;
	}

	$sql = "UPDATE ab_admin_content_info SET ";	
	$sql .= " admin_content_modify_date='".date('Y-m-d H:i:s', time())."'";
	$sql .= " ,admin_content_modify_user_id=".$oPost->ModifyUserID;
	if(!is_empty($oPost->Title))
	{
		//sanitize_text(&$oPost->sTitle);
		$sql .= " ,admin_content_title='".$oPost->Title."'";
	}
	if(!is_empty($oPost->Data))
	{
		//sanitize_text(&$oPost->sData);
		$sql .= " ,admin_content_data='".$oPost->Data."'";
	}
	if(!is_empty($oPost->Summary))
	{
		//sanitize_text(&$oPost->sSummary);
		$sql .= " ,admin_content_summary='".$oPost->Summary."'";
	}
	// admin_content_linked_res
	// admin_content_published_flag
	if(!is_empty($oPost->LinkedRes))
	{
		$sql .=" ,admin_content_linked_res=".$oPost->LinkedRes;
	}
	if(!is_empty($oPost->Published))
	{
		$sql .=" ,admin_content_published_flag=".$oPost->Published;
	}
        if(!is_empty($oPost->EntryType))
	{
		$sql .=" ,admin_content_entry_type=".$oPost->EntryType;
	}
        if(!is_empty($oPost->SectionID))
	{
		$sql .=" ,admin_content_section_id=".$oPost->SectionID;
	}
	
	$sql .=" WHERE admin_content_id=".$oPost->PostID.";";
	
	//$rsTmp = $db->query($sql);
        $rsTmp = db_all($sql);
	return true;
}


//Function to get an entry to edit it and return a class object

function fetch_entry($iPostID = '')
{
	global $db;
	$oPost = new class_post;
	if(is_empty($iPostID))
	{
		return false;
	}
	$sql = "SELECT * FROM ab_admin_content_info WHERE admin_content_id=".$iPostID.";";
	$rsTmp = $db->query($sql);
	
	$aResult = $db->fetch_array($rsTmp);
	$oPost->PostID = $aResult['admin_content_id'];
	$oPost->CreateDate = $aResult['admin_content_create_date'];
	$oPost->ModifyDate = $aResult['admin_content_modify_date'];
	$oPost->EntryType = $aResult['admin_content_entry_type'];
	$oPost->AuthorID = $aResult['admin_content_author_id'];
	$oPost->ModifyUserID = $aResult['admin_content_modify_user_id'];
	
	//The Data Needs to be transformed back into what it was
	$oPost->Title = $aResult['admin_content_title'];
	$oPost->LinkedRes = $aResult['admin_content_linked_res'];
	//The Data Needs to be transformed back into what it was
	$oPost->Summary = $aResult['admin_content_summary'];
	$oPost->Published = $aResult['admin_content_published_flag'];
	//The Data Needs to be transformed back into what it was
	$oPost->Data = $aResult['admin_content_data'];
	
	return($oPost);
}

//Function to delete the post. 

function delete_entry($iPostID = '')
{
	if(is_empty($iPostID))
	{
		return false;
	}
	global $db;
	$sql = "DELETE FROM ab_admin_content_info WHERE admin_content_id=".$iPostID.";";
	
	//$rsTmp = $db->query($sql);
        $rsTmp = db_query($sql);
	
	return true;	
}

function create_url($sTitle, $iSectionID)
{
    //Lowercase everything
    $sTitle = strtolower($sTitle);
    //Replace non-characters with '_'
    $sTitle = trim(preg_replace('<\W+>','_',$sTitle));
    //Delete repeated underscores
    $sTitle = preg_replace('<(_)+>','_',$sTitle);
    //Now, find the URL of the section:
    $query = "SELECT admin_section_url FROM ab_admin_sections WHERE admin_section_id={$iSectionID};";
    $section_url = db_one($query,'admin_section_url');
    $url = $section_url.'/'.$sTitle.'.htm';
    return($url);    
}
?>