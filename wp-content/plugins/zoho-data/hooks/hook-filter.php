<?php

 
// Đưa hàm add_string_to_title vào hook filter the_title
add_filter('the_title', 'add_string_to_title', 10, 1);
