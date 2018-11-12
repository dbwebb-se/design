Desinax Typographic Grid (LESS)
===============================

[![npm version](https://badge.fury.io/js/%40desinax%2Ftypographic-grid.svg)](https://badge.fury.io/js/%40desinax%2Ftypographic-grid)
[![Join the chat at https://gitter.im/desinax/typographic-grid](https://badges.gitter.im/desinax/typographic-grid.svg)](https://gitter.im/desinax/typographic-grid?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

[![Build Status](https://travis-ci.org/desinax/typographic-grid.svg?branch=master)](https://travis-ci.org/desinax/typographic-grid)
[![CircleCI](https://circleci.com/gh/desinax/typographic-grid.svg?style=svg)](https://circleci.com/gh/desinax/typographic-grid)

LESS module implementing a typographic grid. This is also knows as a horizontal grid, a baseline grid. These types of grid are used to create vertical rythm for the typography in a layout.

It can look like this when applying the typgraphy to a vertical grid.

![With showgrid](doc/img/showgrid.png)



Table of content
-------------------------------

* [Documentation online](#documentation-online)
* [Install](#install)
* [About the grid](#about-the-grid)
* [Customizing the grid](#customizing-the-grid)
* [Modify more](#modify-more)
* [About typography-font-families.less](#about-typography-font-familiesless)
* [License](#license)



Documentation online
-------------------------------

You can read this README and try out the example files `htdocs/*.html` by using GitHub Pages.

* [GitHub Pages README](https://desinax.github.io/typographic-grid/).
* [GitHub Pages examples in htdocs/](https://desinax.github.io/typographic-grid/htdocs).

Viewing this documentation on GitHub Pages makes it easier to both read this documentation and try out the examples on the same time.



Install
-------------------------------

You can install using npm to take advantage of version management. Semantic versioning is used to label the various versions.

```text
npm install @desinax/typographic-grid
```

Or clone this repo and use it as is.



About the grid
-------------------------------

The grid consists of two less-files, [`src/less/typography-font-families.less`](src/less/typography-font-families.less) and [`src/less/typography-defaults.less`](src/less/typography-defaults.less).

This is how you can import and activate the grid into your own theme.

```less
/**
 * Import the typographic grid.
 */
@import "src/less/typography-font-families.less";
@import "src/less/typography-defaults.less";
```

You have now imported the grid, the next step is to activate it.

The first thing is to set the base font for the body element.

```less
// Activate the grid base font
body {
    #desinax-hgrid.font(@fontSizeBody);
}
```

Next step is to activate all grid styles to the typographic elements, such as h1-h6, p, code, table and so on. You do this by calling another mixin.

```less
// Activate grid and affect all typographic elements
#desinax-hgrid.activateDefaultTypography();
```

The next step is to optionally enable the to show the grid. This is helpful when one want to check that the typpgraphy actually alines to the grid.

```less
// Show the grid
.hgrid .wrap {
    @gridImage: "../../img/magic-number-@{magicNumber}.png";
    #desinax-hgrid.showGrid(@gridImage);
}
```

Now you are done. An example showing how this can look like is in [`htdocs/typographic_default.html`](htdocs/typographic_default.html). The style used for the example is in [`src/less/test_typography_default.less`](src/less/test_typography_default.less).

This is how the example looks like.

![Defaults](doc/img/default.png)



Customizing the grid
-------------------------------

The idea behind the grid is to select a magic number which all typography should align vertically to.

You can also set the base for the fontsize used.

There are defaults which you can override.

```less
// Magic number and base fontsize
@magicNumber:  24px;  // 22px
@fontSizeBody: 16px;
```

You can review the example in [`htdocs/typographic_custom_24.html`](htdocs/typographic_custom_24.html) which show a slightly modified grid using fontsize 16px and a magic number of 24px. The style used for the example is in [`src/less/test_typography_custom_24.less`](src/less/test_typography_custom_24.less).

It looks like this.

![Custom 24](doc/img/custom_24.png)

There is another example with the magic number set to 22px. You can review it in [`htdocs/typographic_custom_22.html`](htdocs/typographic_custom_22.html). The style used for the example is in [`src/less/test_typography_custom_22.less`](src/less/test_typography_custom_22.less).

It looks like this.

![Custom 22](doc/img/custom_22.png)



Modify more
-------------------------------

The basic typography for the grid is in the file [`src/less/typography-defaults.less`](src/less/typography-defaults.less). It contains mixins that activate the grid, it contains basic settings for common typographic elements and it contains a set of variables that can be customized by you in your own theme.



About typography-font-families.less
-------------------------------

This file contains a set of font families stored in variables. You can review the file in [`src/less/typography-font-families.less`](src/less/typography-font-families.less).

Here is an extract from the file. You can use these variables when you customize what font families to use.

```less
// Monospace
@fontFamilyCourier:         "Courier New", Courier, monospace;

// Serif
@fontFamilyCambria:         Cambria, Georgia, Times, 'Times New Roman', serif;

// Sans-serif
@fontFamilyVerdana:         Verdana, Geneva, sans-serif;
```

In your own theme style you can then set the font families to use in the grid.

```less
// Set font family to use
@fontFamilyHeadings:  @fontFamilyCambria;
@fontFamilyBody:      @fontFamilyCalibri;
@fontFamilyCode:      @fontFamilyCourier;
```

The variables `@fontFamilyHeadings`, `@fontFamilyBody` and `@fontFamilyCode` are defined, together with a large set of other variables that can be customized, in the file [`src/less/typography-defaults.less`](src/less/typography-defaults.less).



License
-------------------------------

The license is MIT, review it in [LICENSE](LICENSE).



```
 . 
..:  Copyright (c) 2016-2018 Mikael Roos, mos@dbwebb.se 
```
