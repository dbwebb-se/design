#!/usr/bin/env bash

printf ">>> -------------- Pre (all kmoms) ----------------------\n"

# # Open localhost:1337 in browser
# printf "Open localhost:1337/eshop/index in browser\n"
# eval "$BROWSER" "http://127.0.0.1:1337/eshop/index" &

# # Open me/kmom01/redovisa
# url="$REDOVISA_HTTP_PREFIX/~$acronym/dbwebb-kurser/$COURSE/me/redovisa/htdocs"
# printf "$url\n" 2>&1
# eval "$BROWSER" "$url" &
# 
# echo

# Open me/kmom10/proj
url="$REDOVISA_HTTP_PREFIX/~$ACRONYM/dbwebb-kurser/$COURSE/me/proj/htdocs"
printf "$url\n" 2>&1
eval "$BROWSER" "$url" &
