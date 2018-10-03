/*jslint browser: true*/
/*global $, jQuery, Modernizr, enquire, audiojs*/

(function($) {
  $(document).ready(function() {
    // Call to function
    /*$('.image-select-multiple').on('change', function() {
    	var media_name = $(this).data('name');

      $.each(this.files, function(key, value){
      	console.log(value);
      	var fr = new FileReader();

      	fr.onload = function(e) {
          $('ul.media-sortable').append('<li class="media-item" name="' + media_name + '[]" style="background-image: url(' + e.target.result + ');" value="' + e.target.result + '"><span class="media-delete-icon fa fa-times-circle-o"></span></li>');

          $('.media-delete-icon').on('click', function() {
            $(this).parent().remove();
          });
        }
        fr.readAsDataURL(value);
      });
    });

    $( ".media-sortable" ).sortable();
    $( ".media-sortable" ).disableSelection();*/
  });

  $(window).load(function() {
    // Call to function
  });

  $(window).resize(function() {
    // Call to function
  });

})(jQuery);