<?php

namespace Anax\View;

/**
 * A layout rendering views in defined regions.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

$src = $src ?? null;
$class = $class ?? null;

$alt = isset($alt)
    ? " alt=\"$alt\""
    : null;

$href = isset($href)
    ? " href=\"$href\""
    : null;

$title = isset($title)
    ? " title=\"$title\""
    : null;

$hrefStart = null;
$hrefEnd = null;
if (isset($href)) {
    $hrefStart = "<a $href $title>";
    $hrefEnd = "</a>";
}

?><?= $hrefStart ?>
<img <?= classList($class) ?> src="<?= asset($src) ?>"<?= $alt ?>>
<?= $hrefEnd ?>
