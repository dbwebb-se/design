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
    local from="example/redovisa/"
    local to="me/redovisa/"

    echo "Migrate '$from' to '$to'."

    [ -d $from ] || die "Missing directory '$to'"
    [ -d $to ] || die "Missing directory '$to'"

    # content/verktyg
    rsync -av $from/content/verktyg $to/content/
    rm -f $to/content/verktyg/999_att-gora.md

    # theme/Makefile && theme/src && theme/htdocs && htdocs/webfonts
    
}

main
