#!/usr/bin/env bash
#
# mos/cimage
#
# Create the setup in htdocs/cimage and the cache directory.
#

# The cimage config file.
cimage_config='<?php
return [
    "mode"         => "development",
    "image_path"   =>  __DIR__ . "/../img/",
    "cache_path"   =>  __DIR__ . "/../../cache/cimage/",
    "autoloader"   =>  __DIR__ . "/../../vendor/autoload.php",
];
'

# Git file to ignore all cache files.
git_ignore_files="\
# Ignore everything in this directory
*
# Except this file
!.gitignore
"

# Do the setup
install -d htdocs/img htdocs/cimage cache/cimage
chmod 777 cache/cimage
echo "$git_ignore_files" > cache/cimage/.gitignore
cp vendor/mos/cimage/webroot/img.php htdocs/cimage
cp vendor/mos/cimage/webroot/img/car.png htdocs/img/
echo "$cimage_config" > htdocs/cimage/img_config.php
touch htdocs/cimage/index.html
