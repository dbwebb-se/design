<?php

namespace Anax\View;

/**
 * Show a information style flash message.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

// Prepare classes
$classes[] = "flashmessage info";
if (isset($class)) {
    $classes[] = $class;
}


?><div <?= classList($classes) ?>>
    <span class="flashmessage-icon">&#9432;</span>
    <p><?= $message ?></p>
</div>
