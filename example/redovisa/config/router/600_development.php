<?php
/**
 * Routes to ease development and debugging.
 */
return [
    "routes" => [
        [
            "info" => "Development and debugging information.",
            "mount" => "dev",
            "handler" => "\Anax\Controller\DevelopmentController",
        ],
    ]
];
