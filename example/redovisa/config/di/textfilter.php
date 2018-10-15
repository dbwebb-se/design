<?php
/**
 * Configuration file for DI container.
 */
return [
    "services" => [
        "textfilter" => [
            "shared" => true,
            "callback" => function () {
                $filter = new \Anax\TextFilter\TextFilter();
                if (is_dir(ANAX_INSTALL_PATH . "/content")) {
                    $filter->setFilterConfig("frontmatter", [
                        "include_base" => ANAX_INSTALL_PATH . "/content"
                    ]);
                }
                return $filter;
            },
        ],
    ],
];
