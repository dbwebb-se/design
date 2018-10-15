#!/usr/bin/env bash
#
# anax/anax-flat
#

# Add content/.
rsync -a vendor/anax/anax-flat/content ./

# Get routes defined.
rsync -a vendor/anax/anax-flat/config/router config/

# Remove unused routes
rm -f config/router/000_application.php
