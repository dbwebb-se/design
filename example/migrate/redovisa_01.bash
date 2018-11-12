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
    rsync -av "$from/content/verktyg" "$to/content/"
    rm -f "$to/content/verktyg/999_att-gora.md"

    # view files were updated with codestyle, ignoring them
    #rsync -av $from/view $to/

    # theme/Makefile && theme/src && theme/htdocs && htdocs/webfonts
    local from="example/theme"
    local to="me/redovisa/theme"

    echo "Migrate '$from' to '$to'."

    [ -d "$from" ] || die "Missing directory '$to'"
    [ -d "$to" ] || die "Missing directory '$to'"

    # theme/
    rsync -av \
        --exclude REVISION.md \
        --exclude htdocs/css/ \
        --exclude package.json \
        --exclude src/kmom01_v2.less \
        "$from/" "$to/"


    # delete stray files in some parts.
    local parts="src/@desinax/typographic-grid"
    rsync -av --delete "$from/$parts/" "$to/$parts/"

    parts="src/@fortawesome"
    rsync -av --delete "$from/$parts/" "$to/$parts/"

    parts="src/normalize.css"
    rsync -av --delete "$from/$parts/" "$to/$parts/"
}

main
