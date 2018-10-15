#!/usr/bin/env bash
#
# anax/anax-design-me
#

# Include functions.bash
source .anax/scaffold/functions.bash

# Get items from config/.
rsync -a vendor/anax/anax-design-me/config ./

# Get items from content/.
rsync -a vendor/anax/anax-design-me/content ./

# Remove items from content/.
rm -f content/about.md

# Get items from htdocs/.
rsync -a vendor/anax/anax-design-me/htdocs ./

# # Get own copy of view files.
# rsync -a vendor/anax/view/view/anax/v2 ./view/anax/

# Change baseTitle
sedi "s/ | Anax/ | design/g" config/page.php

# Remove htdocs/cimage/index.html to ease debugging
rm -f htdocs/cimage/index.html
