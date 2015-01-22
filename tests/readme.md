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