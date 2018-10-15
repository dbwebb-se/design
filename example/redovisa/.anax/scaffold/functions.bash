#!/usr/bin/env bash
#
# Postprocess scaffold
#

#
# Compatible sed -i.
# https://stackoverflow.com/a/4247319/341137
# arg1: Expression.
# arg2: Filename.
#
function sedi
{
    sed -i.bak "$1" "$2"
    rm -f "$2.bak"
}

#
# Exit with an error message
# $1 the message to display
# $2 an optional exit code, default is 1
#
function error
{
    echo "$1" >&2
    exit "${2:-1}"
}
