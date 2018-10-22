<?php
/**
 * Bootstrap the framework and handle the request and send the response.
 */

// Were are all the files?
define("ANAX_INSTALL_PATH", realpath(__DIR__ . "/.."));

// Set development/production environment and error reporting
require ANAX_INSTALL_PATH . "/config/commons.php";

// Get the autoloader by using composers version.
require ANAX_INSTALL_PATH . "/vendor/autoload.php";

// Add all framework services to $di
$di = new Anax\DI\DIFactoryConfig();
$di->loadServices(ANAX_INSTALL_PATH . "/config/di");

// Send the response that the router returns from the route handler
$di->get("response")->send(
    $di->get("router")->handle(
        $di->get("request")->getRoute(),
        $di->get("request")->getMethod()
    )
);
