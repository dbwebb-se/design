<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());



?><nav class="breadcrumb-list" role="navigation">
    <?php
    renderView(__DIR__ . "/../link-list/default", [
        "links" => $breadcrumb
    ]);
    ?>
</nav>
