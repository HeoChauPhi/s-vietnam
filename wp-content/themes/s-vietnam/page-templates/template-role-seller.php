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

Timber::render( 'template-role-seller.twig', $context );
