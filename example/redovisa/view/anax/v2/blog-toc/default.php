<?php

namespace Anax\View;

/**
 * OBSOLETE?, this view may be partly merged with default/block.
 * Its the next-prev part that is different.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

// Prepare classes
$classes[] = "block blog-toc";
if (isset($class)) {
    $classes[] = $class;
}

// Prepare title
$title = isset($title) && !empty($title)
    ? $title
    : t("Current posts");



?><div <?= classList($classes) ?>>

    <h4><?= $title ?></h4>
    
    <ul class="toc">
        <?php foreach ($toc as $route => $item) : ?>
        <li><a href="<?= url($route) ?>"><?= $item["title"] ?></a></li>
        <?php endforeach; ?>
    </ul>

    <footer>
        <?php
        renderView("default/blog-toc-next-prev-page", [
            "meta" => $meta,
        ]);
        ?>
    </footer>

</div>
