<?php

namespace Anax\View;

/**
 * Render a block with its content.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

// Prepare classes
$classes[] = "block";
if (isset($class)) {
    $classes[] = $class;
}

// Load content details from route
if (isset($contentRoute)) {
    extract(getContentForRoute($contentRoute));
}

// Prepare title
$title = isset($title) && !empty($title)? $title : null;
$header = isset($header) ? $header : $title;

// Prepare content into text
$content = isset($content) ? $content : null;
$text = isset($text) ? $text : $content;



?><div <?= classList($classes) ?>>

    <?php if (isset($header)) : ?>
        <h4><?= $header ?></h4>
    <?php endif; ?>

    <?php if (isset($text)) : ?>
        <?= $text ?>
    <?php endif; ?>

    <?php if (isset($links)) :
        renderView(__DIR__ . "/../link-list/default", [
            "links" => $links
        ]);
    endif; ?>

    <?php if (isset($toc)) :
        renderView(__DIR__ . "/../toc-list/default", [
            "toc" => $toc
        ]);
    endif; ?>

</div>
