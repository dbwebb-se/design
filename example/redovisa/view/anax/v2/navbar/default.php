<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

$items = $navbarConfig["items"] ?? [];

$classes = "navbar " . ($navbarConfig["class"] ?? null);



?><navbar <?= classList($classes) ?>>
<?php foreach ($items as $item) : ?>
    <a href="<?= url($item["url"]) ?>" title="<?= $item["title"] ?>"><?= $item["text"] ?></a>
<?php endforeach; ?>
</navbar>
