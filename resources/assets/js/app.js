$().ready(function(){
    $('#items-button').on('click',function(){
        if( $('#items-menu').hasClass('hidden') ){
            $('#items-menu').removeClass('hidden');
        }
        else{
            $('#items-menu').addClass('hidden');
        }
        return false;
    })
});
