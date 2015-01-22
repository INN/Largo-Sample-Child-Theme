# Largo Sample Child Theme

An example WordPress child theme based on the Largo parent theme (http://github.com/inn/largo)
* * *
## WARNING

We are still working on this so right now it just gives you an example of our preferred directory structure for a child theme (mirroring what we do in the Largo parent theme). 

Soon, it will contain a readme in each folder explaining what goes where, how to modify the behavior/look/feel of Largo and other helpful tips and examples.

If you have specific questions or requests for docs, please open an issue so make sure to address them.

* * *

## Table of contents

- [Unit Tests and Continuous Integration](/tests/readme.md)
- [Stylesheets (LESS and CSS)](/less/readme.md)
- [Custom Theme Javascript and CSS](#custom-theme-javascript-and-css)
- [Removing or replacing Largo Javascript or CSS](#removing-or-replacing-largo-javascript-or-css)


## Customize Theme Javascript or CSS

Adding your [custom javascript](http://codex.wordpress.org/Function_Reference/wp_enqueue_script) or [CSS](http://codex.wordpress.org/Function_Reference/wp_enqueue_style) to your theme works just the same as with any other WordPress theme.

For example (from `functions.php`):

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
    
The process for CSS is similar. See the [`wp_enqueue_style`](http://codex.wordpress.org/Function_Reference/wp_enqueue_style) documentation for more info.

### Removing or replacing Largo Javascript or CSS

If you want to modify a core part of Largo, you can deregister the default script and replace it with your own.

For example:

	function replace_largoCore() {
		$version = '0.1.0';
		wp_dequeue_script('largoCore');
		wp_register_script(
			'largoCore',
			get_stylesheet_directory() . '/js/your_largoCore.js',
			array('jquery'),
			$version,
			true
		);
	}
	add_action('wp_enqueue_scripts', 'replace_largoCore')
	
See the documentation for [`wp_dequeue_script`](http://codex.wordpress.org/Function_Reference/wp_dequeue_script) and [`wp_dequeue_style`](http://codex.wordpress.org/Function_Reference/wp_dequeue_style).