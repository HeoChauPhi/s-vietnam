(function($) {
  function browserDetectClose() {
    var expDate = new Date();

    var time_set = $('.custom-browser-detected').data('time-set');

    expDate.setTime(expDate.getTime() + (parseInt(time_set) * 1000));

    $.cookie('browser_detect_close', 1, { expires: expDate, path: '/' });
    $('.custom-browser-detected').slideToggle('fast');
  }

  $(document).ready(function() {
    // Call to function
    if ( $.cookie('browser_detect_close') == 1 ) {
      $('.custom-browser-detected').hide();
    } else {
      $('.custom-browser-detected').slideDown("slow");
    }
    $('.custom-browser-close').on('click', browserDetectClose);
  });

  $(window).load(function() {
    // Call to function
  });

  $(window).resize(function() {
    // Call to function
  });
})(jQuery);
