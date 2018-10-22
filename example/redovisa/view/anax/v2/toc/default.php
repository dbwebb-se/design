<?php

namespace Anax\View;

/**
 * Create a table of content.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

// Prepare classes
$classes[] = "block toc";
if (isset($class)) {
    $classes[] = $class;
}

// Prepare title
$title = isset($title) && !empty($title)
    ? $title
    : t("Table Of Content");

$currentUrl = currentUrl();



?><div <?= classList($classes) ?>>

    <h4><?= $title ?></h4>
    
    <ul class="toc">

        <?php
        foreach ($toc as $route => $item) {
            $text = $item["title"];
            if ($item["linkable"] !== false) {
                $text = "<a href=\"" . url($route) . "\">$text</a>";
            }
            
            $class = "level-${item["level"]}";
            if ($item["sectionHeader"] === true) {
                $class = "section-header";
            }

            if (strcmp(url($route), $currentUrl) === 0) {
                $class .= " selected";
            }
            
            ?><li class="<?= $class ?>"><?= $text ?></li><?php
        } ?>

    </ul>

</div>
