<?php
/*
 *  Author: Framework | @Framework
 *  URL: wordfly.com | @wordfly
 *  Custom functions, support, custom post types and more.
 */

/*ini_set('log_errors','On');
ini_set('display_errors','On');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);*/

// Theme setting
require_once('init/theme-init.php');
require_once('init/theme-shortcode.php');
require_once('init/options/option.php');

/* Custom for theme */
//echo get_stylesheet_directory_uri();

if(!is_admin()) {
  // Add scripts
  function ct_libs_scripts() {
    wp_register_script('lib-slick', get_stylesheet_directory_uri() . '/dist/js/libs/slick.js', array('jquery'), FALSE, '0.7.0', TRUE);
    wp_enqueue_script('lib-slick');

    wp_register_script('lib-matchHeight', get_stylesheet_directory_uri() . '/dist/js/libs/jquery.matchHeight-min.js', array('jquery'), FALSE, '0.7.0', TRUE);
    wp_enqueue_script('lib-matchHeight');

    wp_register_script('lib-fancybox', get_stylesheet_directory_uri() . '/dist/js/libs/jquery.fancybox.pack.js', array('jquery'),  FALSE, '2.1.5', TRUE);
    wp_enqueue_script('lib-fancybox');

    wp_register_script('script', get_stylesheet_directory_uri() . '/dist/js/script.js', FALSE, '1.0.0', TRUE);
    wp_localize_script( 'script', 'paginationAjax', array( 'ajaxurl' => admin_url('admin-ajax.php' )));
    wp_enqueue_script('script');
  }
  add_action('wp_print_scripts', 'ct_libs_scripts');

  // Add stylesheet
  function ct_styles() {
    $styles = get_stylesheet_directory_uri() . '/dist/css/styles.css';
    wp_register_style('theme-style', $styles, array(), '1.0', 'all');
    wp_enqueue_style('theme-style');
  }
  add_action('wp_enqueue_scripts', 'ct_styles');
}

// Add admin script
function ct_admin_scripts() {
  wp_register_script('lib-moment', get_stylesheet_directory_uri() . '/dist/js/admin-libs/moment.js', array('jquery'), '2.13.0');
  wp_enqueue_script('lib-moment');

  wp_register_script('lib-datetimepicker', get_stylesheet_directory_uri() . '/dist/js/admin-libs/bootstrap-datetimepicker.min.js', array('jquery'), '4.17.37');
  wp_enqueue_script('lib-datetimepicker');

  wp_register_script('admin-script', get_stylesheet_directory_uri() . '/dist/js/admin-script.js', array('jquery'), '1.0.0');
  wp_enqueue_script('admin-script');
}
add_action('admin_init', 'ct_admin_scripts');

// Add admin script
function ct_admin_styles() {
  wp_register_style('admin-style', get_stylesheet_directory_uri() . '/dist/css/admin.css', array(), '1.0', 'all');
  wp_enqueue_style('admin-style');
}
add_action('admin_init', 'ct_admin_styles');

/*
 *
 * Add custom post type
 *
 */
function s_vietnam_create_custom_post_types() {
  // Hotel
  register_post_type( 'hotel', array(
    'labels' => array(
      'name'               => _x( 'Hotels', 'post type general name', 's_vietnam_theme' ),
      'singular_name'      => _x( 'Hotel', 'post type singular name', 's_vietnam_theme' ),
      'menu_name'          => _x( 'Hotels', 'admin menu', 's_vietnam_theme' ),
      'name_admin_bar'     => _x( 'Hotel', 'add new on admin bar', 's_vietnam_theme' ),
      'add_new'            => _x( 'Add New', 'hotel', 's_vietnam_theme' ),
      'add_new_item'       => __( 'Add New Hotel', 's_vietnam_theme' ),
      'new_item'           => __( 'New Hotel', 's_vietnam_theme' ),
      'edit_item'          => __( 'Edit Hotel', 's_vietnam_theme' ),
      'view_item'          => __( 'View Hotel', 's_vietnam_theme' ),
      'all_items'          => __( 'All Hotels', 's_vietnam_theme' ),
      'search_items'       => __( 'Search Hotels', 's_vietnam_theme' ),
      'parent_item_colon'  => __( 'Parent Hotels:', 's_vietnam_theme' ),
      'not_found'          => __( 'No hotels found.', 's_vietnam_theme' ),
      'not_found_in_trash' => __( 'No hotels found in Trash.', 's_vietnam_theme' )
    ),
    'description'           => __( 'Description.', 's_vietnam_theme' ),
    'public'                => true,
    'publicly_queryable'    => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'query_var'             => true,
    'rewrite'               => array('slug' => 'hotel'),
    'has_archive'           => true,
    'hierarchical'          => false,
    'menu_position'         => 28,
    'supports'              => array( 'title', 'editor' ),
    'capabilities'          => array(
      // Meta capabilities

      'edit_post'               => "edit_hotel",
      'read_post'               => "read_hotel",
      'delete_post'             => "delete_hotel",

      'edit_posts'              => "edit_hotels",
      'edit_others_posts'       => "edit_others_hotels",
      'publish_posts'           => "publish_hotels",
      'read_private_posts'      => "read_private_hotels",

      // Primitive capabilities used within map_meta_cap():

      'read'                    => "read",
      'delete_posts'            => "delete_hotels",
      'delete_private_posts'    => "delete_private_hotels",
      'delete_published_posts'  => "delete_published_hotels",
      'delete_others_posts'     => "delete_others_hotels",
      'edit_private_posts'      => "edit_private_hotels",
      'edit_published_posts'    => "edit_published_hotels",
      'create_posts'            => "edit_hotels",
    ),
    // as pointed out by iEmanuele, adding map_meta_cap will map the meta correctly 
    'map_meta_cap' => true
  ));

  // Tour
  register_post_type( 'tour', array(
    'labels' => array(
      'name'               => _x( 'Tours', 'post type general name', 's_vietnam_theme' ),
      'singular_name'      => _x( 'Tour', 'post type singular name', 's_vietnam_theme' ),
      'menu_name'          => _x( 'Tours', 'admin menu', 's_vietnam_theme' ),
      'name_admin_bar'     => _x( 'Tour', 'add new on admin bar', 's_vietnam_theme' ),
      'add_new'            => _x( 'Add New', 'hotel', 's_vietnam_theme' ),
      'add_new_item'       => __( 'Add New Tour', 's_vietnam_theme' ),
      'new_item'           => __( 'New Tour', 's_vietnam_theme' ),
      'edit_item'          => __( 'Edit Tour', 's_vietnam_theme' ),
      'view_item'          => __( 'View Tour', 's_vietnam_theme' ),
      'all_items'          => __( 'All Tours', 's_vietnam_theme' ),
      'search_items'       => __( 'Search Tours', 's_vietnam_theme' ),
      'parent_item_colon'  => __( 'Parent Tours:', 's_vietnam_theme' ),
      'not_found'          => __( 'No tours found.', 's_vietnam_theme' ),
      'not_found_in_trash' => __( 'No tours found in Trash.', 's_vietnam_theme' )
    ),
    'description'           => __( 'Description.', 's_vietnam_theme' ),
    'public'                => true,
    'publicly_queryable'    => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'query_var'             => true,
    'rewrite'               => array('slug' => 'tour'),
    'has_archive'           => true,
    'hierarchical'          => false,
    'menu_position'         => 28,
    'supports'              => array( 'title', 'editor' ),
    'capabilities'          => array(
      // Meta capabilities

      'edit_post'               => "edit_tour",
      'read_post'               => "read_tour",
      'delete_post'             => "delete_tour",

      'edit_posts'              => "edit_tours",
      'edit_others_posts'       => "edit_others_tours",
      'publish_posts'           => "publish_tours",
      'read_private_posts'      => "read_private_tours",

      // Primitive capabilities used within map_meta_cap():

      'read'                    => "read",
      'delete_posts'            => "delete_tours",
      'delete_private_posts'    => "delete_private_tours",
      'delete_published_posts'  => "delete_published_tours",
      'delete_others_posts'     => "delete_others_tours",
      'edit_private_posts'      => "edit_private_tours",
      'edit_published_posts'    => "edit_published_tours",
      'create_posts'            => "edit_tours",
    ),
    // as pointed out by iEmanuele, adding map_meta_cap will map the meta correctly 
    'map_meta_cap' => true
  ));
}
add_action( 'init', 's_vietnam_create_custom_post_types' );

/*
 *
 * Custom Taxonomy
 *
 */
function s_vietnam_create_custom_taxonomy() {
  $labels_subsite = array(
    'name' => __('Subsite Taxonomies', 's_vietnam_theme'),
    'singular' => __('Subsite Taxonomy', 's_vietnam_theme'),
    'menu_name' => __('Subsite Taxonomy', 's_vietnam_theme')
  );
  $args_subsite = array(
    'labels'                     => $labels_subsite,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'show_in_quick_edit'         => false,
  );
  register_taxonomy('subsite_taxonomy', array('program'), $args_subsite);
}
//add_action( 'init', 's_vietnam_create_custom_taxonomy', 0 );

/*
 *
 * Custom Role Pẻmission
 *
 */
function s_vietnam_caps() {
  // gets the administrator role
  $roles = array('administrator', 'contributor', 'seller');

  foreach ($roles as $role_slug) {
    $role = get_role( $role_slug );

    $role->add_cap( 'create_hotel' );
    $role->add_cap( 'delete_hotel' );
    $role->add_cap( 'delete_published_hotel' );
    $role->add_cap( 'edit_hotel' );
    $role->add_cap( 'edit_published_hotel' );
    $role->add_cap( 'publish_hotel' );
  } 
}
//add_action( 'admin_init', 's_vietnam_caps');

/*
 *
 *
 * Custom for theme
 *
 */
// Remove Editor Field for Landing page
function s_vietnam_remove_editor() {
  remove_post_type_support('page', 'editor');
}
add_action('admin_init', 's_vietnam_remove_editor');

// Add google API Key
add_action('acf/init', function() {
  $theme_options = get_option('s_vietnam_board_settings');
  $google_api_key = $theme_options['s_vietnam_google_api_key'];
  acf_update_setting('google_api_key', $google_api_key);
});
