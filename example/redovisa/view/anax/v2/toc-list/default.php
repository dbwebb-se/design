<?php

namespace Anax\View;

/**
 * Renders a ul li view based on a toc array.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());



?><ul>

    <?php foreach ($toc as $route => $link) :
        $url  = url($route);
        $text = $link["title"]; // Should be text?
        $title = null; // Missmatch with $link["title"]
        /*
        $title = isset($link["title"])
            ? " title=\"${link["title"]}\""
            : null; */
        ?>

    <li><a href="<?= $url ?>"<?= $title ?>><?= $text ?></a></li>

    <?php endforeach; ?>

</ul>
