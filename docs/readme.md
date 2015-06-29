# Starting New Largo Child Themes

When working with a WordPress theme like Largo, you never want to make edits to Largo directly, because it prevents you from receiving vital bug fixes and updates we release on a regular basis.

WordPress uses Child Themes -- a theme that inherits traits from a Parent Theme -- to allow any theme to be customized and still benefit from updates.

Child Themes inherit all directory structure and files from their Parent Theme. The Parent Theme functions, structure, style and scripts are all inherited. In the Child Themes you can modify or turn off styles inherited from the parent theme, and build custom functionality.

Largo is structured a specific way, and when you create a child theme it will be easiest for you to follow parallel structures as you modify and add.

### Largo Child Theme Structure

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


# ```/css```

### ```style.css```
An unminified version of ```less/style.less``` processed into CSS. You might need to create a blank file first time around.
###```style.min.css```
Minified version of ```css/style.css`` used in production. You might need to create a blank file first time around.

#### Sample Gruntfile

Look at ```Gruntfile.js``` [here](https://github.com/INN/Largo-Sample-Child-Theme/blob/master/Gruntfile.js) in the Largo Sample Child Theme.

### Override Largo Style



###Override Largo Template Parts and Add Custom Parts

To override a template part from Largo:
1. Create a ```/partials``` directory in your child theme.
2. Copy the partial over from Largo you plan to modify, preserving the filename.
3. Make your changes.

This uses the get_template_part WordPress function. The only difference is that Largo stores template parts in a partials directory.

As you build custom elements, you can and should store these theme parts in this directory.

###Override Largo Custom Functions

To override a custom function from Largo (like the byline output):
1. Create a ```/inc``` directory in your child theme.
2. Copy the file containing the custom function over from Largo you plan to modify, preserving the filename.
3. Make your changes.

#### Development Guidelines
- **Don't move functions to a new location.** Overriding largo_byline() output? It should be in ```/inc/post-meta.php```, not ```functions.php```.
- **Don't Rebuild the Wheel**. Always modify and use existing functions instead of DIY. This saves clients money, us time and future us hassle.
- **Don't assume the plugin is there**. Wrap plugin-dependent functions with ```if(function_exists('function')){ plugin_dependent_function(); }``` to prevent missing plugins from breaking the site.

#### Other Largo Child Theme Resources
- [Child Themes Checklist](https://github.com/INN/docs/blob/master/checklists/updating-child-themes.md) in INN/docs.
- [Largo Documentation --> For Developers](http://largo.readthedocs.org/developers/fordevelopers.html#overview) on readthedocs.org.
- [Largo Sample Child Theme](https://github.com/INN/Largo-Sample-Child-Theme) in INN/Largo-Sample-Child-Theme
