#!/usr/bin/make -f
#
# Build website with environment
#
#

# Theme
#LESS 		 = theme/style_anax-flat.less
#LESS_OPTIONS = --strict-imports --include-path=theme/mos-theme/style/
#FONT_AWESOME = theme/font-awesome/fonts/
LESS 		 = theme/style.less
LESS_OPTIONS = --strict-imports --include-path=theme/modules/

# Colors and helptext
NO_COLOR	= \033[0m
ACTION		= \033[32;01m
OK_COLOR	= \033[32;01m
ERROR_COLOR	= \033[31;01m
WARN_COLOR	= \033[33;01m
HELPTEXT 	= /bin/echo -e "$(ACTION)--->" `egrep "^\# target: $(1) " Makefile | sed "s/\# target: $(1)[ ]\+- / /g"` "$(NO_COLOR)"



# target: help                - Displays help.
.PHONY:  help
help:
	@$(call HELPTEXT,$@)
	@echo "Usage:"
	@echo " make [target] ..."
	@echo "target:"
	@egrep "^# target:" Makefile | sed 's/# target: / /g'



# target: site-build          - Copy default structure from Anax Flat.
.PHONY: site-build
site-build:
	@$(call HELPTEXT,$@)

	@/bin/echo -e "$(ACTION)Copy from anax-flat$(NO_COLOR)"
	rsync -a vendor/mos/anax-flat/htdocs/ htdocs/
	rsync -a vendor/mos/anax-flat/config/ config/
	rsync -a vendor/mos/anax-flat/content/ content/
	rsync -a vendor/mos/anax-flat/view/ view/

	@/bin/echo -e "$(ACTION)Copy from CImage$(NO_COLOR)"
	install -d htdocs/cimage
	rsync -a vendor/mos/cimage/webroot/imgd.php htdocs/cimage/imgd.php
	rsync -a vendor/mos/cimage/icc/ htdocs/cimage/icc/

	@/bin/echo -e "$(ACTION)Create the directory for the cache items$(NO_COLOR)"
	install --directory --mode 777 cache/cimage cache/anax



# target: site-update         - Make composer update and copy latest files.
.PHONY: site-update
site-update:
	@$(call HELPTEXT,$@)
	composer update

	@/bin/echo -e "$(ACTION)Copy Makefile$(NO_COLOR)"
	rsync -av vendor/mos/anax-flat/Makefile

	@/bin/echo -e "$(ACTION)Copy from CImage$(NO_COLOR)"
	rsync -a vendor/mos/cimage/webroot/imgd.php htdocs/cimage/imgd.php
	rsync -a vendor/mos/cimage/icc/ htdocs/cimage/icc/



# target: prepare-build       - Clear and recreate the build directory.
.PHONY: prepare-build
prepare-build:
	@$(call HELPTEXT,$@)
	rm -rf build
	install -d build/css build/lint



# target: less                - Compiling LESS stylesheet.
.PHONY: less
less: prepare-build
	@$(call HELPTEXT,$@)
	lessc $(LESS_OPTIONS) $(LESS) build/css/style.css
	lessc --clean-css $(LESS_OPTIONS) $(LESS) build/css/style.min.css
	cp build/css/style.min.css htdocs/css/
	@#cp build/css/style.css htdocs/css/

	@#rsync -a $(FONT_AWESOME) htdocs/fonts/



# target: less-lint           - Linting LESS/CSS stylesheet.
.PHONY: less-lint
less-lint: less
	@$(call HELPTEXT,$@)
	lessc --lint $(LESS_OPTIONS) $(LESS) > build/lint/style.less
	- csslint build/css/style.css > build/lint/style.css
	ls -l build/lint/
