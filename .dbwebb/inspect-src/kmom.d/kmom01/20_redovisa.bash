#!/usr/bin/env bash
#
# Script run for specific kmom (within docker).
#
# Available (and usable) data:
#   $COURSE
#   $KMOM
#   $ACRONYM
#
cd me/redovisa || exit
e() { exit; }
export -f e

echo "[$ACRONYM] Do manual stuff, if needed (write e/exit to exit)?"
ls
bash
