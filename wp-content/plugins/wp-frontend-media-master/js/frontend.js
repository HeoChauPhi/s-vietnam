(function($) {

$(document).ready( function() {

	// attach a click event (or whatever you want) to some element on your page
	$( '.wrapper-media' ).each(function() {
		var file_frame; // variable for the wp.media file_frame

		$(this).find('.frontend-media-button').on( 'click', function( event ) {
			event.preventDefault();
			var wrapper_list = $(this).prev('.frontend-media-list');
			var media_form_hidden = $(this).next('.frontend-media-hidden');
			var data_images = media_form_hidden.data('name');
			// if the file_frame has already been created, just reuse it

			if ( file_frame ) {
				file_frame.open();
				return;
			}

			file_frame = wp.media.frames.file_frame = wp.media({
				title: $( this ).data( 'uploader_title' ),
				button: {
					text: $( this ).data( 'uploader_button_text' ),
				},
				multiple: true // set this to true for multiple file selection
			});

			file_frame.on( 'select', function() {
				attachment = file_frame.state().get('selection').toJSON();

				// do something with the file here
				//$( '#frontend-button' ).hide();
				wrapper_list.empty();
				media_form_hidden.empty();
				$.each(attachment, function(key, value){
					wrapper_list.append('<li style="background-image: url('+value.url+');"></li>');
					media_form_hidden.append('<input type="hidden" name="'+data_images+'[]" value="'+value.url+'">');
				});

				//$( '#frontend-image' ).attr('src', attachment.url);
			});

			file_frame.open();
		});
	});
});

})(jQuery);