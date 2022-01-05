

$(document).ready(function(){  
    $('.eye-icon').click(function(e){
         e.preventDefault();
            if($(this).prev().attr('type')== 'password'){
                $(this).prev().attr('type','text');
                $(this).find('#pw-close').hide();
                $(this).find('#pw-open').show();
            }
            else{
                $(this).prev().attr('type','password');
                $(this).find('#pw-close').show();
                $(this).find('#pw-open').hide();
            }        
    });

});



