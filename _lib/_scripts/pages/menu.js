$(function(){
    $('#pages-wrapper').jstree({
 //       "dnd": {
//            "drop_finish" : function(data) {
 //               alert("drop"+data.r.attr("id") );
//            },
 //           "drag_check" : function (data) {
//		return { 
//			after : false, 
//			before : false, 
//			inside : true 
//		};
//            },
//            "drag_finish" : function (data) { 
//				alert("DRAG OK"); 
//                           }
//                    },
            "plugins" : [ "themes", "html_data", "dnd" ]
	})
        .bind("move_node.jstree", function (e, data) {
   //         $.each(data, function(key,element) {
   //           "node" : obj, 
   //           "parent" : new_par, 
   //           "position" : obj.index(), 
   //           "old_parent" : old_par, 
   //           "is_multi" : is_multi, 
   //           'old_instance' : old_ins, 
   //           'new_instance' : new_ins 
                $.ajax({
                    type:"Get",
                    url:"/core/sections/actions.php",
                    data:{id:data.node.attr("id"), parent:data.parent.attr("id"), action:"Move"},
                    dataType:'html',
                    target:"#pages-wrapper",
                    success: function(result){
                        $('#pages-wrapper').load('/core/sections.php #pages-wrapper');
                    }
                });
         //       $('#pages-wrapper').getJSON('/root/core/sections/actions.php?id='+
          //          data.node.attr("id")+'&parent='+data.parent.attr("id")+'&action=move');
               // });
 
        // data.rslt.o is a list of objects that were moved
        // Inspect data using your fav dev tools to see what the properties are
        });
}); 
     //   }
     //   callback:{
     //       onchange:function(node,jstree){
     //           document.location='sections.php?action=edit&id='+node.id.replace(/.*_/,'');
     //               },
     //       onmove:function(node){
     //           var p=$.jstree.focused().parent(node);
     //           var new_order=[],nodes=node.parentNode.childNodes;
     //           for(var i=0;i<nodes.length;++i)
     //               new_order.push(nodes[i].id.replace(/.*_/,''));
     //       $.getJSON('/root/core/sections/actions.php?id='+
     //               node.id.replace(/.*_/,'')+'&parent='+
     //               (p===-1?0:p[0].id.replace(/.*_/,'')));
     //       alert("moved");
    //                    }
    //                }
     //           }             
     //       );
//    var div=$('<div><i>right-click for options</i><br /><br /></div>');
//    $('<button>add main page</button>').click(pages_add_main_page).appendTo(div);
//    div.appendTo('#pages-wrapper');
//});
//function pages_add_main_page(){}
