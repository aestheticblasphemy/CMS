<?php

/*
 * All the Data Fetching from the database is to be done through calls to this
 * library.
 */
require_once $_SERVER['DOCUMENT_ROOT']."/_lib/_base/basics.php";
require_once SCRIPTBASE.'_lib/_classes/class.header.php';
require_once SCRIPTBASE.'_lib/_classes/class.post.php';

/*
 * @function : fetch_entries
 * @purpose : Fetches the entries from a particular section sorted by 'most recent first' order
 * 
 * @Paramters : iSectionID - Section ID from where to fetch entries
 *              iPageSize - How many entries to fetch
 *              iCurrentPage - Current Page number in paginated browsing.
 * 
 */
function fetch_entries($iSectionID=0, $iPageSize=5, $iCurrentPage=0 )
{
    //Try to get entries 
    //Create a query
    $sql = "SELECT * FROM ab_admin_content_info ";
    //Fetch entries from a particular section
    if($iSectionID != 0)
    {
        $sql .= " WHERE admin_content_section_id=".$iSectionID." ";
    }
    //Sort by
    $sql .=" ORDER BY admin_content_create_date DESC";
    //Fetch $iPageSize entries starting from $iCurrentPage
    $sql .=" LIMIT ".($iCurrentPage*$iPageSize).",".(($iCurrentPage*$iPageSize)+ $iPageSize - 1).";";
    
    $entries = db_all($sql);
    return $entries;
}

function fetch_entry($iPostID)
{
    //Validate input
    if($iPostID != NULL)
    {
        $sql = "SELECT * FROM ab_admin_content_info WHERE admin_content_id=".$iPostID.";";
        $entry = db_all($sql);
    }
    else
    {
        $entry = array();
    }
    return $entry;
}

function load_login_module()
{
    $html = '<div class="header-login-bar" id="header-login-bar">';
    if(!isset($_SESSION['userdata']))
    $html .= <<<HTML
       	<form class="header-login-form" id="header-login-form" method="post" 
            action="login/login.php?redirect=/site">
    		<div class="email" id="email">
          Name &nbsp;<input id="email" type="email" name="email"/></div>
         <div class="login-form-password" id = "login-form-password"> 
          Password &nbsp;<input type="password" name="password"/></div>
          <input type="submit" value="Login" name="action" />
          </form>
HTML;
    else 
        $html .= <<<HTM
        <div class="header-logged-in" id="header-logged-in">
        	Welcome {$_SESSION['userdata']['admin_user_email']}.
                <br/>
            <a href="/core">Dashboard</a>
            <a href="/site/login/logout.php?redirect=/site">Logout</a>
        </div class="header-logged-in">
HTM;
                $html .= ' </div class="header-login-bar">';            
                
     return $html;
}

function load_header()
{
    global $title, $SITEGLOBALS;
    $header_block = <<<HEAD
      <div class="header-bar" id="header-bar">
	<div class="title-bar" id="title-bar">
        <div class="site-title" id="site-title">{$title}</div>
        <div class="site-tagline" id="site-tagline">{$SITEGLOBALS['site_tagline']}</div>
      </div>
HEAD;
    $header_block .= load_login_module();
    $header_block .=  '</div class="header-bar">';      
                
    return $header_block;
}

function load_body()
{
    if(isset($_REQUEST['id']))
    {
        $entries = fetch_entry($_REQUEST['id']);
    }
    else
    {
        //Is page number specified
        if(isset($_REQUEST['page']))
            $page = $_REQUEST['page'];
        else
            $page = null;
        
        //Is section ID specified
        if(isset($_REQUEST['section']))
        {
            $section_id = $_REQUEST['section'];
        }
        else
            $section_id = null;
        $entries = fetch_entries($section_id, 5 ,$page);
    }
    $i=0;
    $body = "";
    foreach($entries as $entry)
    {
        $post = <<<CONTENT
            <div class="content-bar" id="entry_wrapper_{$i}">
                    <h3 id="title_{$i}"><a href="?id={$entry['admin_content_id']}">{$entry['admin_content_title']}</a></h3>
                <div class="content_text" id="text_{$i}">
                    {$entry['admin_content_data']}
                </div>                               
CONTENT;
       $body .= $post;
       plugin_trigger('content-block-created', $body);
       $body .= '            </div>';
       $i++;
    }
    return $body;
}

function load_left_bar()
{
    $leftbar = "";
    return $leftbar;
}

function load_footer()
{
    $footer = '
        <emp>Aesthetic Blasphemy 2013 &copy; </emp><br/><br>
                <div class="licenses>
                <div class="license>
                <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.en_GB">
                <img alt="Creative Commons Licence" style="border-width:0" 
                src="http://i.creativecommons.org/l/by-sa/3.0/88x31.png" /></a>
                <br />
                <span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">
                All content hosted on Aesthetic Blasphemy</span> is licensed under a 
                <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.en_GB">
                Creative Commons Attribution-ShareAlike 3.0 Unported License</a>.
                </div>
                <div class="license">
                Site powered by <a href="#" target="_blank">code </a> released
                under <a href="http://www.gnu.org/licenses/gpl-3.0.html">GPL v3</a>,
                <a href="http://www.gnu.org/licenses/lgpl-3.0.html">LGPL</a> and all compatible licences.
                </div>
                </div>';
    return $footer;
}

function load_content_navigation()
{
    //If ID is set and PAGE is not set: Show previous entry and next entry
    //If PAGE is set and ID is not set: Show full Navigation Bar
    //If PAGE and ID are set, Just show previous entry and next entry
    //Neither PAGE is set nor ID is set: Homepage show full Navigation Bar
    //PAGE      ID      SECTION         ||          ACTION
    // 0        0           0                       Full General
    // 0        0           1                       Full Sectional
    // 0        1           0                       Next/Prev General
    // 0        1           1                       Next/Prev Sectional
    // 1        0           0                       Full General
    // 1        0           1                       Full Sectional
    // 1        1           0                       TBD
    // 1        1           1                       TBD
    global $post_per_page;
    global $url;
    $html = '<div class="content_navigation"> <ul class="pagination"> ';
    if(!isset($_REQUEST['id']))
    {
        //show complete Navigation Bar
        $query = "SELECT COUNT(*) FROM ab_admin_content_info ";
        $query .= " WHERE admin_content_published_flag=1 ";
        if(isset($_REQUEST['section']))
        {
            global $header;
            $section_children = $header->get_section_children($_REQUEST['section']);
            $section_children = implode(',',$section_children);
            $query .=" AND admin_content_section_id IN ($section_children) ";
        }
        $query .=";";
        $count = db_one($query,'COUNT(*)');
        //Calculate Number of Pages
        $num_pages = ceil($count / $post_per_page);
        
        //Determine what all page links need to be shown
        if(!isset($_REQUEST['page']))
        {
            //Show first page and next two hyperlinks
            $current_page = 0;
            if(!isset($_REQUEST['section']))
                $url .= '?page=0';//A clean URL was passed
            else
                //Section ID was passed.
                $url .= '&page=0';
        }
        else
            $current_page = $_REQUEST['page'];
        
        //Create HTML
        //Create 'First' Entry
        if($current_page != 0)
        {
            $html .= '<li><a href="'.preg_replace('/page\=([0-9]+)/','page=0',$url).'">First</a></li>';
        }
        //Create List
        global $pagination_scope;
        if($num_pages < $pagination_scope)
        {
            //Display all pages as list
            for($i=0;$i<$num_pages;$i++)
            {
                $html .= '<li>'.($i==$current_page?'':'<a href="'.
                            (preg_replace('/page\=([0-9]+)/','page='.$i,$url))
                        .'">').($i+1).($i==$current_page?'':'</a>').'</li>';
            }
        }
        else
        {
            //Display with offset from current page
            for($i=($current_page-($pagination_scope/2));$i<($current_page+($pagination_scope/2));$i++)
            {
                if(($i >= 0)&&($i<$num_pages))
                {
                    $html .= '<li>'.($i==$current_page?'':'<a href="'.
                            (preg_replace('/page\=([0-9]+)/','page='.$i,$url))
                        .'">').($i+1).($i==$current_page?'':'</a>').'</li>';
                }
            }
        }
        
        //Create Last Entry
        if($current_page != ($num_pages-1) && $current_page!=0)
        {
            $html .= '<li><a href="'.preg_replace('/page\=([0-9]+)/','page='.($num_pages-1),$url).'">Last</a></li>';
        }
        
                
        
        
        
    }
    else
    {
        //Show link to previous and next entry
        //ID is set.
        //Check if the Section has been set too?
        if(isset($_REQUEST['section']))
        {
            //Section also has been set. We need to find the ID of next entry 
            //in that section or any subsection
            global $header;
            $section_children = $header->get_section_children($_REQUEST['section']);
            $section_children = implode(',',$section_children);
            //First get the ID of all the entries from this section
            $query = "SELECT admin_content_id FROM ab_admin_content_info WHERE admin_content_section_id IN (".$section_children.") AND admin_content_published_flag=1 ORDER BY admin_content_create_date DESC;";
            $aEntries = db_all($query);
            //Now, to find the prev and next entry.
            $prev_id = 0;
            $next_id = 0;
            for($i=0;$i<count($aEntries);$i++)
            {
                if($aEntries[$i]== $_REQUEST['id'])
                {
                    //We've found our entry
                    if(isset($aEntries[($i-1)]))
                    {
                        $prev_id= $aEntries[($i -1)];
                    }
                    
                    if(isset($aEntries[($i+1)]))
                    {
                        $next_id= $aEntries[($i +1)];
                    }
                    
                    break;
                }
            }
            //Find it's URL from the routing table
            if($prev_id!=0 || $next_id!=0)
            {
                $query="SELECT * FROM ab_admin_page_router WHERE admin_post_id IN (".
                        ($prev_id!=0?$prev_id.',':'').
                        ($next_id!=0?$next_id:'').
                        ");";
                $aLinks = db_all($query,'admin_post_id');
                
                if($prev_id!=0)
                {
                    $html .= '<li class="previous_post"><a href="'.$aLinks[$prev_id]['admin_post_url'].'">Previous Post</a></li>';
                }
                if($next_id!=0)
                {
                    $html .= '<li class="next_post"><a href="'.$aLinks[$next_id]['admin_post_url'].'">Next Post</a></li>';
                } 
            }
        }
        else
        {
            //It is main page browsing
            $query = "SELECT admin_content_id FROM ab_admin_content_info WHERE admin_content_published_flag=1 ORDER BY admin_content_create_date DESC;";
            $aEntries = db_all($query);
            //Now, to find the prev and next entry.
            $prev_id = 0;
            $next_id = 0;
            for($i=0;$i<count($aEntries);$i++)
            {
                if($aEntries[$i]['admin_content_id']== $_REQUEST['id'])
                {
                    //We've found our entry
                    if(isset($aEntries[($i-1)]))
                    {
                        $prev_id= $aEntries[($i -1)]['admin_content_id'];
                    }
                    
                    if(isset($aEntries[($i+1)]))
                    {
                        $next_id= $aEntries[($i +1)]['admin_content_id'];
                    }
                    
                    break;
                }
            }
            //Find it's URL from the routing table
            if($prev_id!=0 || $next_id!=0)
            {
                $query="SELECT * FROM ab_admin_page_router WHERE admin_post_id IN (";
                if($prev_id!=0)
                    $query .= $prev_id;
                
                if($next_id!=0)
                {
                    if($prev_id!=0)
                        $query .= ',';    
                    $query .= intval($next_id);
                }
                $query .= ");";
                $aLinks = db_all($query,'admin_post_id');
                
                if($prev_id!=0)
                {
                    $html .= '<li class="previous_post"><a href="'.$aLinks[$prev_id]['admin_post_url'].'">Previous Post</a></li>';
                }
                if($next_id!=0)
                {
                    $html .= '<li class="next_post"><a href="'.$aLinks[$next_id]['admin_post_url'].'">Next Post</a></li>';
                } 
            }
        }
    }
    
    $html .="</ul></div>";
    return $html;
}