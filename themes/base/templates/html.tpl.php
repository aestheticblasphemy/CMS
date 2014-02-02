<?php
/*
 * This is the base template for the CMS public site. The various class objects
 * and other usable variables which can be used for rendering data are:
 * 
 * Variable/Object                          Type                Mandatory  
 * 
 * 
 * header.title                             String              Yes
 * header.tagline                           String              No
 * header.logo                              Image               No
 * header.navbar                            Array: ul li        Yes
 * header.slideshow                         Array: ul div/img   No
 * header.site_url                          String              Yes
 * 
 * content.PostID                           Array               
 * content.CreateDate                       Array
 * content.ModifyDate                       Array
 * content.EntryType                        Array
 * content.SectionID                        Array
 * content.AuthorID                         Array
 * content.AuthorName                       Array
 * content.ModifyUserID                     Array
 * content.Title                            Array
 * content.LinkedRes                        Array
 * content.Summary                          Array
 * content.Published                        Array
 * content.Data                             Array 
 * content.Special                          Array
 * content.isSummary                        Int //Display complete post or a snapshot
 * content.numEntries                       Int 
 * content.postURL                          Array
 */

$html = <<<HEADER
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{$header->title}</title>
    <script type="text/javascript"> var site_url= '{$header->site_url}';</script>
     <script src="{$header->site_url}/_lib/_scripts/jquery.min.js"></script>
    <script src="{$header->site_url}/_lib/_scripts/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="{$header->site_url}/_lib/_scripts/jquery-ui.css" type="text/css" />
    <script src="{$header->site_url}/_lib/jqsimplemenu/js/jqsimplemenu.js"></script>
    <link rel="stylesheet" href="{$header->site_url}/_lib/jqsimplemenu/css/jqsimplemenu.css" type="text/css" />
    <!--<link rel="stylesheet" href="{$header->site_url}/_lib/_css/ab_blog_global.css" type="text/css" />-->
    <link rel="stylesheet" href="{$header->site_url}/themes/base/style/base.css" type="text/css" />
    <script type="text/javascript" src="{$header->site_url}/themes/base/slider.js"> </script>

HEADER;
    /*
     * <pre><code>&lt;script type="text/javascript"&gt;
   var imagePath = 'http://sstatic.net/so/img/';
&lt;/script&gt;
</code></pre>
     */
//Include all plugin stylesheets
foreach($SITESTYLES as $plugin)
{
    $html .= '<link rel="stylesheet" href="'.$header->site_url.'/plugins/'.$plugin.'.css" type="text/css" />';
}
$html .= <<<EOF
        </head>

<body>
  <!-- Sticky Start -->
	{$sticky->elements}
<!-- Sticky End -->
<!-- Header Start -->
<div class="header">
	       <!-- Site Title Start -->
           <h1>{$header->title}</h1>
	       <!-- Site Title End -->           
	       <!-- Site Tagline Start --> 
           <h3>{$header->tagline}</h3>          
	       <!-- Site Tagline End -->
  	       <!-- Navbar Start -->
           <div class="navbar">
                {$header->navbar}
           </div>           
  	   <!-- Navbar End -->                      
  	   <!-- Picture Slideshow Start -->
           <div class="slideshow-wrapper">
            	<div class="slideshow" id="slideshow">				
                    
                    {$header->slideshow}
                    
                    <div class="slide-controls">
      					<div class="slide-move prev" data-target="prev">&lsaquo;</div>
      					<div class="slide-move next" data-target="next">&rsaquo;</div>
        				<ul class="pager_list"></ul>                    
                    </div>
		</div>
                <script type="text/javascript">
					$('#slideshow').easyFader({
   						 slideDur: 5000,
    					fadeDur: 800
						});
		</script>
            </div>
            <br/>
  	   <!-- Picture Slideshow End -->                              
</div>
<!-- Header End -->
EOF;
 
$html .= '<!-- Content Part Start -->
<div class="content">';
if($body->isSummary == 1)
{
    //Display only the summary in small thumbnail divs
    for($i=0;$i<$body->numEntries;$i++)
    {
            $html .= <<<BODY
                    
            <div class="entry-preview alpha60">
            <!--Content title -->
                <a href="{$body->postURL[$i]}">
                    <h3 class="entry-title">{$body->Title[$i]}</h3>
                </a>
                    <br/>	
                    <div class="content-summary">
                    {$body->Summary[$i]}
                    </div>
BODY;
    //Trigger content created plugin here
    //Set GET variables temporarily
    if(isset($_REQUEST['id']))
    {
        $temp = $_REQUEST['id'];
    }
    $_REQUEST['id']= $body->PostID[$i];
    $_REQUEST['total_only'] = 1;
    plugin_trigger('content-block-created', $html);
    //Clear total_only and reset id to original
    if(isset($temp))
    {
        //if temp was set, that means we swapped the original ID, put it back
        $_REQUEST['id'] = $temp;
    }
    else
    {
        //temp was not set, which means we put id in GET. Now remove it
        unset($_REQUEST['id']);
    }
    unset($_REQUEST['total_only']);
         $html.= '</div>';
    }
    //Display Tab for navigating the entries
    $html  .= $navigation;
}
else
{
    //It is a single post with complete rendering
                $html .= <<<BODY
                    <div class="entry">
            <div class="entry-author">
                    {$body->AuthorName[0]} posted
            </div>
            <!--Content title -->
            <h3 class="entry-title"><a href="?id={$body->PostID[0]}">{$body->Title[0]}</a></h3>
                    <br/>	
            <div class="entry-datetime" id="datetime">
                    on <!--June 1st, 2013 when the clock told 12:00 PM-->{$body->CreateDate[0]}
            </div>
            <div class="entry-content alpha60">
                    <p>&nbsp;</p>
                    {$body->Data[0]}
            </div> 
BODY;
            //Trigger content created plugin here
            //$_REQUEST['id] must have been set, that is why we are here ;)
            if($body->Special[0]==1)
            {
                $_REQUEST['comments_disabled'] = 'yes';
            }
            plugin_trigger('content-block-created', $html);
            unset($_REQUEST['comments_disabled']);
            $html .='</div>';
            //Display Tab for next entry and previous entry.
                $html  .= $navigation;
}

$html .= '</div>
<!-- Content Part End -->

  <div class="footer" id="footer_wrapper">'.$footer.'</div>
</body>
</html>';

 
/*
 * Sticky:
 * Header:
 *      Title
 *      Tagline
 *      Logo
 *      Navbar
 *      Slideshow 
 */