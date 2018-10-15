---
title: "Test"
---
Test routes
==========================

This page is written in markdown in the file `content/test.md`.

Here are some useful test routes that can be used to demonstrate and test how the routes work.

You will find the implementation of the routes in `config/router/700_test.php`.


Sample routes
------------------------

Here are som routes with a plain anonymous function as a handler.

* [Say Hi](test/hi)
* [Say No! with a status code of 500](test/no)
* [Say Hi using JSON](test/json)



Routes with error handling
------------------------

Here are som routes to try error handling.

* [exception](test/exception) throwing a general exception.
* [403](test/403) throwing a ForbiddenException.
* [404](test/404) throwing a NotFoundException.
* [500](test/500) throwing a InternalErrorException.



Routes with a controller
------------------------

Here are some routes using a controller mounted on `test/controller`.

* [controller/](test/controller) (the index action)
* [controller/dump-di](test/controller/dump-di) (dump content of \$di)
* [controller/info](test/controller/info)
* [controller/create](test/controller/create)
* [controller/argument/some-value](test/controller/argument/some-value) (method takes one argument)

These two routes are handled by the same method which accepts zero or one argument (using default value for the argument).

* [controller/default-argument](test/controller/default-argument) (no argument)
* [controller/default-argument/some-value](test/controller/default-argument/some-value) (one argument)

This action method takes two arguments where the second argument should be an integer.

* [controller/typed-argument/some-value/42](test/controller/typed-argument/some-value/42) (typed arguments)

Here is a action method taking a variadic parameter and can then take any amount of arguments.

* [controller/variadic](test/controller/variadic) (zero arguments)
* [controller/variadic/one](test/controller/variadic/one) (one arguments)
* [controller/variadic/one/two](test/controller/variadic/one/two) (two arguments)
* [controller/variadic/one/two/3](test/controller/variadic/one/two/3) (three arguments)



Routes with a app-style controller
------------------------

Here you can test the app-style controller which gets injected with $app.

* [appstyle/](test/appstyle) (the index action)
* [appstyle/dump-app](test/appstyle/dump-app) (dump content of $app)
