$(function(){
$('.tabs').tabs();
$('#pages_form select[name=parent]').remoteselectoptions({
url:'/core/authoring/get_sections.php',
other_GET_params:currentpageid
});
});