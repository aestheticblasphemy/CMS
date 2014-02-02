<script src="/_lib/_scripts/authoring/forms.js"></script>
<?php
$id=(int)$_REQUEST['id'];
//Load the post object
if($id > 0){ // check that page id exists
    $page=db_row("SELECT * FROM ab_admin_content_info WHERE admin_content_id=".$id.";");
    if($page!==false){
        //$page_vars=json_decode($page['vars'],true);
        $edit=true;
        }
 }
if(!isset($edit)){
    //$parent=isset($_REQUEST['parent'])?(int)$_REQUEST['parent']:0;
    $special=0;
    if(isset($_REQUEST['hidden']))
        $special+=2;
    $page=array(/*'parent'=>$parent,*/'admin_content_entry_type'=>'1','admin_content_data'=>'',
        'admin_content_title'=>'','admin_content_published_flag'=>0,'admin_content_summary'=>'',
        'admin_content_special'=>$special, 'admin_content_section_id'=>'');
    $page_vars=array();
    $id=0;
    $edit=false;

}
    //Get all the content types supported for this new entry.
    //If we are editing previous entry, we cannot modify it's entry type.
    $sql = "SELECT * FROM ab_admin_content_types ";
    /*if($edit==true)
    {
        $sql .= " WHERE admin_content_type_id=".$page['admin_content_entry_type'];
    }
     */
    $sql .= " ;";
    $types = db_all($sql);
// { if page is hidden from navigation, show a message saying that
if($page['admin_content_special']&2)
    echo '<em>NOTE: this page is currently hidden from the \
            front-end navigation. Use the "Advanced Options" to \
            un-hide it.</em>';
// }
// { generate list of custom tabs
$custom_tabs=array();
foreach($PLUGINS as $n=>$p)
{
    if(isset($p['user']['page_tab']))
    {
        $custom_tabs[$p['user']['page_tab']['name']]
        =$p['user']['page_tab']['function'];
    }
}
// }
echo '<form id="content_form" method="post">';
echo '<input type="hidden" name="id" value="',$id,'" />'
        ,'<div class="tabs"><ul>'
        ,'<li><a href="#tabs-common-details">Common Details</a></li>'
        ,'<li><a href="#tabs-advanced-options">Advanced Options</a></li>'
        ;
// add plugin tabs here
foreach($custom_tabs as $name=>$function)echo '<li><a href="#tabs-custom-',
        preg_replace('/[^a-z0-9A-Z]/','',$name),'">',htmlspecialchars($name),'</a></li>';

echo '</ul>';
// { Common Details
echo '<div id="tabs-common-details"><table style=“clear:right;width:100%;”><tr>';
// { name
//echo '<th width="5%">name</th><td width="23%"><input id="title" name="title"
//value="',htmlspecialchars($page['admin_content_title']),'" /></td>';
// }
// { title
echo '<th width="10%">Title</th><td width="23%"><input id="title" name="title"
value="',  htmlspecialchars_decode($page['admin_content_title'],ENT_QUOTES),'" /></td>';
// }
// { url

echo '<th colspan="2">';
if($edit){
$u='/'.str_replace(' ','-',$page['admin_content_title']);
echo '<a style="font-weight:bold;color:red" href="',$u
,'" target="_blank">VIEW PAGE</a>';
}
else echo '&nbsp;';
echo '</th>';
// }

echo '</tr><tr>';
// { type
//Pull the types from the database
echo '<th>Type</th><td><select name="type" id="content_type">';
foreach($types as $type)
{
    echo '<option value="'.$type['admin_content_type_id'].'"';
            if($type['admin_content_type_id']==$page['admin_content_entry_type'])
                echo ' selected ';
            echo   '>'.$type['admin_content_type_name'].'</option>';
}
// insert plugin page types here
echo '</select></td>';
// }
// { parent
echo '<th>Section</th><td><select name="sections" id="sections">';
/*if($page['admin_content_section_id']){
$parent=Page::getInstance($page['admin_content_section_id']);
echo '<option value="',$parent->id,'">'
,htmlspecialchars($parent->name),'</option>';
}
 *
 */
/*else */echo '<option value="0"> -- ','none',' -- </option>';
echo '</select>',"\n\n",'</td>';
// }
/*
 if(!isset($page['associated_date']) || !preg_match(
'/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',$page['associated_date']
) || $page['associated_date']=='0000-00-00')
    $page['associated_date']=date('Y-m-d');
*/
//echo '<th>Associated Date</th><td><input name="associated_date" class="date-human" value="',
//$page['associated_date'],'" /></td>';
//echo '</tr>';
// }
// { page-type-specific data
echo '<tr><th>Content</th><td colspan="3">';
//echo '<textarea name="body" rows="10">',
//htmlspecialchars($page['admin_content_data']),'</textarea>';
echo ckeditor('body', htmlspecialchars($page['admin_content_data'],ENT_QUOTES));
echo '</td></tr>';
// }
// { page-type-specific data
echo '<tr><th>Summary</th><td colspan="2">';
echo '<textarea name="summary" rows="2">',
htmlspecialchars($page['admin_content_summary'],ENT_QUOTES),'</textarea>';
echo '</td></tr>';
// }
echo '</table></div>';
// }

// { Advanced Options
echo '<div id="tabs-advanced-options">';
echo '<table><tr><td>';
// { metadata
echo '<h4>MetaData</h4><table>';
//echo '<tr><th>keywords</th><td>
//<input name="keywords"
//value="',htmlspecialchars($page['keywords']),'"
///></td></tr>';
echo '<tr><th>Tags</th><td>
<input name="tags"
value="',  htmlspecialchars($page['admin_content_summary'],ENT_QUOTES),'"
/></td></tr>';

// { template
// we'll add this in the next chapter
// }
echo '</table>';
// }
echo '</td><td>';
// { special
echo '<h4>Special</h4>';
$specials=array('Is Home Page',
'Does not appear in navigation');
for($i=0;$i<count($specials);++$i){
if($specials[$i]!=''){
echo '<input type="checkbox" name="special[',$i,']"';
if($page['admin_content_special']&pow(2,$i))echo ' checked="checked"';
echo ' />',$specials[$i],'<br />';
}
}
// }
// { other
/*
echo '<h4>Other</h4>';
echo '<table>';
// { order of sub-pages
echo '<tr><th>Order of sub-pages</th><td><select name="page_
vars[order_of_sub_pages]">';
$arr=array('as shown in admin menu','alphabetically',
'by associated date');
foreach($arr as $k=>$v){
echo '<option value="',$k,'"';
if(isset($page_vars['order_of_sub_pages']) &&
$page_vars['order_of_sub_pages']==$k)
echo ' selected="selected"';
echo '>',$v,'</option>';
}
echo '</select>';
echo '<select name="page_vars[order_of_sub_pages_dir]">
<option value="0">ascending (a-z, 0-9)</option>';
echo '<option value="1"';
if(isset($page_vars['order_of_sub_pages_dir']) &&
$page_vars['order_of_sub_pages_dir']=='1')
echo ' selected="selected"';
echo '>descending (z-a, 9-0)</option></select></td></tr>';
// }
echo '</table>';
// }
 */
echo '</td></tr></table></div>';
// }

// { tabs added by plugins
foreach($custom_tabs as $n=>$p)
{
    echo '<div id="tabs-custom-',preg_replace('/[^a-z0-9A-Z]/','',$n),'">',$p($page),'</div>';
}

echo '</div><input type="submit" name="action" value="',
($edit?'Update':'Insert')
,'" /></form>';
echo '<script>window.currentpageid='.$id.';</script>';
//echo '<script src="/_lib/_scripts/pages/pages.js"></script>';