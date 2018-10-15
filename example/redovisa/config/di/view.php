<?php
/**
 * Create a collection of views.
 */
return [
    "services" => [
        "view" => [
            "active" => false,
            "shared" => true,
            "callback" => function () {
                $view = new \Anax\View\ViewCollection();
                $view->setDI($this);

                // Load the configuration files
                $cfg = $this->get("configuration");
                $config = $cfg->load("view.php");
                $file = $config["file"] ?? null;

                $paths = $config["config"]["paths"] ?? null;
                if (!$paths) {
                    throw new Exception("Configuration file '$file' has no key 'paths', its needed.");
                }
                $view->setPaths($paths);

                $suffix = $config["config"]["suffix"] ?? null;
                if ($suffix) {
                    $view->setSuffix($suffix);
                }

                return $view;
            }
        ],
    ],
];
