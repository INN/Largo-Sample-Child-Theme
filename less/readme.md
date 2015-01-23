## Stylesheets (LESS and CSS)

If you're familiar with and want to use LESS, this theme is set up to make it easy to do so out of the box.

Every [WordPress theme requires a `style.css`](http://codex.wordpress.org/Theme_Development#Theme_Stylesheet) file. The comment/header at the top of `style.css` provides details about the theme.

For child themes, it is important that the `Template` line of the header block match the name of the folder that contains the parent theme it is based on.

Aside from the required header, the only other function the `style.css` file in this theme serves is to import the `css/style.css` file.

The `css/style.css` file is set up to be compiled from `less/style.less`.


### Using Grunt

Our team likes to use [Grunt](http://gruntjs.com/) to compile the theme's LESS files to CSS. You can also have Grunt watch your LESS files and recompile your CSS files as changes are made.

Grunt uses the `package.json` and `Gruntfile.js` included with the theme.

To get started:

#### 1. Install [Node.js](http://nodejs.org/)

If you're using OS X, open a terminal window and type:

    > brew install node

#### 2. Install [Grunt](http://gruntjs.com/getting-started)

    > npm install -g grunt-cli

#### 3. Edit `package.json`, changing the `name` attribute to suit you.

    {
      "name": "your-theme-name",
      ...

#### 4. Install dependencies

    > npm install

#### 5. Run `grunt less` to compile your LESS files

    > grunt less
    Running "less:development" (less) task
    File css/style.css created: 0 B → 40 B
    File homepages/assets/css/your_homepage.css created: 0 B → 51 B

### Watching your `style.less` file for changes

While you're developing your theme, it can be helpful to have your `css/style.css` file recompiled anytime there is a change made to `less/style.less`.

To have Grunt watch your `less/style.less` file for changes:

    > grunt watch
    Running "watch" task
    Waiting...
