<?php

namespace Anax\View;

/**
 * Template file to render a view with plain content.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

// Prepare incoming variables
$class   = $class ?? null;
$content = $content ?? null;



?><div class="$class">
<?= $content ?>
</div>
