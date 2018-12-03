#!/usr/bin/env bash
#
# Update me/redovisa with an updated example/redovisa.
#

#
# Error message and exit.
#
function die
{
    echo "$1"
    exit 2
}



#
# Main
#
function main
{
    local from="example/redovisa"
    local to="me/redovisa"

    echo "Migrate '$from' to '$to'."

    [ -d "$from" ] || die "Missing directory '$to'"
    [ -d "$to" ] || die "Missing directory '$to'"

    # content/verktyg
    rsync -av "$from/content/verktyg/5"* "$to/content/verktyg/"

    # htdocs/img
    rsync -av "$from/htdocs/img/kabbe.jpg" "$to/htdocs/img/"
}

main
