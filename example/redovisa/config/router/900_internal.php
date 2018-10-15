<?php
/**
 * Internal routes that deal with error situations when pages are not found,
 * forbidden or internal error happens.
 */
return [
    "routes" => [
        [
            "info" => "Internal routes for error handling.",
            "internal" => true,
            "handler" => "\Anax\Controller\ErrorHandlerController",
        ],
    ]
];
