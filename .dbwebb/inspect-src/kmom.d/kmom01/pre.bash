#!/usr/bin/env bash
#
# Script run BEFORE specific kmom specific scripts.
#
# Available (and usable) data:
#   $COURSE
#   $KMOM
#   $ACRONYM
#   $COURSE_REPO
#   $REDOVISA_HTTP_PREFIX
#   $REDOVISA_HTTP_POSTFIX
#   eval "$BROWSER" "$url" &
#
printf ">>> -------------- Pre ($kmom)    ----------------------\n"

# # Open localhost:1337 in browser
# printf "Open localhost:1337/eshop/index in browser\n"
# eval "$BROWSER" "http://127.0.0.1:1337/eshop/index" &

# # Open me/kmom01/redovisa
# url="$REDOVISA_HTTP_PREFIX/~$acronym/dbwebb-kurser/$COURSE/me/redovisa/htdocs"
# printf "$url\n" 2>&1
# eval "$BROWSER" "$url" &

# echo
