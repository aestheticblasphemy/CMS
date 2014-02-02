<?php

/* 
 * @file This file contains the functions for the access module
 */
 
//Function to get a list of all section IDs that the user is allowed to manipulate
//Returns an array of sections that the user is permitted to use.
//The resulting array is 
//
// | Section ID | Section Name | Section Path |
function get_permitted_section_list($iUserID = '')
{
	 global $db;
	 if(empty($iUserId))
	 {
		 //Log an error and redirect to main page
		 print("No User Value Set");
	 }
	 $sql = "SELECT admin_section_id FROM ab_admin_section_perms WHERE admin_user_id='".$iUserId."';";
	 
	 $rsTmp = $db->query($sql);
	 $iCount = $db->num_rows($rsTmp);
	 $aMenu = array();
	 for($i=0; $i<$iCount; $i++)
	 {
		 $aMenu[$i] = $db->fetch_array($rsTmp);
	 }
	 //For each application ID, find its menu name and path from the application table
	 
	 $aResult = array();
	 for($i=0; $i<$iCount; $i++)
	 {
		 $sql = "SELECT * FROM ab_admin_sections WHERE admin_section_id=".$aMenu[$i][0].";";
		 $rsTmp= $db->query($sql);
		 $aResult[$i] = $db->fetch_array($rsTmp);
	 }
	 
	 return($aResult);	 
 }


//The function returns the permissions for a particular user for the requested Application
function get_section_permissions($iSecID= '', $iUserID='')
{
		 global $db;
	 if(empty($iUserId))
	 {
		 //Log an error and redirect to main page
		 print("No User Value Set");
	 }
	 if(empty($iSecID))
	 {
		 //Log an error and redirect to main page
		 print("No Section ID requested");
	 }
	 $sql = "SELECT admin_section_perm FROM ab_admin_section_perms WHERE admin_section_id=".$iAppID." AND admin_user_id=".$iUserID.";";
	 
	 $rsTmp = $db->query($sql);
	 $iPerm = $db->fetch_array($rsTmp);
	 return $iPerm;	  
}

//Function that sets the permission for a particular user for various applications.
//The application IDs and the respective permissions are sent as array into this function.

function set_section_permissions($iUserID='', $aPermissions='')
{
	global $db;
	//Ensure that the UserID is not NULL
	if(empty($iUserID))
	{
		print "User ID not set.";
	}
	//Ensure that the Permissions Array has consistent values.
	//The consistency is ensured if array has the following structure:
	// | App ID | App Permission |
	// The App ID and the App Permission fields must be integers and not NULL
    if(	!check_permission_consistency($aPermissions))
	{
		print "Consistency check failed. Discard Operation";
		return false;
	}
	//Check passed. Now, make query to table.
	$sql = "INSERT INTO ab_admin_section_perms (admin_section_id, admin_section_perm, admin_user_id)
			VALUES ";
	$i = 0;
	foreach($aPermissions as $aPermission)
	{
		list($iAppID, $iAppPerm) = $aPermission;
		$aPermArray[$i]= "(".$iAppID.",".$iAppPerm.",".$iUserID.")";
		$i++;
	}
	$iCount  = count($aPermArray);
	for($i=1;$i<=$iCount;$i++)
	{
		//Append the query
		if($i<$iCount)
		{
			//Append a comma at the end
			$sql .= $aPermArray[$i].', ';
		}
		else
		{
			$sql .= $aPermArray[$i];
		}
	}
	$sql .= ";";
	
	//Query now complete. Run it
	$rsTmp = $db->query($sql);
	
	return true;
}

//Function checks the consistency of field values of the passed Array.
function check_permission_consistency($aPermissions)
{
	$val = false;
	if(!strcmp(gettype($aPermissions), "array"))
	{
		//Is an array. Check values.
		foreach($aPermissions as $aAppInfo)
		{
			list($iAppID, $iAppPerm) = $aAppInfo;
			if(is_int($iAppID))
				if(is_int($iAppPerm))
					$val = true;
		}
	}
	return $val;
}

//Function to edit the permissions of the given user for the applications.
//This is identical to setting permissions, the only difference being, it modifies values

function update_section_permissions($iUserID='', $aPermissions='')
{
	global $db;
	//Ensure that the UserID is not NULL
	if(empty($iUserID))
	{
		print "User ID not set.";
	}
	//Ensure that the Permissions Array has consistent values.
	//The consistency is ensured if array has the following structure:
	// | App ID | App Permission |
	// The App ID and the App Permission fields must be integers and not NULL
    if(	!check_permission_consistency($aPermissions))
	{
		print "Consistency check failed. Discard Operation";
		return false;
	}
	//Check passed. Now, make recurcive queries to table.

	$i = 0;
	foreach($aPermissions as $aPermission)
	{
		$sql = "UPDATE ab_admin_section_perms SET ";
		list($iSecID, $iSecPerm) = $aPermission;
		$sql .= "admin_section_perm=".$iSecPerm." WHERE admin_user_id=".$iUserID." AND admin_section_id=".$iSecID.";";
		
		//Query now complete. Run it
		$rsTmp = $db->query($sql);
	}
	return true;
}
?>