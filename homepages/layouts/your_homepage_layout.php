<?php

include_once get_template_directory() . '/homepages/homepage-class.php';

class YourHomepageLayout extends Homepage {
	function __construct($options=array()) {
		$defaults = array(
			'name' => __('Your Homepage Layout', 'largo'),
			'description' => __('An example homepage layout', 'your_theme_domain'),
			'template' => get_stylesheet_directory() . '/homepages/templates/your_homepage_template.php',
			'assets' => array(
				array(
					'your_homepage_css',
					get_stylesheet_directory_uri() . '/homepages/assets/css/your_homepage.min.css',
					array()
				),
				array(
					'your_homepage_js',
					get_stylesheet_directory_uri() . '/homepages/assets/js/your_homepage.js',
					array('jquery')
				)
			),
		);
		$options = array_merge($defaults, $options);
		parent::__construct($options);
	}

	function content() {
		return "Hello World!";
	}
}
