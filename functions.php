<?php
/*
 * Your theme's custom functions go here
 */
function register_custom_homepage_layout() {
	include_once __DIR__ . '/homepages/layouts/your_homepage_layout.php';
	register_homepage_layout('YourHomepageLayout');
}
add_action('init', 'register_custom_homepage_layout', 0);

function register_widget() {
	include_once __DIR__ . '/inc/widgets/your-simple-widget.php';
	register_widget('your_simple_widget');
}
add_action('widgets_init', 'register_widget', 1);

function enqueue_script() {
	$version = '0.1.0';
	wp_enqueue_script(
		'your_theme',
		get_stylesheet_directory() . '/js/your_theme.js',
		array('jquery'),
		$version,
		true
	);
}
add_action('wp_enqueue_scripts', 'enqueue_script');
