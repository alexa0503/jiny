(function( $ ){

  $.fn.filemanager = function(type, options) {
    type = type || 'file';

    this.on('click', function(e) {
      var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
      var multiple = (options && options.multiple) ? options.multiple : false;
      localStorage.setItem('target_input', $(this).data('input'));
      localStorage.setItem('target_preview', $(this).data('preview'));
      window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');
      window.SetUrl = function (url, file_path) {
           var target_input = $('#' + localStorage.getItem('target_input'));
           var target_preview = $('#' + localStorage.getItem('target_preview'));
          if( multiple == false ){
              //set the value of the desired input to image url
              target_input.val(file_path).trigger('change');
              //set or change the preview image src
              //target_preview.attr('src', url).trigger('change');
              target_preview.html('<div style="position:relative;"><img src="'+url+'" /></div>').trigger('change');
          }
          else{
              var v = target_input.val();
              if( v != ''){
                  v = v+','+file_path;
              }
              else{
                  v = file_path;
              }
              target_input.val(v).trigger('change');
              var _obj = target_preview.append('<div data-path="'+file_path+'" style="position:relative;display:inline-table;" ><img src="'+url+'" /><div class="close"><i class="glyphicon glyphicon-remove"></i></div></div>');
              _obj.trigger('change');
              _obj.find('.close').on('click', function(){
                  var _f = $(this).parent('div').data('path');
                  v = v.replace(_f,'');
                  v = v.replace(/,+/g,',');
                  v = v.replace(/^,/,'');
                  v = v.replace(/,$/,'');

                  target_input.val(v).trigger('change');
                  $(this).parent('div').remove();
                  //alert(1);
              })
          }
      };
      return false;
    });
  }

})(jQuery);
