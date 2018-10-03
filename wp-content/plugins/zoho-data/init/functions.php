<?php
// Test function for filter hook callback
function add_string_to_title($title) {
  return 'heochaua - ' . $title;
}


function my_project_updated_send_email( $post_id ) {

  // If this is just a revision, don't send the email.
  if ( wp_is_post_revision( $post_id ) )
    return;

  $post_title = get_the_title( $post_id );
  $post_obj = Timber::get_posts($post_id);
  print_r($post_obj);
  //die();
}

function check_values($post_ID, $post_after, $post_before){
    echo 'Post ID:';
    print_r($post_ID);

    echo 'Post Object AFTER update:';
    print_r($post_after);

    echo 'Post Object BEFORE update:';
    print_r($post_before);

    //die();
}
