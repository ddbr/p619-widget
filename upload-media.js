jQuery( document ).ready( function( $ ) {

  // Uploading files
  var file_frame;
  var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
  var input_id_element;

  $(document).on("click", ".upload_image_button", function() {
    var input_id_element = jQuery( this ).prev() // Set this
    alert( input_id_element.val() );
    // If the media frame already exists, reopen it.
    if ( file_frame ) {
      // Set the post ID to what we want
      file_frame.uploader.uploader.param( 'post_id', input_id_element.val() );
      // Open frame
      file_frame.open();
      return;
    } else {
      // Set the wp.media post id so the uploader grabs the ID we want when initialised
      wp.media.model.settings.post.id = input_id_element.val();
    }

    // Create the media frame.
    file_frame = wp.media.frames.file_frame = wp.media
      title: 'Select a image',
      button: {
        text: 'Use this image',
      },
      multiple: false,
    });

    // When an image is selected, run a callback.
    file_frame.on( 'select', function() {
      // We set multiple to false so only get one image from the uploader
      attachment = file_frame.state().get('selection').first().toJSON();

      // Do something with attachment.id and/or attachment.url here
      //$( '#image-preview' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
      input_id_element.val( attachment.id );

      // Restore the main post ID
      wp.media.model.settings.post.id = wp_media_post_id;
    });

    file_frame.on('open',function() {
      var selection = frame.state().get('selection');
      ids = input_id_element.val().split(',');
      ids.forEach(function(id) {
        attachment = wp.media.attachment(id);
        attachment.fetch();
        selection.add( attachment ? [ attachment ] : [] );
      });
    });

      // Finally, open the modal
      file_frame.open();
  });



  // Restore the main ID when the add media button is pressed
  jQuery( 'a.add_media' ).on( 'click', function() {
    wp.media.model.settings.post.id = wp_media_post_id;
  });
});
