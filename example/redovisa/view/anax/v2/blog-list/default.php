<?php

namespace Anax\View;

/**
 * Render a list of blog entries.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

// Prepare classes
$classes[] = "blog-list";
if (isset($class)) {
    $classes[] = $class;
}

// Labels
$readmoreLabel = isset($label["readmore"])
    ? $label["readmore"]
    : t("Read more »");

// Common date format
$dateFormat = isset($dateFormat) ? $dateFormat : "m/d/Y";



?><section <?= classList($classes) ?>>
    <?php
    // Loop through all items and display
    foreach ($toc as $route => $content) :
        $item = getContentForRoute($route);
        //var_dump($item);
        //var_dump(get_defined_vars());

        // TODO Format the date
        // Get time for publish/update/create
        list($pubStr, $published) = getPublishedDate($item);
        $publishedFormatted = date($dateFormat, strtotime($published));
        //$datetime = $item["published"];
        //$date = $item["published"];
        
        $category = isset($item["category"]) ? $item["category"] : null;

        // Format the content
        $urlToPost = url($route);
        $excerpt = $item["excerpt"];
        
        // Wrap h1 with link to article
        $excerpt = wrapElementContentWithStartEnd(
            $excerpt,
            "h1",
            "<a href=\"$urlToPost\">",
            "</a>",
            1
        );



        ?><section <?= classList("blog-list-item") ?>>

            <span class="meta-header"><time datetime="<?= $published ?>"><?= $publishedFormatted ?></time></span>
            
            <?= $excerpt ?>
            
            <p class="readmore"><a href="<?= $urlToPost ?>"><?= $readmoreLabel ?></a></p>

            <?php
            renderView(__DIR__ . "/../blog-meta-footer/default", [
                "category" => $category,
            ]);
            ?>

        </section>
        <?php
    endforeach; ?>

    <footer>
        <?php
        renderView(__DIR__ . "/../blog-toc-next-prev-page/default", [
            "meta" => $meta,
        ]);
        ?>
    </footer>
</section>
