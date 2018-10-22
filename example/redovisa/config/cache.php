<?php
/**
 * Config file for the Anax Cache module.
 */
return [
    // Use for styling the menu
    //"basePath" => ANAX_APP_PATH . "/cache",
    "basePath" => ANAX_INSTALL_PATH . "/cache/anax",

    // Default time to live until item expires
    "timeToLive" => 7 * 24 * 60 * 60,
];
