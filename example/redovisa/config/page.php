<?php
/**
 * Configuration file for page which can create and put together web pages
 * from a collection of views. Through configuration you can add the
 * standard parts of the page, such as header, navbar, footer, stylesheets,
 * javascripts and more.
 */
return [
    // This layout view is the base for rendering the page, it decides on where
    // all the other views are rendered.
    "layout" => [
        "template" => "anax/v2/layout/default",
        "region" => "layout",
        "sort" => null,
        "data" => [
            "baseTitle" => " | design",
            "favicon" => "favicon.ico",
            "stylesheets" => [
                "css/style.css",
            ],
            "javascripts" => [
                "js/main.js",
            ],
        ],
    ],

    // These views are always loaded into the collection of views.
    "views" => [
        [
            "template" => "anax/v2/header/default",
            "region" => "header",
            "sort" => -1,
            "data" => null,
        ],
        [
            "template" => "anax/v2/navbar/default",
            "region" => "navbar",
            "sort" => -1,
            "data" => [
                "navbar" => require __DIR__ . "/navbar.php",
            ],
        ],
        [
            "template" => "anax/v2/footer/default",
            "region" => "footer",
            "sort" => -1,
            "data" => null,
        ],
    ],
];
