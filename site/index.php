<?php

//Includes
//
//Load Template
    //Load Header

    

    //Load Footer
//Template End
//
//First read the currently applied global theme on the website from config file
require_once "fetch/fetch_lib.php";

//Set the number of posts per page
//Hard coded for now:
$post_per_page = 3;
$pagination_scope = 3;
//Process URL: Stage 2
$url = $_SERVER['REQUEST_URI'];
//Split the URL into its subcomponents
$url_parsed = parse_url($_SERVER['REQUEST_URI']);
/*
 * Anything after /site/ is a logical view and has to be translated into a real
 * view understandable by the system
 * 
 * This involves looking up the sections table if any such section exists there 
 * or not.
 * Other than that, there will be few entries that do not belong to that table
 * and must be checked before actually querying the table
 * These may be : User/user_name
 *              : about
 *              : contact
 *                Any other page with static content on it.
 * When such a logical view is requested by the user, it normally should not be 
 * accompanied by any GET request. If However it is, then we are going to discard
 * that request.
 * When using this model, we expect the user to query using pretty URLs which 
 * have a *.htm or *.html trailing them.
 */
$url_path = explode('/',$url_parsed['path']);
//Remove the starting null arising from the removal of '/'
array_shift($url_path);
$array_count = count($url_path);
if(empty($url_path[$array_count -1]))
{
    unset($url_path[$array_count -1]);
}
//Since we've reached here, it must be that either a good URL was passed, or
//a incomplete URL was dispatched with /site/ prepended to it.
//In any case, the first member of this array must be /site/ or it is an error
if($url_path[0] !='site')
{
    echo 'BAD URL (Err Umm, I guess it is a 404)';
    die();
}
else
{
    //Discard the 'site' path, we are intereseted in the rest of it
    array_shift($url_path);
}
/*
 * Now, with only the logical part remaining in our URL, we've to check the
 * following:
 *  The URL could have been : /site/index.php
 *                            /site/some_section
 *                            /site/some_section/some_post.html
 *                            /site/some_section/some_subsection
 *                            /site/some_section/some_subsection/some_sub_sub_section
 *                                  (That is the limit in our case)
 *                            /site/users/don_joe
 *                            /site/about
 *                            /site/contact
 *                            /site
 * In any case, with 'site' out of the way, the remaining expression can either 
 * refer to the index.php or to anything else that is merely a logical mirage.
 * What we have to do here is to convert that user friendly URL into something
 * that is real in the system. This is done as following:
 *                  -   Check if it is empty or index.php?
 *                      -   Serve index.php
 *                  -   Check if it is about/contact/any_other_static_content?
 *                      -   Serve static page
 *                  -   Check if it is users/...?
 *                      -   Find user with that username in DB
 *                      -   Render his/her public profile page
 *                  -   Does last element of this array represent a .html?
 *                      -   Yes?
 *                              A particular page is requested.
 *                              Match complete path in DB
 *                      -   No?
 *                              A whole section is requested.
 *                              Fetch that particular section.
 */
if(empty($url_path))
{
    array_push($url_path,'index.php');
}
switch($url_path[0])
{
    case 'users':
        //TODO: There is no public user profile page yet.
    case 'about':
    case 'contact':
        //TODO: We'll handle static content pages specially in a separate table
        // This table will contain only the content and the name
    case 'index.php':
        //Remove any GET request from the _REQUEST
        //We know of only two GET requests here: id and sections
        /*if(!empty($_REQUEST['id']))
        {
            unset($_REQUEST['id']);
        }
        if(!empty($_REQUEST['section']))
        {
            unset($_REQUEST['section']);
        }
         */
        break;
        
    default:
        //It is neither a static page, nor a index.php request. It must be a 
        //logical view request
        $num_path_nodes = count($url_path);
        $requested_resource = '/site/'.implode('/',$url_path);
        if(preg_match("/\.htm(l)?$/i",$url_path[$num_path_nodes - 1]))
        {
            //A particular page is requested            
            $query='SELECT admin_post_id FROM ab_admin_page_router WHERE admin_post_url="'.$requested_resource.'";';
            $response=db_one($query,'admin_post_id');
            if(intval($response))
            {
                $_REQUEST['id']= $response;
            }
            else
            {
                print("Not Found! It's a 404 I guess.");
                die();
            }
        }
        else 
        {
            //A full section is requested
            $query='SELECT admin_section_id FROM ab_admin_sections WHERE admin_section_url="'.$requested_resource.'";';
            $response=  db_one($query,'admin_section_id');
            if(intval($response))
            {
                $_REQUEST['section']= $response;
            }
            else
            {
                print("Not Found! It's a 404 I guess.");
                die();
            }
        }
}
//Rest of the code
$sticky = new sticky();
$header = new header();
$body =  new post();
$navigation = load_content_navigation();
$left_bar = load_left_bar();
$footer = load_footer();

//Check if the currently set theme is valid or not. This is ensured by the presence
//of a same named folder in the themes directory.
if(is_dir(SCRIPTBASE."themes/".$SITEGLOBALS['site_theme']))
{
    //Load the theme for website rendering
    require_once SCRIPTBASE."themes/".$SITEGLOBALS['site_theme']."/template.php";
}
else
{
    //load the default theme
    require_once SCRIPTBASE."themes/base/template.php";
}

echo $html;
