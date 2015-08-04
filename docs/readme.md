# Starting New Largo Child Themes

When working with a WordPress theme like Largo, you never want to make edits to Largo directly, because it prevents you from receiving vital bug fixes and updates we release on a regular basis.

WordPress uses Child Themes -- a theme that inherits traits from a Parent Theme -- to allow any theme to be customized and still benefit from updates.

Child Themes inherit the directory structure and all the files from their Parent Theme. You can modify or turn off attributes inherited from the parent theme, and build custom functionality.

Largo is structured a specific way, and when you create a child theme it will be easiest for you to follow parallel structures as you modify and add.

#Table of Contents
* 1. Largo Child Theme Structure
* 2. Largo and WordPress Differences
* 3. Grunt Workflow
* 4. Override Largo Styles
* 5. Override Largo Functions
* 6. Development Guidelines
* 7. Other Resources

### 1. Largo Child Theme Structure
*A visual representation of the folder structure (grey lines) and key files. Orange lines indicate Grunt Workflow.*
![Visual Representation of Child Theme Structure](https://raw.githubusercontent.com/INN/Largo-Sample-Child-Theme/master/docs/structure.png)

# ```/css```

### ```child.css```
An unminified version of ```less/child.less``` processed into CSS. You need to create a blank file if one doesn't exist or the Grunt workflow won't work.

###```child.min.css```
Minified version of ```css/child.css`` used in production. You need to create a blank file if one doesn't exist or the Grunt workflow won't work.

## 2. Largo and WordPress Differences

In Largo, we handle a number of common WordPress functions and features such as bylines and homepages differently than most standard WordPress themes.

Often this is because we have improved on default functionality so that it's better suited for news publishing. Sometimes Largo differences are a result of it being a fork of the open source NPR Argo Project with numerous authors.

Here are some Largo Functions you'll want to know before getting started.
=======
![Visual Representation of Child Theme Structure](https://raw.githubusercontent.com/INN/Largo-Sample-Child-Theme/master/docs/structure.png)

# ```/less```

### ```variables.less```

### 1.1 - Variables
#### 1.1.1 - Colors
#### 1.1.2 - Fonts

### ```utilities.less```

### 1.2 - Utilities
#### 1.2.1 - Animation

### ```_global.less```

### 2.0 - Global Styles
#### 2.1 - Largo Parent Overrides
#### 2.2 - Link Styles
#### 2.3 - Image Styles
#### 2.4 - Button Styles
#### 2.5 - Sidebars
#### 2.6 - Widgets
##### 2.6.1 - Example Widget Definition
#### 2.7 - Misc

### ```_header.less```

### 3.0 - Header Styles
#### 3.1 - General Header Styles
#### 3.2 - Main Navigation Styles
#### 3.3 - Header Search

### ```_typography.less```

### 4.0 - Typography
#### 4.1 - Largo Parent Helvetica and Georgia Overrides
#### 4.2 - Body
#### 4.3 - Headings

### ```_single.less```

### 5.0 - Single
#### 5.1 - Single Template Spacing
#### 5.2 - Single Header
#### 5.3 - Single Body
#### 5.4 - Single Footer
#### 5.5 - Comments

### ```_archive.less```

### 6.0 Archive
#### 6.1 - Category and Date Archives
#### 6.2 - Series Archives
#### 6.3 - Author Archives

### ```_footer.less```

### 7.0 - Footer
=======================
#### 7.1 - Supplementary
#### 7.2 - Boilerplate

#### Sample Gruntfile

```
largo_time()
```
For posts published less than 24 hours ago, show "time ago" instead of date, otherwise just use get_the_date.

```
largo_byline()
```
Outputs a byline with author links, including for multiple authors. Best in place of the_author().

```
largo_post_social_links()
```
Social media, email and print buttons. Uses largoCore.js to handle services ([see source](https://github.com/INN/Largo/blob/master/js/largoCore.js#L210)). Set services and social link display settings in Theme Options.

```
largo_excerpt()
```
A much better default excerpt than WordPress' the_excerpt().

```
largo_trim_sentences()
```
A content-sensitive way to split sentences.

```
largo_comment()
```
A helper function for ```wp_list_comments()`` to output comments Largo-style.

Ex. ```wp_list_comments( array( 'callback' => 'largo_comment' ) )```

WordPress Feature | Largo Feature
------------- | -------------
Home pages as WordPress Pages and Templates | Homepages function to register multiple templates with zones.
Widgets | Largo comes with a number of widgets with more finite controls for how content is selected and shown.
Basic AJAX calls | largo_load_more_posts()

## 3. Grunt Workflow in OS X

We use Grunt to handle the processing of Largo LESS into CSS, and you can add onto the workflow with your own needs in [```Gruntfile.js```](https://github.com/INN/Largo-Sample-Child-Theme/blob/master/Gruntfile.js).

The first time you want to use your Grunt Workflow, you'll need to install dependencies. Once these are installed on your computer working with Grunt is pretty simple. Skip ahead if you have Node.js already installed.

#### Installing Node.js

1. We'll install Node using [Homebrew](http://brew.sh/).
2. Open Terminal and type ```brew node install```.

#### Running the Grunt Workflow

1. In the Terminal, change directory into your Child Theme
```
cd /path/to/your/wordpress/wp-content/themes/child-theme
```
2. Type ```npm install```
3. Run ``grunt watch``` to start seeing changes to LESS appear live in your development environment.
![Starting Grunt in a Child Theme](https://github.com/INN/Largo-Sample-Child-Theme/blob/master/docs/show-not-tell/starting-grunt.gif)
4. Watch the Terminal for errors as you save changes in LESS files. Grunt will tell you if it has successfully reprocessed and minified files.
![Grunt when files are changed](https://github.com/INN/Largo-Sample-Child-Theme/blob/master/docs/show-not-tell/grunt-at-work.gif)

### 4. Override Largo Style

When overriding default styles, it's important to identify the proper selector. Unless you're well versed with Largo, it's easiest to identify the source of style to override using a browser inspector tool. Battery issues aside, I prefer Google Chrome's Developer Tools.

1. Open Google Chrome and go to your child-themed website.
2. Find an element you'd like to change, like a headline color.
3. Right-click and ```Inspect Element```.
4. In the example below, the color is immediately available. You can test with a new color, and know the proper CSS selector to use in your file to overwrite.

![Opening the Google Chrome Inspector and changing value Animation](https://github.com/INN/Largo-Sample-Child-Theme/blob/master/docs/show-not-tell/inspect-and-change.gif)
5. However, what if the value we want to change like a font isn't showing up? You might need to click into the Compute tab in the inspector, find out where the Parent Theme definition is.

To override a font from a parent theme
![Opening the Google Chrome Inspector, compute and change Animation](https://github.com/INN/Largo-Sample-Child-Theme/blob/master/docs/show-not-tell/inspect-compute-change.gif)

In this case, we would target ```.stories h2.entry-title``` in our CSS.


### 5. Override Largo Template Parts and Add Custom Parts

To override a template part from Largo:

1. Create a ```/partials``` directory in your child theme.
2. Copy the partial over from Largo you plan to modify, preserving the filename.
3. Make your changes.

This uses the get_template_part WordPress function. The only difference is that Largo stores template parts in a partials directory.

As you build custom elements, you can and should store these theme parts in this directory.

### 6. Override Largo Custom Functions

To override a custom function from Largo (like the byline output):
1. Create a ```/inc``` directory in your child theme if one doesn't already exist.
2. Create a file given the same name as the file you're overwriting.
3. Paste the function you're overwriting.
3. Make your changes.

### 7. Development Guidelines
- **Don't move functions to a new location.** Overriding largo_byline() output? It should be in ```/inc/post-meta.php```, not ```functions.php```.
- **Don't Rebuild the Wheel**. Always modify and use existing functions instead of DIY. This saves clients money, us time and future us hassle.
- **Don't assume the plugin is there**. Wrap plugin-dependent functions with ```if(function_exists('function')){ plugin_dependent_function(); }``` to prevent missing plugins from breaking the site.

#### 8. Other Largo Child Theme Resources
- [Child Themes Checklist](https://github.com/INN/docs/blob/master/checklists/updating-child-themes.md) in INN/docs.
- [Largo Documentation --> For Developers](http://largo.readthedocs.org/developers/fordevelopers.html#overview) on readthedocs.org.
- [Largo Sample Child Theme](https://github.com/INN/Largo-Sample-Child-Theme) in INN/Largo-Sample-Child-Theme
