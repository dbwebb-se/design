#!/usr/bin/make -f
#
# Build website with environment
#
#

# Theme
LESS 		 = theme/style_anax-flat.less
LESS_OPTIONS = --strict-imports --include-path=theme/mos-theme/style/
FONT_AWESOME = theme/mos-theme/style/font-awesome/fonts/

# Colors
NO_COLOR		= \033[0m
TARGET_COLOR	= \033[32;01m
OK_COLOR		= \033[32;01m
ERROR_COLOR		= \033[31;01m
WARN_COLOR		= \033[33;01m
ACTION			= $(TARGET_COLOR)--> 
HELPTEXT 		= "$(ACTION)" `egrep "^\# target: $(1) " Makefile | sed "s/\# target: $(1)[ ]\+- / /g"` "$(NO_COLOR)"



# target: help                - Displays help.
.PHONY:  help
help:
	@echo $(call HELPTEXT,$@)
	@echo "Usage:"
	@echo " make [target] ..."
	@echo "target:"
	@egrep "^# target:" Makefile | sed 's/# target: / /g'



# target: site-build          - Copy default structure from Anax Flat.
.PHONY: site-build
site-build:
	@echo $(call HELPTEXT,$@)
	rsync -a vendor/mos/anax-flat/htdocs/ htdocs/
	rsync -a vendor/mos/anax-flat/config/ config/
	rsync -a vendor/mos/anax-flat/content/ content/
	rsync -a vendor/mos/anax-flat/view/ view/

	@echo "$(ACTION)Copy from CImage$(NO_COLOR)"
	install -d htdocs/cimage
	rsync -a vendor/mos/cimage/webroot/imgd.php htdocs/cimage/imgd.php
	rsync -a vendor/mos/cimage/icc/ htdocs/cimage/icc/

	@echo "$(ACTION)Create the directory for the cache items$(NO_COLOR)"
	install --directory --mode 777 cache/cimage cache/anax



# target: prepare-build       - Clear and recreate the build directory.
.PHONY: prepare-build
prepare-build:
	@echo $(call HELPTEXT,$@)
	rm -rf build
	install -d build/css build/lint



# target: less                - Compiling LESS stylesheet.
.PHONY: less
less: prepare-build
	@echo $(call HELPTEXT,$@)
	lessc $(LESS_OPTIONS) $(LESS) build/css/style.css
	lessc --clean-css $(LESS_OPTIONS) $(LESS) build/css/style.min.css
	cp build/css/style.min.css htdocs/css/default.min.css

	rsync -a $(FONT_AWESOME) htdocs/fonts/



# target: less-lint           - Linting LESS/CSS stylesheet.
.PHONY: less-lint
less-lint: less
	@echo $(call HELPTEXT,$@)
	lessc --lint $(LESS_OPTIONS) $(LESS) > build/lint/style.less
	- csslint build/css/style.css > build/lint/style.css
	ls -l build/lint/



# target: upgrade-normalize       - Upgrade LESS module - Normalize.
.PHONY: upgrade-normalize
upgrade-normalize:
	@echo $(call HELPTEXT,$@)

	# Normalizer
	wget --quiet https://necolas.github.io/normalize.css/latest/normalize.css -O $(LESS_MODULES)/normalize.less



# target: upgrade-responsive-menu - Upgrade LESS module - Responsive menu
.PHONY: upgrade-responsive-menu
upgrade-responsive-menu:
	@echo $(call HELPTEXT,$@)

	# Responsive-menu
	wget --quiet https://raw.githubusercontent.com/mosbth/responsive-menu/master/responsive-menu.less -O $(LESS_MODULES)/responsive-menu.less
	wget --quiet https://raw.githubusercontent.com/mosbth/responsive-menu/master/responsive-menu.js -O js/responsive-menu.js



# target: upgrade                 - Upgrade external LESS modules.
.PHONY: upgrade
upgrade: upgrade-normalize upgrade-responsive-menu
	@echo $(call HELPTEXT,$@)
