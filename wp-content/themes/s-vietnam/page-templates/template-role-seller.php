<?php
/**
 * Template Name: Seller Role
 *
 * @package WordPress
 * @subpackage PDJ
 * @since PDJ 1.0
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;


$admin_role = get_role( 'administrator' );
$contributor_role = get_role( 'contributor' );
$seller_role = get_role( 'seller' );
// print_r($admin_role);
// print_r($contributor_role);
// print_r($seller_role);

if ($context['post']->post_title) {
  $user_name = $context['user']->display_name;

  $context['post']->post_title = str_replace('%name%', '<span class="user-name">' . $user_name . '</span>', $context['post']->post_title);
}

if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'seller-add-hotel' ) {
  print_r($_POST);
}


Timber::render( 'template-role-seller.twig', $context );
