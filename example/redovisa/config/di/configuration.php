<?php
/**
 * Configuration file to add as service in the Di container.
 */
return [

    // Services to add to the container.
    "services" => [
        "configuration" => [
            "shared" => true,
            "callback" => function () {
                $config = new \Anax\Configure\Configuration();
                $dirs = require ANAX_INSTALL_PATH . "/config/configuration.php";
                $config->setBaseDirectories($dirs);
                return $config;
            }
        ],
    ],
];
