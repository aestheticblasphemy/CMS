<?php 
/* This function is called by the public site to get the name of sections from DB
 *  and by administrators to create new or delete/modify old sections.
 */
 
/*
 * Load Menus.
 * Queries the database permissions table and returns the applications that the user is permitted to use.
 */ 
 
 function load_menu($iUserId = '')
 {
	 global $db;
	 if(empty($iUserId))
	 {
		 //Log an error and redirect to main page
		 print("No User Value Set");
	 }
	 $sql = "SELECT admin_app_id FROM ab_admin_app_perms WHERE admin_user_id='".$iUserId."';";
	 
	 $rsTmp = $db->query($sql);
	 $iCount = $db->num_rows($rsTmp);
	 $aMenu = array();
	 for($i=0; $i<$iCount; $i++)
	 {
		 $aMenu[$i] = $db->fetch_array($rsTmp);
//		 print_r($aMenu[$i]);
	 }
	 //For each application ID, find its menu name and path from the application table

	 
	 $aResult = array();
	 for($i=0; $i<$iCount; $i++)
	 {
		 $sql = "SELECT admin_app_name,admin_app_path FROM ab_admin_apps WHERE admin_app_id=".$aMenu[$i][0].";";
		 $rsTmp= $db->query($sql);
		 $aResult[$i] = $db->fetch_array($rsTmp);
//		 print_r( $aResult[$i]);
	 }
	 
	 return($aResult);	 
 }
 
/*
 * To render the menu for viewing
 */
 
 function render_menu($aMenu='')
 {
		print '<table width="80%" class="sidebar" height="75%" border="0">';
		if(!empty($aMenu))
		{
				$iCount = count($aMenu);
				for($i=0;$i<$iCount; $i++)
				{
					print '<tr><td> <hr /> </td></tr>'.
						  '<tr><td> <a href="'.SITE_URL.DS.$aMenu[$i][2].'">'.$aMenu[$i][1].'</a></td></tr>';
						  	
				}
		}
		print '</table>';	 
 }
 
 /*
  * This function is used to fetch the names of all sections from the database to display them.
  * Reading does not require privileges.
  */
 function show_sections($iParent=null)
 {
	 	 global $db;
		 $sSection = 'ab_admin_sections';
		 $sql = "SELECT * FROM
		 			". $sSection;
		 if($iParent != null)
		 {
			 //We have to show a sub section
			 $sql = $sql." WHERE admin_section_parent_id=".$iParent;
		 }
		 else 
		 {
			 $sql = $sql." WHERE admin_section_parent_id is NULL";
		 }
		 $sql = $sql.";";
		$rsTmp = $db->query($sql);
		$iCount = $db->num_rows($rsTmp);
		$aSection = array();
		for($i = 0; $i< $iCount; $i++)
		{
			$aSection[$i] = $db->fetch_array($rsTmp);
			//Do something for debug			
			// print_r($aSection);
		}
		return($aSection);		
		//This returns sections as single row of array as:
		// | Section ID | Display Name | Table Name | Terminal Flag | URL_PATH |
 }

/*
 * This function returns the permissions for the user for that app.
 */
 function get_user_perms($iUserId ='', $iAppId = '')
 {
	 global $db;
	 $sql = "SELECT admin_perm FROM ab_admin_app_perms 
	 		 WHERE admin_user_id='".$iUserId."' AND
			 admin_app_id='".$iAppId."';";
	$rsTmp = $db->query($sql);
	$aReturn = $db->fetch_array($rsTmp);
	return($aReturn[0]);	 
 }
 
/*
 * This function returns the elements of the requested Section.
 */
 
 function get_single_row($sTable='', $iIndex=null)
 {
	 if(empty($sTable))
	 {
		 return false;
	 }
	 if($iIndex == null)
	 {
		 return false;
	 }
	 global $db;
	 $sFields = $db->get_table_fields($sTable);
	 $sql = "SELECT * FROM ".$sTable." WHERE ".$sFields[0]."=".$iIndex." LIMIT 0,1 ;";
	 
	 print $sql;
	 $rsTmp = $db->query($sql);
	 $aRow = $db->fetch_array($rsTmp);
	 return $aRow;
	 
 }
 
 function update_table_field($sTable = '', $sField = '', $sValue = '', $sCondition = '')
 {
	 global $db;
	 if((!empty($sTable)) && (!empty($sField)) && (!empty($sValue)) && (!empty($sCondition)))
	 {
		 $sql = "UPDATE db_aesthetic_blasphemy.".$sTable." SET ".$sField."='".$sValue."' WHERE ".$sCondition.";";
		 print $sql;
		 $rsTmp = $db->query($sql);
	 }
	 return true;
	 
 }
 
 function insert_table_field($sTable, $sFields, $sValues)
 {
	 global $db;
	 $sql = "INSERT INTO ".$sTable." ".$sFields." VALUES ".$sValues.";";
	 
	 print $sql;
	 $rsTmp = $db->query($sql);
	 return true;
 }
 
 function get_parent_path($iParentID)
 {
	 global $db;
	 $sql = "SELECT admin_section_url FROM ab_admin_sections WHERE admin_section_id=".$iParentID.";";
	 
	 $rsTmp = $db->query($sql);
	 $return = $db->fetch_array($rsTmp);
	 return $return;
 }
?>