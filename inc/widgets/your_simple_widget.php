<?php
/*
 * A simple example widget
 */
class your_simple_widget extends WP_Widget {

	function your_simple_widget() {
		$widget_ops = array(
			'classname' => 'your-simple-widget',
			'description' => __('Displays "Hello World!"', 'your_theme_domain')
		);
		$this->WP_Widget('your-simple-widget', __('Your Simple Widget', 'your_theme_domain'), $widget_ops);
	}

	function widget($args, $instance) {
		extract($args);

		$title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);

		echo $before_widget;
		if (!empty($title))
			echo $before_title . $title . $after_title;
		echo "<p>Hello World!</p>";
		echo $after_widget;
	}

}
