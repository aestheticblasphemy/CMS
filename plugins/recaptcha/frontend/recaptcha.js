$('.form-element').click(function() {
        $('#captcha script').remove();
        
 //   $('.tabs').tabs({
 //       show:function(event,ui){
    // if the captcha is already here, return

        
    // move the captcha into this panel
        $('table tr:last').before($('#captcha'));
 //       }
 //   });
            });