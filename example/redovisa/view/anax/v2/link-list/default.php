<?php

namespace Anax\View;

/**
 * Renders a ul li view based on a general links array.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());



?><ul>

    <?php foreach ($links as $link) :
        $url  = url($link["url"]);
        $text = $link["text"];
        $title = isset($link["title"])
            ? " title=\"${link["title"]}\""
            : null;
        ?>
        <li><a href="<?= $url ?>"<?= $title ?>><?= $text ?></a></li>
    <?php endforeach; ?>

</ul>
