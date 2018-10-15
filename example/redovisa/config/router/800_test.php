<?php

use Anax\Route\Exception\ForbiddenException;
use Anax\Route\Exception\InternalErrorException;
use Anax\Route\Exception\NotFoundException;

/**
 * Routes to ease testing.
 */
return [
    // Path where to mount the routes, is added to each route path.
    "mount" => "test",

    // All routes in order
    "routes" => [
        [
            "info" => "Just say hi with a string.",
            "path" => "hi",
            "handler" => function () {
                return "Hi.";
            },
        ],
        [
            "info" => "Say No! with status code 500.",
            "path" => "no",
            "handler" => function () {
                return ["No!", 500];
            },
        ],
        [
            "info" => "Say Hi through JSON.",
            "path" => "json",
            "handler" => function () {
                return [["message" => "Hi JSON"]];
            },
        ],
        [
            "info" => "Sample controller.",
            "mount" => "controller",
            "handler" => "\Anax\Controller\SampleController",
        ],
        [
            "info" => "Sample controller app style.",
            "mount" => "appstyle",
            "handler" => "\Anax\Controller\SampleAppController",
        ],
        [
            "info" => "Throw standard exception.",
            "path" => "exception",
            "handler" => function () {
                throw new \Exception("Standard \Exception");
            },
        ],
        [
            "info" => "Try internal 403.",
            "path" => "403",
            "handler" => function () {
                throw new ForbiddenException("Detailed error message.");
            },
        ],
        [
            "info" => "Try internal 404.",
            "path" => "404",
            "handler" => function () {
                throw new NotFoundException("Detailed error message.");
            },
        ],
        [
            "info" => "Try internal 500.",
            "path" => "500",
            "handler" => function () {
                throw new InternalErrorException("Detailed error message.");
            },
        ],
    ]
];
