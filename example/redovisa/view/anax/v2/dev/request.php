<?php

namespace Anax\View;

/**
 * A layout rendering views in defined regions.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

$request = $di->get("request");



?><h1>Request</h1>

<p>Here are details on the current request.</p>

<table>
    <tr>
        <th>Method</th>
        <th>Result</th>
    </tr>
    <tr>
        <td><code>getCurrentUrl()</code></td>
        <td><code><?= $request->getCurrentUrl() ?></code></td>
    </tr>
    <tr>
        <td><code>getMethod()</code></td>
        <td><code><?= $request->getMethod() ?></code></td>
    </tr>
    <tr>
        <td><code>getSiteUrl()</code></td>
        <td><code><?= $request->getSiteUrl() ?></code></td>
    </tr>
    <tr>
        <td><code>getBaseUrl()</code></td>
        <td><code><?= $request->getBaseUrl() ?></code></td>
    </tr>
    <tr>
        <td><code>getScriptName()</code></td>
        <td><code><?= $request->getScriptName() ?></code></td>
    </tr>
    <tr>
        <td><code>getRoute()</code></td>
        <td><code><?= $request->getRoute() ?></code></td>
    </tr>
    <tr>
        <td><code>getRouteParts()</code></td>
        <td><code><?= "[ " . implode(", ", $request->getRouteParts()) . " ]" ?></code></td>
    </tr>
</table>
