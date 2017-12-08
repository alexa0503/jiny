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
    $('#subItemsMenu>a').on('click', function(){
        if( $('#subItemsMenu ul').hasClass('hidden') ){
            $('#subItemsMenu ul').removeClass('hidden');
        }
        else{
            $('#subItemsMenu ul').addClass('hidden');
        }
        return false;
    })
});
