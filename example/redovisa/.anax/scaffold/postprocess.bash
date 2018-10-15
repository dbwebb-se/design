#!/usr/bin/env bash
#
# Postprocess scaffold
#

# Include ./functions.bash
source .anax/scaffold/functions.bash

# Install using composer
composer install --no-dev

# Get scaffolding scripts from Anax Lite, Anax Flat, Anax design me
rsync -a vendor/anax/anax-lite/.anax/scaffold/postprocess.d .anax/scaffold/
rsync -a vendor/anax/anax-flat/.anax/scaffold/postprocess.d .anax/scaffold/
rsync -a vendor/anax/anax-design-me/.anax/scaffold/postprocess.d .anax/scaffold/

# Run scaffolding scripts
echo -n "Processing scaffolding scripts: "
for file in .anax/scaffold/postprocess.d/*.bash; do
    echo -n "."
    bash "$file"
done
echo " done."
