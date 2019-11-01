<?php

namespace Anax\View;

/**
 * Render next-previous links for the blog.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

// Prepare classes
$classes[] = "blog-toc-next-prev-page";
if (isset($class)) {
    $classes[] = $class;
}

// Next and previous page
$nextStr        = t("Next »");
$previousStr    = t("« Previous");
$nextPageUrl    = $meta["nextPageUrl"];
$previousPageUrl = $meta["previousPageUrl"];
$currentPage    = $meta["currentPage"];
$totalPages     = $meta["totalPages"];
$pageStr = t("!CURRENT_PAGE (!TOTAL_PAGES)", [
    "!CURRENT_PAGE" => $currentPage,
    "!TOTAL_PAGES" => $totalPages,
]);

if (!$previousPageUrl && !$nextPageUrl) {
    return;
}



?><div <?= classList($classes) ?>>
    <div class="next">
        <?php if ($nextPageUrl) : ?>
        <a href="<?= url($nextPageUrl) ?>"><?= $nextStr ?></a>
        <?php else : ?>
        &nbsp;
        <?php endif; ?>
    </div>

    <div class="center">
        <?= $pageStr ?></a>
    </div>

    <div class="previous">
        <?php if ($previousPageUrl) : ?>
        <a href="<?= url($previousPageUrl) ?>"><?= $previousStr ?></a>
        <?php endif; ?>
    </div>
</div>
