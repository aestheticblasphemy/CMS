function post_comments_build_links(){
    var stat=this.className;
    if(!stat)
        return;
    var id=this.id.replace('post-comments-tr-','');
    var html='<a href="javascript:post_comments_'+
            ((stat=='active')?'deactivate('+id+');">deactivate':'activate('+id+');">activate'
            )+'</a>&nbsp;|&nbsp;<a href="javascript:'+'post_comments_delete('+id+');">delete</a>';
$(this).find('td:last-child').html(html);
}

$(function(){
$('#post-comments-table tr')
.each(post_comments_build_links);
});

function post_comments_activate(id){
    $.get('/plugins/comments/admin/activate.php'+'?id='+id, function(){
    var el=document.getElementById('post-comments-tr-'+id);
    el.className='active';
    $(el).each(post_comments_build_links);
    });
}
function post_comments_deactivate(id){
    $.get('/plugins/comments/admin/deactivate.php'
    +'?id='+id,function(){
    var el=document.getElementById('post-comments-tr-'+id);
    el.className='inactive';
    $(el).each(post_comments_build_links);
    });
}
function post_comments_delete(id){
    $.get('/plugins/comments/admin/delete.php'
    +'?id='+id,function(){
    $('#post-comments-tr-'+id).fadeOut(500,function(){
    $(this).remove();
    });
    });
}
