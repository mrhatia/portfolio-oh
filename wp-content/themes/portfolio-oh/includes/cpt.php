<?php
/**
 * Functions for custom post types
 *
 * @link https://developer.wordpress.org/themes/basics/post-types/
 *
 * @package Base Theme Package
 * @since 1.0.0
 */

use BaseTheme\CPT\WP_Theme_CPT;

new WP_Theme_CPT(
	array(
		'labels'       => array(
			'singular_capital'   => 'Testimonial',
			'plural_capital'     => 'Testimonials',
			'singular_lowercase' => 'testimonial',
			'plural_lowercase'   => 'testimonials',
			// CPT Slug & Name.
			'register_key'       => 'testimonial',
			'slug'               => 'testimonial',
		),
		'supports'     => array( 'title', 'thumbnail', 'author' ),
		'menu_icon'    => 'dashicons-format-quote',
		'public'       => false,
		'show_in_menu' => true,
		'show_ui'      => true,
	)
);
