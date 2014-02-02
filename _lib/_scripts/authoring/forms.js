$(document).ready( function ()
{  function get_sections()
    {
        var value = $("#content_type").val();
        $.ajax({
            type:"GET",
            url:"/core/authoring/get_sections.php",
            data: {type:value},
            dataType: 'html',
            target: "#sections",
            success: function(result){
                $("#sections").html(result);
            }
        });
    }
    $('.tabs').tabs();
    get_sections();
    $("#content_type").change(function() {
        get_sections();
    });
});

