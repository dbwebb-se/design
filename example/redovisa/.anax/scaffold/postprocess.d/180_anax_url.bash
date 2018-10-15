#!/usr/bin/env bash
#
# anax/url
#

# Copy default config for url
rsync -a vendor/anax/url/config/url_clean.php config/url.php
rsync -a vendor/anax/url/config/di/ config/di/
