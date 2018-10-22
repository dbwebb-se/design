<?php

namespace Anax\View;

/**
 * Render a multiple amount of columns and render a complete view as the
 * content of each column.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

// Prepare the classes and allow $column to add own $class.
$outerClass = isset($class) ? $class : null;
$class = null;

$classes = isset($classes) ? $classes : null;



?><div <?= classList("columns $outerClass-wrapper", $classes) ?>>

<?php if (isset($title)) : ?>
    <h2><?= $title ?></h2>
<?php endif; ?>


<?php $i = 1; foreach ($columns as $column) : 
    $template = isset($column["template"])
        ? $column["template"]
        : __DIR__ . "/../block/default";
?>
    <div <?= classList("column $outerClass") ?>>

        <?php 
        $column["classes"] = ["$outerClass-x", "$outerClass-$i"];
        $data = isset($column["data"])
            ? $column["data"]
            : $column;
        renderView($template, $data);
         ?>

    </div>
<?php $i++; endforeach; ?>

</div>
