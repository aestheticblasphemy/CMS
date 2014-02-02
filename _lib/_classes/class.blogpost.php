<?php

/*
 * @file This is the class definition for the blog post
 *
 */
 require_once ("class.database.php");
 require_once ("class.post.php");
 class blogpost extends post {
		 	 
	 public $iAuthor_id;
	 public $iHas_linked_resource;
	 public $aLinked_res_id;
	 public $sSummary;
	 public $iCategory;
	 public $aLabels;
	 
	 public $_oConn;
	 
	 //Constructor
	 function __construct()
	 {
		 global $db;
		 $this->_oConn =& $db;
	 }
	 
	 /* Gets User Parameters and sets them to this instance's values*/
	 public function set_author($userID)
	 {
		 $sql = "SELECT 
		 			admin_user_fname, admin_user_lname 
				FROM "
				.PREFIX."_admin_users_info 
				WHERE
					admin_users_id=".$userID."
				LIMIT 0,1 ;";
		$rsTmp = $this->_oConn->query($sql);
		$aName = $this->_oConn->fetch_array($rsTmp);
		$sName = implode(" ",$sName);
		
		$this->sAuthor = $sName;
		$this->iAuthor_id = $userID;
		$this->iLast_modify_user_id = $userID;		
	 }
 }

?>