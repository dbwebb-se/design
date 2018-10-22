<?php

namespace Anax\View;

/**
 * A layout rendering views in defined regions.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

$router = $di->get("router");



?><h1>Router</h1>

<p>The following routes are loaded:</p>

<table>
    <tr><th>Path</th><th>Method</th><th>Handler type</th><th>Description</th></tr>
<?php foreach ($router->getAll() as $route) : ?>
    <tr>
        <td><code>"<?= $route->getAbsolutePath() ?>"</code></td>
        <td><code><?= $route->getRequestMethod() ?></code></td>
        <td><code><?= $route->getHandlerType() ?></code></td>
        <td><?= $route->getInfo() ?></td>
    </tr>
<?php endforeach; ?>
</table>

<p>The following internal routes are loaded:</p>

<table>
    <tr><th>Path</th><th>Handler type</th><th>Description</th></tr>
<?php foreach ($router->getInternal() as $route) : ?>
    <tr>
        <td><code>"<?= $route->getAbsolutePath() ?>"</code></td>
        <td><code><?= $route->getHandlerType() ?></code></td>
        <td><?= $route->getInfo() ?></td>
    </tr>
<?php endforeach; ?>
</table>
