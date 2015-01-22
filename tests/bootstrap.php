<?php

$wp_tests_dir = getenv('WP_TESTS_DIR');
require_once $wp_tests_dir . '/includes/functions.php';

$basename = basename(dirname(__DIR__));

$GLOBALS['wp_tests_options'] = array(
	'stylesheet' => $basename
);

require $wp_tests_dir . '/includes/bootstrap.php';
