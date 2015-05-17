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
- [Theme Directory Layout](#theme-directory-structure)
- [Custom Theme Javascript or CSS](#custom-theme-javascript-or-css)
- [Removing or replacing Largo Javascript or CSS](#removing-or-replacing-largo-javascript-or-css)

## Theme Directory Structure

The layout of this sample theme is based on convention and best practices. What follows is a general outline of files and directories that loosely depend on each other as well as how we tend to use each directory to organize our code.

### `tests` and `phpunit.xml`

The [unit tests](/tests/readme.md) depend on a `phpunit.xml` file in the root of the theme. The `phpunit.xml` file references files within the `tests` directory.

### `less`, `css` and `Gruntfile.js`

The `Gruntfile.js` is configured to compile files within the `less` directory to corresponding files in the `css` directory.

### Override Largo template parts or add your own

To override a template part from Largo core, create a `partials` directory within the root of your theme and add a file to the directory with a filename matching that of the template part to be overridden.

This is standard [`get_template_part`](http://codex.wordpress.org/Function_Reference/get_template_part) functionality. The only difference is that Largo stores template parts in a `partials` directory.

You can also place your own template parts in the `partials` directory. It's a good idea to break large template files down into component part by creating these partial files. Doing so will make each template file easier to read and maintain.

### Where to put things

We try really hard to keep components logically separated. Here are some guidelines:

1. Javascript files should be placed in the `js` directory.
2. CSS files should be placed in the `css` directory.

    Note: if you're using grunt and less to generate your CSS, there's typically no reason to edit these files directly.

3. LESS files, should be placed in the `less` directory.

    If you add new file to the `less` directory, you'll want to update `Gruntfile.js` so that it knows about it:

        files: {
            'css/style.css': 'less/style.less',
            'homepages/assets/css/your_homepage.css': 'homepages/assets/less/your_homepage.less',
            'css/yournewfilename.css': 'less/yournewfilename.less'
        }
4. Theme images should be placed in the `img` directory.

5. Component parts of your theme should be kept in `inc`.

    These are generally not template files, but files containing functions or other business logic for your theme.

6. Templates should be kept in the root directory of the theme.

    For example, to override Largo's `home.php` template, create a file with the same name in the root of your theme directory.

7. Template parts should be kept in a `partials` subdirectory as described above.
8. Custom homepage layouts should be kept within the `homepages` subdirectory.
9. Documentation should be kept in the `docs` subdirectory.

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

If you want to completely remove and/or replace a Javascript or CSS file that is loaded by the Largo parent theme, you can deregister the default script and replace it with your own.

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
