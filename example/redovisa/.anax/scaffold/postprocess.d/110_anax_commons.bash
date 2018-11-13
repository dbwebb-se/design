#!/usr/bin/env bash
#
# anax/commons
#

# Get a Makefile, could be useful
rsync -a vendor/anax/commons/Makefile Makefile

# Install general development files from anax/commons.
rsync -a vendor/anax/commons/{.gitignore,.circleci,.php*.xml} ./
mv .circleci/config_default.yml .circleci/config.yml

rsync -a vendor/anax/commons/.travis_default.yml .travis.yml
rsync -a vendor/anax/commons/.codeclimate.yml ./
rsync -a vendor/anax/commons/test/Example ./test/
cp vendor/anax/commons/test/config_sample.php ./test/config.php

# Enable to run site in docker
rsync -a vendor/anax/commons/docker-compose_site.yml docker-compose.yml

# Get configuration for commons.
rsync -a vendor/anax/commons/config/ config/

# Create directory structure for htdocs
install -d htdocs/img
rsync -a vendor/anax/commons/htdocs/ htdocs/
