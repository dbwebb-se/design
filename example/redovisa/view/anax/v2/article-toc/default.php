<?php

namespace Anax\View;

/**
 * Render a meta footer for the blog.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

if (empty($articleToc)) {
    return;
}

// Prepare classes
$classes[] = "block toc article-toc";
if (isset($class)) {
    $classes[] = $class;
}

// Prepare title
$title = isset($title) && !empty($title)
    ? $title
    : t("Table Of Content");



?><div <?= classList($classes) ?>>

    <h4><?= $title ?></h4>
    
    <ul class="toc">
        <?php foreach ($articleToc as $item) : ?>
        <li class="level-<?= $item["level"] ?>"><a href="#<?= $item["id"] ?>"><?= $item["title"] ?></a></li>
        <?php endforeach; ?>
    </ul>

</div>
