<?php
/*
 *	This file contains various function pertaining to Comment Management.
 *
 */

function fetch_all_comments($iPostID)
{
	global $db;
	if(is_empty($iPostID))
	{
		return false;
	}
	$sql = "SELECT * FROM ab_admin_comments WHERE admin_post_id=".$iPostID.";";
	$rsTmp = $db->query($sql);
	$aResult = $db->fetch_array($rsTmp);

	return $aComments;
}
//Update Comment will be called when the post button is pressed
//This code assumes that the edit button will be available only to authorized users
function create_comment($oComment)
{
	global $db;
	if(is_empty($oComment->iContetnID))
	{
		return false;
	}
	if(is_empty($oComment->sAuthorName))
	{
		return false;
	}
	if(is_empty($oComment->sAuthorURI))
	{
		return false;
	}
	if(is_empty($oComment->sTitle))
	{
		return false;
	}
	if(is_empty($oComment->sData))
	{
		return false;
	}
	sanitize_text(&$oComment->sAuthorName);
	sanitize_text(&$oComment->sAuthorURI);
	sanitize_text(&$oComment->sTitle);
	sanitize_text(&$oComment->sData);

	$sql = "INSERT INTO ab_admin_comments ";
	$sql .= "(admin_comment_create_date, admin_comment_author_name, admin_content_author_uri, admin_content_title, admin_content_data, admin_post_id)";
	//date('Y-m-d H:i:s','1299762201428')
	$sql .= "VALUES";
	$sql .= "('".date('Y-m-d H:i:s', time())."','".$oComment->sAuthorName."','".$oComment->sAuthorURI."','".$oComment->sTitle."','".$oComment->sData."',".$oComment->iContentID.");";
	
	$rsTmp = $db->query($sql);
	return true;
}


//Function to make the necessary changes.
function update_comment($oComment = null)
{
		global $db;
	if(is_empty($oComment.iCommentID))
	{
		return false;
	}
	if(is_empty($oComment.sModifyAuthorName))
	{
		return false;
	}

	$sql = "UPDATE ab_admin_comments SET ";	
	$sql .= " admin_comment_modify_date='".date('Y-m-d H:i:s', time())."'";
	$sql .= " ,admin_content_modify_user_name=".$oComment->sModifyAuthorName;
	if(!is_empty($oComment->sTitle))
	{
		sanitize_text(&$oComment->sTitle);
		$sql .= " ,admin_content_title='".$oComment->sTitle."'";
	}
	if(!is_empty($oComment->sData))
	{
		sanitize_text(&$oComment->sData);
		$sql .= " ,admin_content_data='".$oComment->sData."'";
	}
	// admin_content_linked_res
	// admin_content_published_flag
	
	$sql .=" WHERE admin_comment_id=".$oComment->iCommentID.";";
	
	$rsTmp = $db->query($sql);
	return true;
}


//Function to get an entry to edit it and return a class object
/*
function fetch_single_comment($iPostID = '')
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

*/
//Function to delete the post. 

function delete_comment($iCommentID = '')
{
	if(is_empty($iCommentID))
	{
		return false;
	}
	global $db;
	$sql = "DELETE FROM ab_admin_comments WHERE admin_comment_id=".$iCommentID.";";
	
	$rsTmp = $db->query($sql);
	
	return true;	
}

//Flag user for inappropriate comment or language
function flag_user($iUserID)
{
	
}
?>