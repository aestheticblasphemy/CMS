<?php 

/**
 * @file Contains Posts base class
 *
 * @access private
 *
 */
 
 class post {
	public $PostID = array(); 
	public $CreateDate= array();
	public $ModifyDate= array();
	public $EntryType= array();
        public $SectionID= array();
	public $AuthorID= array();
        public $AuthorName = array();
	public $ModifyUserID= array();
	public $Title= array();
	public $LinkedRes= array();
	public $Summary= array();
	public $Published= array();
	public $Data= array(); 
        public $Special= array();
        public $PageNumber;
        public $isSummary; //Display complete post or a snapshot
        public $numEntries;
        public $postURL = array();
	 /* Private Methods*/
	 
	 /* Public Methods */
	 function post()
         {
             //All this processing happens only if we are the front end
             if(!isset($_REQUEST['action']) || ($_REQUEST['action']!='Update' && $_REQUEST['action']!='Insert'))
             {
             $this->isSummary = 1;
             $this->PostID[0] = 0;
             $this->SectionID[0]= 0;
             //First see what is requested in the REQUEST variables
             if(isset($_REQUEST['section']))
             {
                 //Section has been passed, request to display posts from a 
                 //particular section and it's children
                 //Validate Section: Must be Integer
                 
                    $this->SectionID[0] = (int)$_REQUEST['section'];
             }
             else if(!isset($_REQUEST['id']))
             {
                 //It is the homepage
                 //Set ID to zero to get all the children of root
                 $this->SectionID[0] = 0;
             }
             
             else if(isset($_REQUEST['id']))
             {
                 //ID has been set. This is a particular post
                 //Validate ID: Must be Integer
                 
                    if(intval($_REQUEST['id'])<=0)
                    {
                        //We are in core creating a dummy object to write data into
                        return;
                    }
                    $this->PostID[0] = (int)$_REQUEST['id'];
                    //Unset the summary flag, we want the complete post
                    $this->isSummary = 0;
                 
             }
             //Also see if any page number has been passed:
             /*
              * This at present has little significance when displaying single 
              * posts, but is required for paginating the summaries of posts.
              * Later, we will paginate the posts too, when the content per 
              * post becomes very large, as in articles.
              */
             if(isset($_REQUEST['page']))
             {
                 //Validate Page: Must be Integer
                 if($_REQUEST['page']>=0)
                    $this->PageNumber = intval($_REQUEST['page']);
             }
             else
                 $this->PageNumber = 0;
             
             //Now, calculate the page offset
             global $post_per_page;
             $post_offset = ($post_per_page * $this->PageNumber);
             //fetch all the sub-children of this section
             //First, if it is homepage
             $sql = "SELECT * FROM ab_admin_content_info WHERE";
             //Now if a section has been selected
             if($this->SectionID[0] != 0)
             {
                 //Get all children of this section first, we did that back in
                 //the header class. It is safe to get it from there rather than
                 //do it again
                 global $header;
                 $section_list = $header->get_section_children($this->SectionID[0]);
                 
                 $sql .= " admin_content_section_id IN (";
                 foreach($section_list as $sec_id)
                 {
                     $sql .=$sec_id.",";
                 }
                 $sql .= $this->SectionID[0].") AND ";                 
             }
             else if($this->PostID[0] !=0)
             {
                 $sql .= " admin_content_id=".$this->PostID[0]. " AND ";
             }
        
             //Order by Most recent first and only the published entries
             $sql .=" admin_content_published_flag=1 ORDER BY admin_content_create_date DESC";
             $sql .=" LIMIT ".$post_offset.",".$post_per_page.";";
             
             $results = db_all($sql);
             $this->numEntries = count($results);
             //Now put them into their respective objects
             //First, let us rewind the pointers to the start
             //unset($this->SectionID);
             //unset($this->PostID);
             $this->SectionID = array();
             $this->PostID = array();
             foreach($results as $entry)
             {
                 $this->PostID[] = $entry['admin_content_id'];
                 $this->AuthorID[] = $entry['admin_content_author_id'];
                 $this->CreateDate[] = date_m2h($entry['admin_content_create_date']);
                 $this->Data[] = htmlspecialchars($entry['admin_content_data']);
                 $this->EntryType[] = $entry['admin_content_entry_type'];
                 $this->LinkedRes[] = $entry['admin_content_linked_res'];
                 $this->SectionID[] = $entry['admin_content_section_id'];
                 if(isset($entry['admin_content_summary']) && $entry['admin_content_summary'])
                    $this->Summary[] = htmlspecialchars($entry['admin_content_summary']);
                 else
                     $this->Summary[] = '';
                 $this->Title[] = htmlspecialchars($entry['admin_content_title']);
                 $this->Special[] = $entry['admin_content_special'];
                 /*
                 if(isset($this->AuthorID[$entry['admin_content_author_id']]) 
                         && $this->AuthorID[$entry['admin_content_author_id']])
                 {
                     //use the same name here, why make an additional query to get redundant data?
                     $this->AuthorID[]['author_name'] = $this->AuthorID[$entry['admin_content_author_id']]['author_name']; 
                 }
                 else
                 {
                  */
                     //make a query
                 $sql = "SELECT admin_user_email FROM ab_admin_users WHERE admin_user_id=".$entry['admin_content_author_id'].";";
                 $name =db_row($sql);
                     //echo '<pre>';
                     //print_r($name);
                     //echo '</pre>';
                 $this->AuthorName[] = $name['admin_user_email'];
                 //}
                 //Query Router for URL
                 $sql = "SELECT admin_post_url FROM ab_admin_page_router WHERE admin_post_id={$entry['admin_content_id']};";
                 $this->postURL[] = db_one($sql,'admin_post_url');
             }
         }
         }//end of determination if core/front

 }