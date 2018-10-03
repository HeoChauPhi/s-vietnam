<?php

add_action( 'save_post', 'my_project_updated_send_email' );

//add_action( 'post_updated', 'check_values', 10, 3 ); //don't forget the last argument to allow all three arguments of the function