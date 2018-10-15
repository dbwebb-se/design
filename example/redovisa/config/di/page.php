<?php
/**
 * Configuration file for DI container.
 */
return [

    // Services to add to the container.
    "services" => [
        "page" => [
            "shared" => true,
            "callback" => function () {
                $page = new \Anax\Page\Page();
                $page->setDI($this);

                // Load the configuration files
                $cfg = $this->get("configuration");
                $config = $cfg->load("page.php");
                $file = $config["file"] ?? null;

                // Add all views from configuration
                $views = $config["config"]["views"] ?? [];
                foreach ($views as $view) {
                    $page->add($view);
                }

                $layout = $config["config"]["layout"] ?? null;
                if (!$layout) {
                    throw new Exception("Missing configuration for layout in file '$file', its needed.");
                }
                $page->addLayout($layout);

                return $page;
            }
        ],
    ],
];
