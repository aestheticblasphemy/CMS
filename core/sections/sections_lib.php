<?php

if(!defined('MAX_LEVEL'))
    define('MAX_LEVEL', 3);
if(!defined('SECTIONS_LIB'))
    define('SECTIONS_LIB', __DIR__);
require_once(SECTIONS_LIB."/../../_lib/_base/basics.php");
//require_once(SCRIPTBASE."/_lib/_base/config.php");
require_once(SCRIPTBASE."/_lib/_base/error_handling.php");
require_once (SCRIPTBASE."/_lib/_base/string_handling.php");

/*
 * Functions for managing sections/categories
 */
 
 //The following function creates a new section with the passed input parameters.
 //It first verifies that all the parameters passed are unique and then goes and
 //creates them
 /*
  * @arguments 	$sName: Name of the section
  *			   	$iParentID: ID of parent section (if any)
  *			   	$iContentType: Blog, Article or Photo
  * 
  * @Notes 		The level of the section will be computed here by looking at its 
  *				parent's level and if the level exceeds the maximum depth, it is 
  *				discarded.
  *				The content type automatically tells what table to use for posting
  *				data. It is defaulted to '1' (Blog Entry) if nothing is specified.
  *				Thus if the user does not pass any attribute for that, maybe because
  *				he/she wants to create it as a interim menu, internal handling will
  *				take care of that.
  *				The URL for the section is generated keeping its parent URL in mind.
  *				The table is terminal type by default until someone moves another
  *				section under it. In that case, it's data is moved downwards.
  */
 function create_new_section($sName='', $iParentID='', $iContentType=1)
 {
//	 global $db;
	 $sURL = '';
	 //Check validity of parameters
	 if(is_empty($sName))
	 {
		 return false;
	 }
	 if(is_empty($iContentType))
	 {
		 return false;
	 }
	 //Check Uniqueness of the name under the given parent ID.
	 //We are not checking against complete uniqueness because that is not necessary.
	 //We might need a hashing function to convert the Strings into Integers if the performance drops.
	 //But then, there is additional load of the hashing function.
	 if(!is_unique($sName, $iParentID))
	 {
		 //log non uniqueness error
             print "Non Unique Name";
		 return false;
	 }
	 
	 //Else the name is unique for this section.
	 //Get attributes of the parent if any.
         $iLevel = 0;
	 if($iParentID!=NULL)
	 {
	 	$aParentAttr = get_attributes($iParentID);
		//Check if new section level exceeds the max level count?

		if(($iLevel = $aParentAttr['admin_section_level'])== MAX_LEVEL)
		{
			//Cannot create section here
			//Log exception and return
                        print "Max level breached";
			return false;
		}
		//Level allowed 
		$iLevel++;
		//Set Path Prefix to the parent's path
		$sURL = $aParentAttr['admin_section_url'].'/';			 
	 }
         else
         {
             $sURL = "/site/";
         }
	 $sURL .= format_table_name('',$sName);

	 //now we have all the data to create a new table row
	 
	 $sql = "INSERT INTO ab_admin_sections (admin_section_name, admin_section_level, admin_section_url, ";
         if(!$iParentID==NULL)
         {
            $sql .= "admin_section_parent_id, ";
         }
         $sql .= "admin_section_entry_type)";
         
	 $sql.= " VALUES ('".$sName."',".$iLevel.",'".$sURL."',";
         if(!$iParentID==NULL)
         {
             $sql .=$iParentID.",";
         }
         $sql.=$iContentType.");";
	 
	// $rsTmp = $db->query($sql);
         print $sql;
         $rsTmp = db_all($sql);
	 return true;	 
 }

//Function to get the attributes of the row with index $iIndex from table $sTable

function get_attributes($iIndex = '')
{
//	global $db;
	if(is_empty($iIndex))
	{
		return false;
	}
	$sql = "SELECT * FROM ab_admin_sections WHERE admin_section_id=".$iIndex.";";
//	$rsTmp = $db->query($sql);
        $rsTmp = db_row($sql);
//	$aReturn = $db->fetch_array($rsTmp);
//	return $aReturn;
        return $rsTmp;
}


//Function Update Section does not concern with moving the section but just updating it's own parameters.
//Thus, its parent is not going to change, the only parameters that can change are:
//Name
//URL (changes with Name only
//Content Type
function update_section($iSecID = '', $sName = '', $iContentType = 1 )
{
//	global $db;
	$sURL = '';
	//check if the section ID is valid
	if(is_empty($iSecID))
	{
		return false;
	}
	//Rest all parameters are not mandatory.


		//Get the Old Name of this section. Update must have been on its
		//Content type

		$sql = "SELECT admin_section_name, admin_section_parent_id, admin_section_entry_type FROM ab_admin_sections WHERE admin_section_id=".$iSecID.";";
//		$rsTmp = $db->query($sql);
                $rsTmp = db_row($sql);
//		$aName = $db->fetch_array($rsTmp);
		//$sName = $aName['admin_section_name'];
                $aName = $rsTmp;
        //No new name has been provided.
        if($sName == $aName['admin_section_name'])
	{
		$iNewName = 0;
	}
	else
		$iNewName = 1;
	//New Name or not, by now we have a name for the section.
	
        $iNewParentID = intval($rsTmp['admin_section_parent_id']);
	//Check Uniqueness of the name under the given parent ID.
	if($iNewName==1)
	{
		if(!is_unique($sName, $iNewParentID))
		{
			//log non uniqueness error
                    print "Same name exists. Failed!";
			return false;
		}	
	}//Checked uniqueness
	//recompute URL Path w.r.t. Parent ID
	 //Get attributes of the parent if any.
	 if(($iParentID = $aName['admin_section_parent_id'])!=NULL)
	 {
	 	$aParentAttr = get_attributes($iParentID);
/*
		//Check if new section level exceeds the max level count?
		if(($iLevel = $aParentAttr['admin_section_level'])== MAX_LEVEL)
		{
			//Cannot create section here
			//Log exception and return
			return false;
		}
		//Level allowed 
		$iLevel++;
*/
		//Set Path Prefix to the parent's path
		$sURL = $aParentAttr['admin_section_url']."/";			 
	 }
         else
         {
             $sURL = "/site/";
         }
	 $sURL .= format_table_name('',$sName);
	 
	 //Check if its Content Type changed?
	 if($iContentType != $aName['admin_section_entry_type'])
	 {
		 //Content type has changed. This is allowed only if there is no previous 
		 //content in this section
		$sql = "SELECT * FROM ab_admin_content_info WHERE admin_content_section_id=".$iSecID.";";
		//$rsTmp = $db->query($sql);
                $rsTmp = db_all($sql);
		//if(($db->num_rows($rsTmp))>0)
                if(count($rsTmp)>0)
		{
			//We have prior content there, it was a terminal leaf.
			//log error and return
			return false;
		}	
	 }
	 //Content type is OK
	 
	 //Now run update:
	 
	 $sql = "UPDATE ab_admin_sections SET admin_section_name='".$sName."'";
	 if($iNewName ==1)
	 {
		 //THe URL must have been recomputed. 
		 $sql .= ", admin_section_url='".$sURL."'";
	 }
	 $sql .=", admin_section_entry_type=".$iContentType;
	 $sql .= " WHERE admin_section_id=".$iSecID.";";
	 
//	 $rsTmp = $db->query($sql);
//         print $sql;
         $rsTmp = db_all($sql);
	 return true;
}


//This function concerns itself with the moving of the section to a new parent.
//It might be the most complicated function.
//1. Validate Existence of Section, Parent and Target Sections.
//2. If all OK, determine uniqueness of the name of the section.
//3. If all OK, determine if there are subsections here.
//4. The impact on number of levels in the new section (must not exceed MAX_LEVELS
//5. Determine if the New Parent section is terminal or not?
//		If it is, then it must not contain any content, otherwise, the operation fails.
//6. Recursively, make the URL and level updates to this section and all the sub-sections.
//The entire moving operation will be a recursive operation.

function move_section($iSecID = '', $iNewParentID = '')
{
//	global $db;
	
	if(is_empty($iSecID))
	{
		return false;
	}
	//Either of the other two can have NULL values. So, don't check
	
	//Check if the target is able to accept new menus?
        if($iNewParentID != null)
        {
            $aTarget = get_attributes(intval($iNewParentID));
            if($aTarget['admin_section_level']== MAX_LEVELS)
            {
		//The target section is already at its max level. We cannot add submenus
		//Log error.
		return false;
            }
        }
        else
        {
            $aTarget = array();
            $aTarget['admin_section_level'] = -1;
            
        }
	
	//First, get the parameters of this section row.
	$aSection = get_attributes($iSecID);
        $aSectionName = $aSection['admin_section_name'];
        $aSectionName = str_replace(' ', '_', strtolower($aSectionName));
	$iMoreLevels = 1;
	//Check of there are more levels involved?
	//Query Model
	$iMoreLevels += find_depth($iSecID);

	//Now, check if moving to the target is feasible
		// 1. Check uniqueness of name under new parent.
		// 2. Check Level of the new parent and the final level of the lowest leaf
		//		after the operation.
        $new = $aTarget['admin_section_level']+ $iMoreLevels;
	if($new > MAX_LEVEL)
	{
		//The operation will violate the maximum levels condition. 
		//log error
		return false;
	}
	
	//The operation is feasible structurally. Now check uniqueness of name.
	if(!is_unique($aSection['admin_section_name'], $iNewParentID))
	{
		//log non uniqueness error
		return false;
	}
	
	//Now, eveything is fine, we can proceed with moving the sections.
	//Moving the section is changing its parent ID, it's URL and it's depth 
        //and the depth of all it's children 
	//The complex part is to update the max levels of each child
	//This part of the code must be done within a single transaction in future.
	$sql = "UPDATE ab_admin_sections SET admin_section_parent_id";
        if($iNewParentID !=null)
        {
            $sql .= "=".$iNewParentID;
            //It's URL also has changed.
            $sql .= ", admin_section_url='".$aTarget['admin_section_url'].'/'.$aSectionName."' ";
        }
        else
        {
            $sql .= " is NULL ";
            $sql .= ", admin_section_url='/site/".$aSectionName."' ";
        }
        $sql .= " WHERE admin_section_id=".$iSecID.";";
//	$rsTmp = $db->query($sql);
        $rsTmp = db_all($sql);
	
	//Update the terminal flag of the parent also
	$sql = "UPDATE ab_admin_sections SET admin_section_terminal=0 WHERE admin_section_id=".$iNewParentID.";";
	//$rsTmp = $db->query($sql);
        $rsTmp = db_all($sql);

	
	//Recursively update the levels of each sub menu.
	if(!update_levels($iSecID, ($aTarget['admin_section_level'])+1))
	{
		//could not update the levels of sub fields though the section has been moved.
		//idealy, the transaction should rollback.
		return false;
	}
	
	return true;	
}


//This function determines the maximum depth of the tree below the passed node.
function find_depth($iSecID='')
{
//	global $db;
	$iDepth = 0;
	$aVal = array();
	if(is_empty($iSecID))
	{
		//Error condition
		return false;
	}
	$sql = "SELECT * FROM ab_admin_sections WHERE admin_section_parent_id=".$iSecID.";";
	//$rsTmp = $db->query($sql);
        $rsTmp = db_all($sql);
	//if(($iCount = $db->num_rows($rsTmp)) >0)
        if(($iCount = count($rsTmp))>0)
	{
		//for each of the returned row, call this function iteratively so that the depth of each
		//is returned as a array element from which we can find the maximum value later
		for($i=0;$i<$iCount;$i++)
		{
			//$tempRow = $db->fetch_array($rsTmp);
                        $tempRow = $rsTmp[$i];
			$aVal[$i] = find_depth($tempRow['admin_section_id']);
		}
		$iDepth = max($aVal);
	}

	return $iDepth;
}



//Function to check the uniqueness of the name under a parent ID
function is_unique($sName = '', $iParentID = '')
{
//		global $db;
		//Ensure Uniqueness of the Section Name
		$sql = "SELECT admin_section_id FROM ab_admin_sections WHERE" ;
		//Only the name changed, but the parent was constant
		$sql .= " admin_section_name='".$sName."'";
		if($iParentID != NULL)
		{
			$sql .= " AND admin_section_parent_id=".$iParentID.";";
		}
		else
		{
			$sql .= " AND admin_section_parent_id IS NULL ;";
		}
		
	 	//$rsTmp = $db->query($sql);
                $rsTmp = db_all($sql);
	 	//if($db->num_rows($rsTmp)>0)
                if(count($rsTmp)>0)
		 {
			 //We found a match. Just abort everything and tell the user.
			 //log error.
			 return false;
	 	}
		//New Name is Unique to the parent.		
		return true;
}//Checked uniqueness

//Function to update the section's and its children nodes sublevels starting from the given count.
function update_levels($iSecID = '', $iLevel = '')
{
//	global $db;
	
	$sql = "UPDATE ab_admin_sections SET admin_section_level=".$iLevel." WHERE admin_section_id=".$iSecID. ";";
	//$rsTmp = $db->query($sql);
        $rsTmp = db_all($sql);

//Find any sub childs and update their levels too.
	$sql = "SELECT * FROM ab_admin_sections WHERE admin_section_parent_id=".$iSecID.";";
	//$rsTmp = $db->query($sql);
        $rsTmp = db_all($sql);
	//if(($iCount = $db->num_rows($rsTmp)) >0)
        if(($iCount = count($rsTmp)) >0)
	{
		//for each of the returned row, call this function iteratively so that the level of each
		//is updated recursively
		$iLevel++;
		for($i=0;$i<$iCount;$i++)
		{
			//$tempRow = $db->fetch_array($rsTmp);
                        $tempRow = $rsTmp[$i];
			update_levels($tempRow['admin_section_id'], $iLevel);
		}
	}
	return true;
}

//Function to delete the section from DB
//It is the responsibility of the user for now to ensure that all data has been moved
//before deleting the section. All data, if not moved previously will  be deleted.
//This should be used only for termnial sections.
//For non-terminal sections, it will fail. This is to ensure that data is not lost accidentaly.

function delete_section($iSecID='')
{
//		global $db;
		if(is_empty($iSecID))
		{
			return false;
		}
		//Check children

//Find any sub childs and update their levels too.
		$sql = "SELECT * FROM ab_admin_sections WHERE admin_section_parent_id=".$iSecID.";";
//		$rsTmp = $db->query($sql);
                $rsTmp = db_query($sql);
//		if(($iCount = $db->num_rows($rsTmp)) >0)
                if(($iCount = count($rsTmp))>0)
		{
			//Log error of non-termnial section
//			return false;	
                    //This sub-section has no children. We can delete it.
		}
		
		//Delete section first
		$sql = "DELETE FROM ab_admin_sections WHERE admin_section_id=".$iSecID;
		//$rsTmp = $db->query($sql);
                $rsTmp = db_query($sql);
		//Now delete all the data that belongs to this section.
		$sql = "DELETE FROM ab_admin_content_info WHERE admin_section_id=".$iSecID;
		//$rsTmp = $db->query($sql);
                $rsTmp = db_query($sql);
		
		//This must automatically affect Comments table as Data fields' ID will be used as foreign key there.
		
		return true;
}


//Function to enalbe user to transfer all data from one section to another without deleting them
// provided the two content types are compatible.
function change_data_section_bulk($iOldSecID = '', $iNewSecID = '')
{
	global $db;
	if(is_empty($iOldSecID))
	{
		//log error
		return false;
	}
	if(is_empty($iNewSecID))
	{
		//log error
		return false;
	}
	$aOldattr = get_attributes($iOldSecID);
	$aNewattr = get_attributes($iNewSecID);
	if($aOldattr['admin_section_entry_type']!=$aNewattr['admin_section_entry_type'])
	{
		//log incompatibility error
		return false;
	}
	
	$sql = "UPDATE ab_admin_content_info SET admin_section_id=".$iNewSecID." WHERE admin_section_id=".$iOldSecID.";";
	$rsTmp = $db->query($sql);
	
	return true;
}

