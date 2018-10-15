<?php
/**
 * Configuration file for view container.
 */
return [
    // Paths to look for views, without ending slash.
    "paths" => [
        //ANAX_APP_PATH . "/view",
        ANAX_INSTALL_PATH . "/view",
        ANAX_INSTALL_PATH . "/vendor/anax/view/view",
    ],

    // File suffix for template files
    //"suffix" => ".tpl.php",
    "suffix" => ".php",
];
