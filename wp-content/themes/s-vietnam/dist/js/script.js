/*jslint browser: true*/
/*global $, jQuery, Modernizr, enquire, audiojs*/

(function($) {
  $(document).ready(function() {
    // Call to function
    $('.image-select-multiple').on('change', function() {
      for (var i = 0; i < this.files.length; i++) {
        var fr = new FileReader();
        fr.onload = function(e) {
          //$('#thumbs').append('<img src="' + e.target.result + '" width="50px" height="50px">')
          //console.log(e.target.result);
          $('ul.media-sortable').append('<li class="media-item" style="background-image: url(' + e.target.result + ');"><span class="media-delete-icon fa fa-times-circle-o"></span></li>');

          $('.media-delete-icon').on('click', function() {
            //alert('okokok');
            $(this).parent().remove();
          });
        }
        fr.readAsDataURL(this.files[i]);
      }
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