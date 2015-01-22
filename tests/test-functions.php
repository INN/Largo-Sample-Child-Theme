<?php

class FunctionsTest extends WP_UnitTestCase {
	function test_your_theme_hello_world() {
		$value = your_theme_hello_world();
		$this->assertEquals("Hello World!", $value);
	}
}
