<?php

namespace Anax\View;

/**
 * A layout rendering views in defined regions.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

$title = ($title ?? "No title") . ($baseTitle ?? " | No base title defined");

?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

<?php if (isset($favicon)) : ?>
    <link rel="icon" href="<?= $favicon ?>">
<?php endif; ?>

<?php if (isset($stylesheets)) : ?>
    <?php foreach ($stylesheets as $stylesheet) : ?>
        <link rel="stylesheet" type="text/css" href="<?= asset($stylesheet) ?>">
    <?php endforeach; ?>
<?php endif; ?>

</head>
<body>

<!-- header -->
<?php if (regionHasContent("header")) : ?>
<div class="outer-wrap outer-wrap-header">
    <div class="inner-wrap inner-wrap-header">
        <div class="row">
            <div class="wrap-header">
                <?php renderRegion("header") ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- navbar -->
<?php if (regionHasContent("navbar")) : ?>
<div class="outer-wrap outer-wrap-navbar">
    <div class="inner-wrap inner-wrap-navbar">
        <div class="row">
            <div class="wrap-navbar">
                <?php renderRegion("navbar") ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- main -->
<?php if (regionHasContent("main")) : ?>
<div class="outer-wrap outer-wrap-main">
    <div class="inner-wrap inner-wrap-main">
        <div class="row">
            <main class="wrap-main">
                <?php renderRegion("main") ?>
            </main>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- footer -->
<?php if (regionHasContent("footer")) : ?>
<div class="outer-wrap outer-wrap-footer">
    <div class="inner-wrap inner-wrap-footer">
        <div class="row">
            <div class="wrap-footer">
                <?php renderRegion("footer") ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if (isset($javascripts)) : ?>
    <?php foreach ($javascripts as $javascript) : ?>
    <script async src="<?= asset($javascript) ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>
