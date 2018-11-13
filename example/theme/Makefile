#!/usr/bin/env make
#
# A Desinax theme.
# See organisation on GitHub: https://github.com/desinax

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
WHERE-AM-I = "$(CURDIR)/$(word $(words $(MAKEFILE_LIST)),$(MAKEFILE_LIST))"
THIS_MAKEFILE := $(call WHERE-AM-I)

# Echo some nice helptext based on the target comment
HELPTEXT = $(call ACTION_MESSAGE, $(shell egrep "^\# target: $(1) " $(THIS_MAKEFILE) | sed "s/\# target: $(1)[ ]*-[ ]* / /g"))

# Check version  and path to command and display on one line
CHECK_VERSION = printf "%-15s %-10s %s\n" "$(shell basename $(1))" "`$(1) --version $(2)`" "`which $(1)`"

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



# target: tag-prepare             - Prepare to tag new version.
.PHONY: tag-prepare
tag-prepare:
	@$(call HELPTEXT,$@)
	grep "^v." REVISION.md | head -1
	[ ! -f package.json ] || grep version package.json
	git tag
	git status
	#gps && gps --tags
	#npm publish



# ------------------------------------------------------------------------
#
# Specifics for this project.
#

# Add local bin path for test tools
LESSC   = node_modules/.bin/lessc
ESLINT  = node_modules/.bin/eslint

BUILD = build
HTDOCS = htdocs
SOURCE = src

LESS_SOURCES = $(shell find $(SOURCE) -maxdepth 1 -name '*.less')
LESS_CSS 	 = $(LESS_SOURCES:$(SOURCE)/%.less=$(BUILD)/less/css/%.css)
LESS_MIN_CSS = $(LESS_SOURCES:$(SOURCE)/%.less=$(BUILD)/less/css/%.min.css)
LESS_LINT 	 = $(LESS_SOURCES:$(SOURCE)/%.less=$(BUILD)/less/lint/%.less)
LESS_MODULES = $(shell find $(SOURCE) -mindepth 2 -name '*.less')

#SCSS_SOURCES := $(shell find $(SOURCEDIR) -name '*.scss')
#SCSS_INCLUDE_PATH = $(SOURCEDIR)

DESINAX_MODULES = $(shell cd $(SOURCE) && find @desinax -mindepth 1 -maxdepth 1 -type d)



# ------------------------------------------------------------------------
#
# Basic rules.
#
# target: prepare                 - Prepare the build directory.
.PHONY: prepare
prepare: 
	@$(call HELPTEXT,$@)
	@[ -d $(BUILD)/less/css ] || install -d $(BUILD)/less/css
	@[ -d $(BUILD)/less/lint ] || install -d $(BUILD)/less/lint



# target: build                   - Build the stylesheets.
.PHONY: build
build: prepare less
	@$(call HELPTEXT,$@)


# target: clean                   - Clean from generated build files.
.PHONY: clean
clean: 
	@$(call HELPTEXT,$@)
	rm -rf $(BUILD)



# target: clean-all               - Clean all installed utilities.
.PHONY: clean-all
clean-all: clean
	@$(call HELPTEXT,$@)
	rm -rf node_modules



# target: install                 - Install modules and dev environment.
.PHONY: install
install: npm-install
	@$(call HELPTEXT,$@)



# target: check                   - Check versions of tools.
.PHONY: check
check:
	@$(call HELPTEXT,$@)
	@$(call CHECK_VERSION, $(LESSC))
	@$(call CHECK_VERSION, $(ESLINT))
	npm list --depth=0



# target: update                  - Update codebase.
.PHONY: update
update: npm-update modules-install styleguide-update
	@$(call HELPTEXT,$@)



# target: upgrade                 - Upgrade codebase.
.PHONY: upgrade
upgrade: npm-upgrade modules-install styleguide-update
	@$(call HELPTEXT,$@)



# target: test                    - Execute all tests.
.PHONY: test
test: less-lint
	@$(call HELPTEXT,$@)



# ------------------------------------------------------------------------
#
# External modules install/clean
#
# target: modules-desinax-install - Install Desinax modules into less/sass/js-dir.
.PHONY: modules-desinax-install
modules-desinax-install:
	@$(call HELPTEXT,$@)
	@cd node_modules;                         \
	for module in $(DESINAX_MODULES) ; do     \
		$(call ACTION_MESSAGE, $$module);     \
		[ ! -d $$module ]                     \
			&& $(ECHO) "Module not installed, skipping it." \
			&& continue;                      \
		install -d ../src/$$module;           \
		rsync -av $$module/src/ ../src/$$module/; \
		rsync -a $$module/README.md ../src/$$module/; \
		rsync -a $$module/REVISION.md ../src/$$module/; \
		rsync -a $$module/LICENSE ../src/$$module/; \
	done



# target: modules-desinax-clean   - Clean Desinax modules from src/.
.PHONY: modules-desinax-clean
modules-desinax-clean:
	@$(call HELPTEXT,$@)
	for module in $(DESINAX_MODULES) ; do     \
		$(call ACTION_MESSAGE, $$module);     \
		rm -rf src/$$module/*; 		          \
	done



# target: modules-install         - Install external modules.
.PHONY: modules-install
modules-install: modules-desinax-install
	@$(call HELPTEXT,$@)

	# Normalize.css
	npm install normalize.css
	rsync -av --exclude package.json node_modules/normalize.css src/
	rsync -av src/normalize.css/normalize.css src/normalize.css/normalize.less

	# Font Awesome
	npm install @fortawesome/fontawesome-free
	rsync -av --exclude package.json node_modules/@fortawesome/fontawesome-free src/@fortawesome/



# target: modules-clean           - Clean external modules.
.PHONY: modules-clean
modules-clean: modules-desinax-clean
	@$(call HELPTEXT,$@)

	# Normalize.css
	rm -rf src/normalize.css

	# Font Awesome
	rm -rf src/@fortawesome



# ------------------------------------------------------------------------
#
# Validation according to CSS-styleguide.
# @TODO Clean up this rule, is it active?
#
# target: styleguide-update       - Update styleguide validation files.
.PHONY: styleguide-update
styleguide-update:
	@$(call HELPTEXT,$@)
	rsync -av node_modules/@desinax/css-styleguide/.stylelintrc.json .




# ------------------------------------------------------------------------
#
# LESS.
#
# target: less                    - Compile the LESS stylesheet(s).
less: prepare less-css less-min-css
	@$(call HELPTEXT,$@)
	@rsync -a $(BUILD)/less/css htdocs/

less-css: $(LESS_CSS)
less-min-css: $(LESS_MIN_CSS)
less-lint: $(LESS_LINT)

$(BUILD)/less/css/%.css: $(SOURCE)/%.less
	@$(call ACTION_MESSAGE,$< -> $@)
	$(LESSC) $< $@

$(BUILD)/less/css/%.min.css: $(SOURCE)/%.less
	@$(call ACTION_MESSAGE,$< -> $@)
	$(LESSC) --clean-css $< $@

$(BUILD)/less/lint/%.less: $(SOURCE)/%.less
	@$(call ACTION_MESSAGE,$< -> $@)
	$(LESSC) --lint $< $@

$(LESS_SOURCES): $(LESS_MODULES)
	touch $@



# ------------------------------------------------------------------------
#
# SCSS.
#



# ------------------------------------------------------------------------
#
# CSS.
#
# target: lint-css                - Lint the CSS stylesheet(s).
.PHONY: lint-css
lint-css: less
	@$(call HELPTEXT,$@)
	$(LESSC) --include-path=$(LESS_INCLUDE_PATH) --lint $(LESS_SOURCE) > build/lint/style.less
	- $(ESLINT) build/css/style.css > build/lint/style.css
	ls -l build/lint/



# ------------------------------------------------------------------------
#
# JS.
#



# ------------------------------------------------------------------------
#
# NPM.
#
# target: npm-install             - Install npm from package.json.
.PHONY: npm-install
npm-install: 
	@$(call HELPTEXT,$@)
	npm install



# target: npm-update              - Update npm using package.json.
.PHONY: npm-update
npm-update: 
	@$(call HELPTEXT,$@)
	npm update



# target: npm-upgrade             - Upgrade npm using package.json.
.PHONY: npm-upgrade
npm-upgrade: 
	@$(call HELPTEXT,$@)
	npm upgrade



# target: npm-outdated            - Check for outdated packages.
.PHONY: npm-outdated
npm-outdated: 
	@$(call HELPTEXT,$@)
	npm outdated --depth=0
