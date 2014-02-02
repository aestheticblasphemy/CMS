<?php 

/**
 * @file Contains Posts base class
 *
 * @access private
 *
 */
 
 class post {
	public $PostID; 
	public $CreateDate;
	public $ModifyDate;
	public $EntryType;
        public $SectionID;
	public $AuthorID;
	public $ModifyUserID;
	public $Title;
	public $LinkedRes;
	public $Summary;
	public $Published;
	public $Data; 
        public $Special;
        public $isSummary; //Display complete post or a snapshot
        public $numEntries;
	 /* Private Methods*/
	 
	 /* Public Methods */
	 function post()
         {
             $this->isSummary = 1;
             $this->PostID = 0;
             //First see what is requested in the REQUEST variables
             if(issset($_REQUEST['section']))
             {
                 //Section has been passed, request to display posts from a 
                 //particular section and it's children
                 
                 $this->SectionID = (int)$_REQUEST['section'];
             }
             else if(!isset($_REQUEST['id']))
             {
                 //It is the homepage
                 //Set ID to zero to get all the children of root
                 $this->SectionID = 0;
             }
             
             else if(isset($_REQUEST['id']))
             {
                 //ID has been set. This is a particular post
                 //Validate ID: Must be Integer
                 
                 $this->PostID = (int)$_REQUEST['id'];
                 //Unset the summary flag, we want the complete post
                 $this->isSummary = 0;
             }
             //fetch all the sub-children of this section
             //First, if it is homepage
             $sql = "SELECT * FROM ab_admin_content_info ";
             //Now if a section has been selected
             if($this->SectionID != 0)
             {
                 //Get all children of this section first, we did that back in
                 //the header class. It is safe to get it from there rather than
                 //do it again
                 global $header;
                 $section_list = $header->get_section_children($this->SectionID);
                 
                 $sql .= " WHERE admin_content_section_id LIKE (";
                 foreach($section_list as $sec_id)
                 {
                     $sql .=$sec_id.",";
                 }
                 $sql .= $this->SectionID.") ";                 
             }
             else if($this->PostID !=0)
             {
                 $sql .= " WHERE admin_content_id=".$this->PostID;
             }
             //Order by Most recent first and only the published entries
             $sql .=", admin_content_published_flag=1 ORDER BY admin_content_create_date DESC;";
             
             $results = db_all($sql);
             $this->numEntries = count($results);
             //Now put them into their respective objects
             foreach($results as $entry)
             {
                 $this->PostID[] = $entry['admin_content_id'];
                 $this->AuthorID[] = $entry['admin_content_author_id'];
                 $this->CreateDate[] = date_m2h($entry['admin_content_create_date']);
                 $this->Data[] = $entry['admin_content_data'];
                 $this->EntryType[] = $entry['admin_content_entry_type'];
                 $this->LinkedRes[] = $entry['admin_content_linked_res'];
                 $this->SectionID[] = $entry['admin_content_section_id'];
                 if(isset($entry['admin_content_summary']) && $entry['admin_content_summary'])
                    $this->Summary[] = $entry['admin_content_summary'];
                 else
                     $this->Summary[] = '';
                 $this->Title[] = $entry['admin_content_title'];
                 $this->Special[] = $entry['admin_content_special'];
                 if(isset($this->AuthorID[$entry['admin_content_author_id']]) 
                         && $this->AuthorID[$entry['admin_content_author_id']])
                 {
                     //use the same name here, why make an additional query to get redundant data?
                     $this->AuthorID[]['author_name'] = $this->AuthorID[$entry['admin_content_author_id']]['author_name']; 
                 }
                 else
                 {
                     //make a query
                     $sql = "SELECT admin_user_email FROM ab_admin_users WHERE admin_user_id=".$entry['admin_content_author_id'].";";
                     $name =db_one($sql);
                     $this->AuthorID[]['author_name'] = $name['admin_user_id'];
                 }
             }
         }

 }