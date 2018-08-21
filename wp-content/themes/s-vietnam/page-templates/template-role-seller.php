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
//print_r($admin_role);
print_r($contributor_role);
print_r($seller_role);

Timber::render( 'template-role-seller.twig', $context );
