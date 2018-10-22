<?php
/**
 * Config-file for file based page content.
 */
return [
    // Use for styling the menu
    //"basePath" => ANAX_APP_PATH . "/content",
    "basePath" => ANAX_INSTALL_PATH . "/content",

    // Use or ignore using the cache, default is false.
    // During development it might be good to ignore the cache, but not
    // for production.
    "ignoreCache" => true,

    // Default options for textfilter to parse frontmatter, step one
    "textfilter-frontmatter" => [
        // "jsonfrontmatter",
        // "yamlfrontmatter",
        "frontmatter",
    ],

    // Additional filters to get title
    "textfilter-title" => [
        "markdown",
        "titlefromheader",
    ],

    // Default options for textfilter to parse second step
    // Might update frontmatter
    "textfilter" => [
        "shortcode",
        "markdown",
        "titlefromheader",
        "anchor4Header",
    ],

    // Default template
    "template" => "anax/v2/article/default",

    // Wrapper for section of revision history
    "revision-history" => [
        "start" => "\n\n\n" . t("Revision history") . " {#revision}\n-------------\n\n<span class=\"revision-history\">\n",
        "end"   => "</span>\n",
        "class" => "revision-history",
    ],

    // Filter to load content
    "pattern"   => "*.md",
    "meta"      => ".meta.md",
    "author"    => "#author/([^\.]+)#",
    "category"  => "#kategori/([^\.]+)#",
    "pagination" => "sida",
];
