<?php
/**
 * Configuration file for DI container.
 */
return [

    // Services to add to the container.
    "services" => [
        "cache" => [
            "shared" => true,
            "callback" => function () {
                $cache = new \Anax\Cache\FileCache();

                // Load the configuration files
                $cfg = $this->get("configuration");
                $config = $cfg->load("cache.php");
                $file = $config["file"] ?? null;
                $config = $config["config"] ?? null;

                $path = $config["basePath"] ?? null;
                if (!$path || !is_dir($path) || !is_writable($path)) {
                    throw new Exception("Configuration file '$file': Cachedir '$path' is not a writable directory.");
                }
                $cache->setPath($path);

                $timeToLive = $config["timeToLive"] ?? null;
                if ($timeToLive) {
                    $cache->setTimeToLive($timeToLive);
                }

                return $cache;
            }
        ],
    ],
];
