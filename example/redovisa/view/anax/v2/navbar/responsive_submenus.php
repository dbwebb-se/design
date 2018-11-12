<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

$navbar = new \Anax\Navigation\Navbar();
$navbar->setDI($di);
$html = $navbar->createMenuWithSubMenus($navbarConfig);

$classes = "rm-navbar-max rm-navbar rm-max rm-swipe-right " . ( $class ?? null);


?><!-- menu wrapper -->
<div <?= classList($classes) ?>>
    <!-- memu click button -->
    <div class="rm-small-wrapper">
        <ul class="rm-small">
            <li><a id="rm-menu-button" class="rm-button" href="#">
                <i class="fas fa-bars rm-button-face-1"></i>
                <i class="fas fa-times rm-button-face-2"></i>
            </a></li>
        </ul>
    </div>

    <!-- main menu -->
    <?= $html ?>
</div>
