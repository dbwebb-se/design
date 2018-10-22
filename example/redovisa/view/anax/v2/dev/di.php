<?php

namespace Anax\View;

/**
 * A layout rendering views in defined regions.
 */

// Show incoming variables and view helper functions
// echo showEnvironment(get_defined_vars(), get_defined_functions());

$services       = $di->getServices();
$activeServices = $di->getActiveServices();



?><h1>DI and services</h1>

<p>These services are loaded into $di, bold services are activated.

<ul>
<?php foreach ($services as $service) :
    $active = in_array($service, $activeServices); ?>
    <li><?= $active ? "<b>" : null ?><?= $service ?><?= $active ? "</b>" : null ?></li>
<?php endforeach; ?>
</ul>
