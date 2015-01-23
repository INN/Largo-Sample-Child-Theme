# Unit Tests and Continuous Integration

Read our blog posts on unit testing WordPress themes and plugins on the [INN Nerds Blog](http://nerds.investigativenewsnetwork.org/):

- [Unit Testing Themes and Plugins in WordPress](http://nerds.investigativenewsnetwork.org/2014/10/22/unit-testing-themes-and-plugins-in-wordpress/)
- [Writing Stupid Simple Unit Tests](http://nerds.investigativenewsnetwork.org/2014/12/23/writing-stupid-simple-unit-tests/)

We use a set of [deploy tools](http://github.com/INN/deploy-tools) to make theme development and unit testing easier. Read about how our deploy tools make running WordPress theme and plugin unit tests super simple [here](http://nerds.investigativenewsnetwork.org/2014/11/25/updates-to-inns-deploy-tools/).

## The Basic Set Up

The `tests` directory contains three files including this `readme.md`, `boostrap.php` and `test-functions.php`.

The `bootstrap.php` file is used to load the WordPress testing framework and set up your environment for testing. In this case, the `bootstrap.php` file makes sure the child theme is set as the active theme.

The `test-functions.php` file contains an example test for a function included in `functions.php` plus test stubs for functions that we've yet to write tests for.

We try our best to have the `tests` directory mirror the structure of the theme directory. That is, if we have an `inc/widgets.php` file, we'll also have a `tests/inc/test-widgets.php` file.

## Obstacles

We also try our best to test each function contained within each file. In some cases a lack of time, limitations of the WordPress testing framework or some other unforeseen obstacle means we can only include an incomplete test for a function.

An example of an incomplete test:

	function test_register_custom_homepage_layout() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

This is especially true for functions that print or return markup, modify pages via WordPress' action hooks or require global variables that are only present and configured in certain contexts.

All that said, writing tests has proven worthwhile for us. We're dedicated to testing our code as best we can. Please join us!

## Continuous Integration

This sample theme includes a `.travis.yml` file so that you can set up your theme unit tests to be run automatically by [Travis CI](htttp://travis-ci.org/) each time you push changes to your repository.

The included `.travis.yml` will run your tests using WordPress version 4.0.1 and PHP version 5.3. These settings can be changed to your liking. Learn more about Travis CI's [PHP configuration options here](http://docs.travis-ci.com/user/languages/php/).

## Running Tests Without Deploy Tools

1. Checkout the WordPress using SVN:

        > export WP_VERSION="4.0.1"
        > export WP_CORE_DIR=/tmp/wordpress
        > export WP_TESTS_DIR=/tmp/wordpress/tests/phpunit
        > svn co --quiet http://develop.svn.wordpress.org/tags/$WP_VERSION $WP_CORE_DIR

2. Place a copy of your theme in the copy of WordPress you just checked out:

        > cp -R your_theme "$WP_CORE_DIR/src/wp-content/themes/your_theme"

3. You'll also need Largo installed in the copy of WordPress you just checked out:

        > git clone git@github.com:INN/Largo.git "$WP_CORE_DIR/src/wp-content/themes/largo"

3. Create a test database:

    Modify these to meet your needs:

        > export DB_USER=root
        > export DB_PASSWORD=password

    Then run:

        > mysql -e "CREATE DATABASE wordpress_tests;" -u $DB_USER -p$DB_PASSWORD

4. Copy the `wp-tests-config-sample.php` file and editing it:

        > cd $WP_CORE_DIR
        > cp wp-tests-config-sample.php wp-tests-config.php
        > sed -i "s:dirname( __FILE__ ) . '/src/':'$WP_CORE_DIR/src/':" wp-tests-config.php
        > sed -i "s/youremptytestdbnamehere/wordpress_tests/" wp-tests-config.php
        > sed -i "s/yourusernamehere/$DB_USER/" wp-tests-config.php
        > sed -i "s/yourpasswordhere/$DB_PASSWORD/" wp-tests-config.php

5. Move your `wp-tests-config.php` file to the test directory:

        > mv wp-tests-config.php "$WP_TESTS_DIR/wp-tests-config.php"

6. Change directories to the copy of your theme and run `phpunit`

        > cd "$WP_CORE_DIR/src/wp-content/themes/your_theme"
        > phpunit
        Installing...
        Running as single site... To run multisite, use -c tests/phpunit/multisite.xml
        Not running ajax tests... To execute these, use --group ajax.
        PHPUnit 4.3.4 by Sebastian Bergmann.

        Configuration read from /private/tmp/wordpress/src/wp-content/themes/your_theme/phpunit.xml

        .III

        Time: 1 second, Memory: 22.75Mb

        OK, but incomplete, skipped, or risky tests!
        Tests: 4, Assertions: 1, Incomplete: 3.
