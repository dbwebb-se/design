<?php

namespace Anax\View;

/**
 * Render a meta footer for the blog.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

// Only if set and not empty
if (!isset($category) || empty($category)) {
    return;
}

// Prepare classes
$classes[] = "meta-footer";
if (isset($class)) {
    $classes[] = $class;
}



// Create string for category
$categoryStr = "";
foreach ($category as $key => $cat) {
    $part = isset($cat["name"]) ? $cat["name"] : $key;
    if (isset($cat["url"])) {
        $catUrl = url($cat["url"]);
        $part = "<a href=\"$catUrl\">$part</a>";
    }
    $categoryStr .= $part . ", ";
}
$categoryStr = substr($categoryStr, 0, -2);
$categoryStr = t("Category: !CATEGORIES.", ["!CATEGORIES" => $categoryStr]);



?>
<footer <?= classList($classes) ?>>
    <p><?= $categoryStr ?></p>
</footer>
