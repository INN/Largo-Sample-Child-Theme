<?php

class FunctionsTest extends WP_UnitTestCase {
	function test_your_theme_hello_world() {
		$value = your_theme_hello_world();
		$this->assertEquals("Hello World!", $value);
	}

	function test_register_custom_homepage_layout() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	function test_register_widget() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	function test_enqueue_script() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}
}
