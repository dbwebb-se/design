#!/usr/bin/env make
#
# An Anax module.
# See organisation on GitHub: https://github.com/canax

# ------------------------------------------------------------------------
#
# General stuff, reusable for all Makefiles.
#

# Detect OS
OS = $(shell uname -s)

# Defaults
ECHO = echo

# Make adjustments based on OS
ifneq (, $(findstring CYGWIN, $(OS)))
	ECHO = /bin/echo -e
endif

# Colors and helptext
NO_COLOR	= \033[0m
ACTION		= \033[32;01m
OK_COLOR	= \033[32;01m
ERROR_COLOR	= \033[31;01m
WARN_COLOR	= \033[33;01m

# Print out colored action message
ACTION_MESSAGE = $(ECHO) "$(ACTION)---> $(1)$(NO_COLOR)"

# Which makefile am I in?
WHERE-AM-I = $(CURDIR)/$(word $(words $(MAKEFILE_LIST)),$(MAKEFILE_LIST))
THIS_MAKEFILE := $(call WHERE-AM-I)

# Echo some nice helptext based on the target comment
HELPTEXT = $(call ACTION_MESSAGE, $(shell egrep "^\# target: $(1) " $(THIS_MAKEFILE) | sed "s/\# target: $(1)[ ]*-[ ]* / /g"))

# Check version  and path to command and display on one line
CHECK_VERSION = printf "%-15s %-10s %s\n" "`basename $(1)`" "`$(1) --version $(2)`" "`which $(1)`"

# Get current working directory, it may not exist as environment variable.
PWD = $(shell pwd)

# target: help                    - Displays help.
.PHONY:  help
help:
	@$(call HELPTEXT,$@)
	@sed '/^$$/q' $(THIS_MAKEFILE) | tail +3 | sed 's/#\s*//g'
	@$(ECHO) "Usage:"
	@$(ECHO) " make [target] ..."
	@$(ECHO) "target:"
	@egrep "^# target:" $(THIS_MAKEFILE) | sed 's/# target: / /g'



# ------------------------------------------------------------------------
#
# Specifics for this project.
#
# Default values for arguments
container ?= latest

BIN     := .bin
#PHPUNIT := $(BIN)/phpunit
PHPUNIT := vendor/bin/phpunit
PHPLOC 	:= $(BIN)/phploc
PHPCS   := $(BIN)/phpcs
PHPCBF  := $(BIN)/phpcbf
PHPMD   := $(BIN)/phpmd
PHPDOC  := $(BIN)/phpdoc
BEHAT   := $(BIN)/behat
SHELLCHECK := $(BIN)/shellcheck
BATS := $(BIN)/bats



# target: prepare                 - Prepare for tests and build
.PHONY:  prepare
prepare:
	@$(call HELPTEXT,$@)
	[ -d .bin ] || mkdir .bin
	[ -d build ] || mkdir build
	rm -rf build/*



# target: clean                   - Removes generated files and directories.
.PHONY: clean
clean:
	@$(call HELPTEXT,$@)
	rm -rf build



# target: clean-cache             - Clean the cache.
.PHONY:  clean-cache
clean-cache:
	@$(call HELPTEXT,$@)
	rm -rf cache/*/*



# target: clean-all               - Removes generated files and directories.
.PHONY:  clean-all
clean-all: clean clean-cache
	@$(call HELPTEXT,$@)
	rm -rf .bin vendor composer.lock



# target: check                   - Check version of installed tools.
.PHONY:  check
check: check-tools-bash check-tools-php check-docker
	@$(call HELPTEXT,$@)



# target: test                    - Run all tests.
.PHONY:  test
test: phpunit phpcs phpmd phploc behat shellcheck bats
	@$(call HELPTEXT,$@)
	composer validate



# target: doc                     - Generate documentation.
.PHONY:  doc
doc: phpdoc
	@$(call HELPTEXT,$@)



# target: build                   - Do all build
.PHONY:  build
build: test doc #theme less-compile less-minify js-minify
	@$(call HELPTEXT,$@)



# target: install                 - Install all tools
.PHONY:  install
install: prepare install-tools-php install-tools-bash
	@$(call HELPTEXT,$@)
	composer install



# target: install-lowest          - Install lowest version of deoendencies
.PHONY:  install-lowest
install-lowest:
	@$(call HELPTEXT,$@)
	composer update --no-dev --prefer-lowest



# target: update                  - Update the codebase and tools.
.PHONY:  update
update:
	@$(call HELPTEXT,$@)
	[ ! -d .git ] || git pull
	composer update



# target: tag-prepare             - Prepare to tag new version.
.PHONY: tag-prepare
tag-prepare:
	@$(call HELPTEXT,$@)



# ----------------------------------------------------------------------------
#
# docker
#
# target: docker-up               - Start all docker container="", or specific, default "latest".
.PHONY: docker-up
docker-up:
	@$(call HELPTEXT,$@)
	[ ! -f docker-compose.yaml ] || docker-compose -f docker-compose.yaml up -d $(container)



# target: docker-stop             - Stop running docker containers.
.PHONY: docker-stop
docker-stop:
	@$(call HELPTEXT,$@)
	[ ! -f docker-compose.yaml ] || docker-compose -f docker-compose.yaml stop



# target: docker-run              - Run container="" with what="" one off command.
.PHONY: docker-run
docker-run:
	@$(call HELPTEXT,$@)
	[ ! -f docker-compose.yaml ] || docker-compose -f docker-compose.yaml run $(container) $(what)



# target: docker-bash             - Run container="" with what="bash" one off command.
.PHONY: docker-bash
docker-bash:
	@$(call HELPTEXT,$@)
	[ ! -f docker-compose.yaml ] || docker-compose -f docker-compose.yaml run $(container) bash



# target: docker-exec             - Run container="" with what="" command in running container.
.PHONY: docker-exec
docker-exec:
	@$(call HELPTEXT,$@)
	[ ! -f docker-compose.yaml ] || docker-compose -f docker-compose.yaml exec $(container) $(what)



# target: docker-install          - Run make install in container="".
.PHONY: docker-install
docker-install:
	@$(call HELPTEXT,$@)
	[ ! -f docker-compose.yaml ] || docker-compose -f docker-compose.yaml run $(container) make install



# target: docker-test             - Run make test in container="".
.PHONY: docker-test
docker-test:
	@$(call HELPTEXT,$@)
	[ ! -f docker-compose.yaml ] || docker-compose -f docker-compose.yaml run $(container) make test



# target: check-docker            - Check versions of docker.
.PHONY: check-docker
check-docker:
	@$(call HELPTEXT,$@)
	@$(call CHECK_VERSION, docker, | cut -d" " -f3-)
	@$(call CHECK_VERSION, docker-compose, | cut -d" " -f3-)



# ------------------------------------------------------------------------
#
# PHP
#

# target: install-tools-php       - Install PHP development tools.
.PHONY: install-tools-php
install-tools-php:
	@$(call HELPTEXT,$@)
	#curl -Lso $(PHPDOC) https://www.phpdoc.org/phpDocumentor.phar && chmod 755 $(PHPDOC)
	curl -Lso $(PHPDOC) https://github.com/phpDocumentor/phpDocumentor2/releases/download/v2.9.0/phpDocumentor.phar && chmod 755 $(PHPDOC)

	curl -Lso $(PHPCS) https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar && chmod 755 $(PHPCS)

	curl -Lso $(PHPCBF) https://squizlabs.github.io/PHP_CodeSniffer/phpcbf.phar && chmod 755 $(PHPCBF)

	curl -Lso $(PHPMD) http://static.phpmd.org/php/latest/phpmd.phar && chmod 755 $(PHPMD)
	# curl -Lso $(PHPMD) http://www.student.bth.se/~mosstud/download/phpmd.phar && chmod 755 $(PHPMD)

	curl -Lso $(PHPLOC) https://phar.phpunit.de/phploc.phar && chmod 755 $(PHPLOC)

	curl -Lso $(BEHAT) https://github.com/Behat/Behat/releases/download/v3.3.0/behat.phar && chmod 755 $(BEHAT)

	# # Get PHPUNIT depending on current PHP installation
	# curl -Lso $(PHPUNIT) https://phar.phpunit.de/phpunit-$(shell \
	#  	php -r "echo version_compare(PHP_VERSION, '7.0', '<') \
	# 		? '5' \
	# 		: (version_compare(PHP_VERSION, '7.1', '>=') \
	# 			? '7' \
	# 			: '6'\
	# 	);" \
	# 	).phar && chmod 755 $(PHPUNIT)

	[ ! -f composer.json ] || composer install



# target: check-tools-php         - Check versions of PHP tools.
.PHONY: check-tools-php
check-tools-php:
	@$(call HELPTEXT,$@)
	php --version && echo
	composer show && echo
	@$(call CHECK_VERSION, $(PHPUNIT))
	@$(call CHECK_VERSION, $(PHPLOC))
	@$(call CHECK_VERSION, $(PHPCS))
	@$(call CHECK_VERSION, $(PHPMD))
	@$(call CHECK_VERSION, $(PHPCBF))
	@$(call CHECK_VERSION, $(PHPDOC))
	@$(call CHECK_VERSION, $(BEHAT))



# target: phpunit                 - Run unit tests for PHP.
.PHONY: phpunit
phpunit: prepare
	@$(call HELPTEXT,$@)
	[ ! -d "test" ] || $(PHPUNIT) --configuration .phpunit.xml $(options)



# target: phpcs                   - Codestyle for PHP.
.PHONY: phpcs
phpcs: prepare
	@$(call HELPTEXT,$@)
	[ ! -f .phpcs.xml ] || $(PHPCS) --standard=.phpcs.xml | tee build/phpcs



# target: phpcbf                  - Fix codestyle for PHP.
.PHONY: phpcbf
phpcbf:
	@$(call HELPTEXT,$@)
ifneq ($(wildcard test),)
	[ ! -f .phpcs.xml ] || $(PHPCBF) --standard=.phpcs.xml
else
	[ ! -f .phpcs.xml ] || $(PHPCBF) --standard=.phpcs.xml src
endif



# target: phpmd                   - Mess detector for PHP.
.PHONY: phpmd
phpmd: prepare
	@$(call HELPTEXT,$@)
	- [ ! -f .phpmd.xml ] || [ ! -d src ] || $(PHPMD) . text .phpmd.xml | tee build/phpmd



# target: phploc                  - Code statistics for PHP.
.PHONY: phploc
phploc: prepare
	@$(call HELPTEXT,$@)
	[ ! -d src ] || $(PHPLOC) src > build/phploc



# target: phpdoc                  - Create documentation for PHP.
.PHONY: phpdoc
phpdoc:
	@$(call HELPTEXT,$@)
	[ ! -d doc ] || $(PHPDOC) --config=.phpdoc.xml



# target: behat                   - Run behat for feature tests.
.PHONY: behat
behat:
	@$(call HELPTEXT,$@)
	[ ! -d features ] || $(BEHAT)


# ------------------------------------------------------------------------
#
# Bash
#

# target: install-tools-bash      - Install Bash development tools.
.PHONY: install-tools-bash
install-tools-bash:
	@$(call HELPTEXT,$@)
	# Shellcheck
	curl -s https://storage.googleapis.com/shellcheck/shellcheck-latest.linux.x86_64.tar.xz | tar -xJ -C build/ && rm -f .bin/shellcheck && ln build/shellcheck-latest/shellcheck .bin/

	# Bats
	curl -Lso $(BIN)/bats-exec-suite https://raw.githubusercontent.com/sstephenson/bats/master/libexec/bats-exec-suite
	curl -Lso $(BIN)/bats-exec-test https://raw.githubusercontent.com/sstephenson/bats/master/libexec/bats-exec-test
	curl -Lso $(BIN)/bats-format-tap-stream https://raw.githubusercontent.com/sstephenson/bats/master/libexec/bats-format-tap-stream
	curl -Lso $(BIN)/bats-preprocess https://raw.githubusercontent.com/sstephenson/bats/master/libexec/bats-preprocess
	curl -Lso $(BATS) https://raw.githubusercontent.com/sstephenson/bats/master/libexec/bats
	chmod 755 $(BIN)/bats*



# target: check-tools-bash        - Check versions of Bash tools.
.PHONY: check-tools-bash
check-tools-bash:
	@$(call HELPTEXT,$@)
	@$(call CHECK_VERSION, $(SHELLCHECK))
	@$(call CHECK_VERSION, $(BATS))



# target: shellcheck              - Run shellcheck for bash files.
.PHONY: shellcheck
shellcheck:
	@$(call HELPTEXT,$@)
	[ ! -f src/*.bash ] || $(SHELLCHECK) --shell=bash src/*.bash



# target: bats                    - Run bats for unit testing bash files.
.PHONY: bats
bats:
	@$(call HELPTEXT,$@)
	[ ! -d bats ] || $(BATS) bats/



# ------------------------------------------------------------------------
#
# Theme
#
# target: theme                   - Do make build install in theme/ if available.
.PHONY: theme
theme:
	@$(call HELPTEXT,$@)
	[ ! -d theme ] || $(MAKE) --directory=theme build
	rsync -a theme/htdocs/css htdocs/



# ------------------------------------------------------------------------
#
# Cimage
#

define CIMAGE_CONFIG
<?php
return [
    "mode"         => "development",
    "image_path"   =>  __DIR__ . "/../img/",
    "cache_path"   =>  __DIR__ . "/../../cache/cimage/",
    "autoloader"   =>  __DIR__ . "/../../vendor/autoload.php",
];
endef
export CIMAGE_CONFIG

define GIT_IGNORE_FILES
# Ignore everything in this directory
*
# Except this file
!.gitignore
endef
export GIT_IGNORE_FILES

# target: cimage-install          - Install Cimage in htdocs
.PHONY: cimage-install
cimage-install:
	@$(call HELPTEXT,$@)
	install -d htdocs/img htdocs/cimage cache/cimage
	chmod 777 cache/cimage
	$(ECHO) "$$GIT_IGNORE_FILES" | bash -c 'cat > cache/cimage/.gitignore'
	cp vendor/mos/cimage/webroot/img.php htdocs/cimage
	cp vendor/mos/cimage/webroot/img/car.png htdocs/img/
	touch htdocs/cimage/img_config.php

# target: cimage-update           - Update Cimage to latest version.
.PHONY: cimage-update
cimage-update:
	@$(call HELPTEXT,$@)
	composer require mos/cimage
	install -d htdocs/img htdocs/cimage cache/cimage
	chmod 777 cache/cimage
	$(ECHO) "$$GIT_IGNORE_FILES" | bash -c 'cat > cache/cimage/.gitignore'
	cp vendor/mos/cimage/webroot/img.php htdocs/cimage
	cp vendor/mos/cimage/webroot/img/car.png htdocs/img/
	touch htdocs/cimage/img_config.php

# target: cimage-config-create    - Create configfile for Cimage.
.PHONY: cimage-config-create
cimage-config-create:
	@$(call HELPTEXT,$@)
	$(ECHO) "$$CIMAGE_CONFIG" | bash -c 'cat > htdocs/cimage/img_config.php'
	cat htdocs/cimage/img_config.php
