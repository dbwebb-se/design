<?php
/**
 * Flat file controller for reading markdown files from content/..
 */
return [
    "routes" => [
        [
            "info" => "Style chooser.",
            "mount" => "style",
            "handler" => "\Anax\StyleChooser\StyleChooserController",
        ],
    ]
];
