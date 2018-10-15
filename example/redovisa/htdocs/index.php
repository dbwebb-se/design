<?php
/**
 * Bootstrap the framework and handle the request.
 */

// Were are all the files?
define("ANAX_INSTALL_PATH", realpath(__DIR__ . "/.."));
//define("ANAX_APP_PATH", ANAX_INSTALL_PATH);

// Set development/production environment and error reporting
require ANAX_INSTALL_PATH . "/config/commons.php";

// Get the autoloader by using composers version.
require ANAX_INSTALL_PATH . "/vendor/autoload.php";

// // Add all framework services to $di
// $di = new Anax\DI\DIFactoryConfig();
// $di->loadServices(ANAX_INSTALL_PATH . "/config/di");

// Enable to also use $app style to access services
$di = new Anax\DI\DIMagic();
$di->loadServices(ANAX_INSTALL_PATH . "/config/di");
$app = $di;
$di->set("app", $app);

// Include user defined routes using programming-style.
foreach (glob(ANAX_INSTALL_PATH . "/router/*.php") as $route) {
    require $route;
}

// Leave to router to match incoming request to routes
$response = $app->router->handle(
    $app->request->getRoute(),
    $app->request->getMethod()
);

// Send the HTTP response with headers and body
$app->response->send($response);
