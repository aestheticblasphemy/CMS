<?php

/*
 * This class contains the various methods and variables that are conventionally 
 * residing in the header bar of the site. 
 * In our case, this will include the following:
 * Site Title: title of Website/Page
 * Site Tagline: tagline associated with the page if any
 * Site Logo: Any graphic logo if any
 * Main Navigation Bar: Navigation Bar
 * Slideshow elements: Optional
 * 
 * Scope: The functions here will not render the data. That is the work of the 
 * theme. Here, we will just provide elements that must be rendered.
 */
class header {
    public $title;
    public $tagline;
    public $logo;
    public $navbar= array();
    public $slideshow = array();
    public $site_url;
    private $sections = array();
    
    //constructor
    function header()
    {
        //The moment the header class is initialized, it must populate the 
        //object properties with their respective attributes.
        global $SITEGLOBALS;
        if(isset($SITEGLOBALS['site_title']))
        {
            $this->title = $SITEGLOBALS['site_title'];
        }
        else
        {
            $this->title = "";
        }
        if(isset($SITEGLOBALS['site_tagline']))
        {
            $this->tagline = $SITEGLOBALS['site_tagline'];
        }
                else
        {
            $this->tagline = "";
        }
        if(isset($SITEGLOBALS['site_logo']))
        {
            $this->logo = $SITEGLOBALS['site_logo'];
        }
                else
        {
            $this->logo = "";
        }
        $this->site_url = $SITEGLOBALS['site_url'];
        $this->navbar = $this->load_nav_bar();
        $this->slideshow = $this->load_slideshow();
    }
    
    
    private function load_sections($id,$sections, $recurse=0)
    {
        if(!isset($sections[$id]))
            return;
        if($recurse != 0)
            $nav_element = '<ul>';
        else
            $nav_element = "";
        
        $recurse++;
        
        foreach($sections[$id] as $section){
            $nav_element .= '<li id="'.$section['admin_section_id'].'">'
                 .'<a href="'.$section['admin_section_url'].'">'
                 ./*'<ins>&nbsp;</ins>'.*/htmlspecialchars($section['admin_section_name'])
                 .'</a>';
            $nav_element .= $this->load_sections($section['admin_section_id'],$sections, $recurse);
            $nav_element .= '</li>';
            }
        if($recurse != 0)       
            $nav_element .= '</ul>';
        
        return $nav_element;
    }

    private function load_nav_bar()
    {
        $navbar = <<<NAVBAR
                <ul class="navigation">
               <li id="home"><a href="/site/">Home</a></li>
NAVBAR;
    $results = db_all("SELECT * FROM ab_admin_sections 
        ORDER BY admin_section_parent_id,admin_section_id ;", 'admin_section_id');

        foreach($results as $sec){
            if((!isset($sec['admin_section_parent_id'])))
            {
                if(!isset($this->sections[0])) 
                    $this->sections[0]=array();//The only case where we'll not have a parent in list 
                ////is root elements
                //$pages[$r['parent']]=array();
                $this->sections[0][]=$sec;
            }
            else
                $this->sections[$sec['admin_section_parent_id']][]=$sec;
        }
        $navbar .= $this->load_sections(0,$this->sections);
        $script = <<<SCRIPT
                </ul>
                <script type="text/javascript">
                       $('.navigation').jqsimplemenu();
                </script>
SCRIPT;
        $navbar .=$script;

        return $navbar;
    }
    
    private function load_slideshow()
    {
        $slideshow = '<img class="slides" id="slide0" src="/_img/Testing/2_1.jpg" class="slider_img" />
                    <img class="slides" id="slide1" src="/_img/Testing/2_2_.jpg" class="slider_img" />
                    <img class="slides" id="slide2" src="/_img/Testing/2_3.jpg" class="slider_img" />
                    <img class="slides" id="slide3" src="/_img/Testing/2_4.jpg" class="slider_img" />';
        
        return $slideshow;
    }
    
    private function get_children_list($sectionID, &$list)
    {
        $results = db_all("SELECT * FROM ab_admin_sections 
        WHERE admin_section_parent_id="
                .$sectionID.";");
        if(count($results)== 0)
        {
            return;
        }
        foreach($results as $section)
        {
            $list[]=$section['admin_section_id'];
            $this->get_children_list($section['admin_section_id'], $list);
        }
    }
    
    public function get_section_children($sectionID=0)
    {
        $list = array();
        $list[] = $sectionID;
        $this->get_children_list($sectionID, $list);        
        //$this->get_children_list($sectionID, $this->sections, $list);
        return $list;
    }

}
