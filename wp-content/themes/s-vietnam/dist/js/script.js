/*jslint browser: true*/
/*global $, jQuery, Modernizr, enquire, audiojs*/

(function($) {
  $(document).ready(function() {
    // Call to function
    $('.image-select-multiple').on('change', function() {
    	var media_name = $(this).data('name');
      console.log(this.files);
      /*for (var i = 0; i < this.files.length; i++) {
        var fr = new FileReader();
        var media_index = [i][0];
        fr.onload = function(e) {
          console.log(e);
          $('ul.media-sortable').append('<li class="media-item" name="' + media_name + media_index + '" style="background-image: url(' + e.target.result + ');"><span class="media-delete-icon fa fa-times-circle-o"></span></li>');

          $('.media-delete-icon').on('click', function() {
            $(this).parent().remove();
          });
        }
        fr.readAsDataURL(this.files[i]);
      }*/

      $.each(this.files, function(key, value){
      	console.log(value);
      	var fr = new FileReader();

      	fr.onload = function(e) {
          $('ul.media-sortable').append('<li class="media-item" name="' + media_name + key + '" style="background-image: url(' + e.target.result + ');"><span class="media-delete-icon fa fa-times-circle-o"></span></li>');

          $('.media-delete-icon').on('click', function() {
            $(this).parent().remove();
          });
        }
        fr.readAsDataURL(value);
      });
    });

    $( ".media-sortable" ).sortable();
    $( ".media-sortable" ).disableSelection();
  });

  $(window).load(function() {
    // Call to function
  });

  $(window).resize(function() {
    // Call to function
  });

})(jQuery);