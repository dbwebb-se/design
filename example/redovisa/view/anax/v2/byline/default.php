<?php

namespace Anax\View;

/**
 * Render a byline for an author.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

// Prepare classes
$classes[] = "author-byline";
if (isset($class)) {
    $classes[] = $class;
}


foreach ($author as $val) :
    $byline = null;
    extract($val);
    if (!isset($byline)) {
        continue;
    }
    ?><div <?= classList($classes) ?>>
    <?= $byline ?>
</div>
<?php endforeach;
