/**
 * Generate CSS code for grid.
 */

/* eslint no-unused-vars: ["error", { "varsIgnorePattern": "generateGrid" }] */

/**
 * To generate a CSS grid.
 */
function generateGrid() {
    "use strict";

    var element         = document.getElementById("grid");
    var output          = document.getElementById("output");
    var columns         = Number.parseInt(element[0].value);
    var columnWidth     = Number.parseInt(element[1].value);
    var gutterWidth     = Number.parseInt(element[2].value);
    var gridWidthType   =element[3].value;
    var gridSystemWidth =  columns * (columnWidth + gutterWidth);
    var totalWidth;
    var css;
    var width;

    if (gridWidthType === "%") {
        totalWidth = 100;
    } else {
        totalWidth = gridSystemWidth;
    }

    css  = "/**\n";
    css += " * Grid: " +
        columns + "-" + columnWidth +
        "-"+ gutterWidth + "-" + totalWidth +
        gridWidthType + "\n";
    css += " * Grid classes for:\n";
    css += " *  columns:       " + columns + "\n";
    css += " *  columnWidth:   " + columnWidth + "\n";
    css += " *  gutterWidth:   " + gutterWidth + "\n";
    css += " *  gridWidthType: " + gridWidthType + "\n";
    css += " *  totalWidth:    " + totalWidth + gridWidthType + "\n";
    css += " */\n\n";

    css += "/* Style for the row */\n";
    css += ".row {\n";
    css += "    display: block;\n";
    //width = totalWidth  / gridSystemWidth * (gutterWidth + gridSystemWidth);
    width = totalWidth  / gridSystemWidth * gridSystemWidth;
    css += "    width: " + width + gridWidthType + ";\n";
    width = -totalWidth / gridSystemWidth * gutterWidth / 2;
    //css += "    margin: 0 " + width + gridWidthType + ";\n";
    css += "    margin: 0;\n";
    css += "}\n\n";

    //width: @total-width*((@gutter-width + @gridsystem-width)/@gridsystem-width);
    //margin: 0 @total-width*(((@gutter-width*.5)/@gridsystem-width)*-1);

    css += "/* A small clearfix: " +
        "http://stackoverflow.com/questions/211383/what-methods-of-clearfix-can-i-use */\n";
    css += ".row::after {\n";
    css += "    content: \"\";\n";
    css += "    display: block;\n";
    css += "    clear: both;\n";
    css += "}\n\n";

    css += "/* Style for each column */\n";
    for (var i = 1; i <= columns; i++) {
        css += ".columns-" + i + " {\n";
        css += "    display: inline;\n";
        css += "    float: left;\n";
        width = totalWidth / gridSystemWidth * (((columnWidth + gutterWidth) * i ) - gutterWidth);
        css += "    width: " + width + gridWidthType + ";\n";
        width =  totalWidth / gridSystemWidth * gutterWidth / 2;
        css += "    margin: 0 " + width + gridWidthType + ";\n";
        css += "}\n\n";
    }

    css += "/* Push column */\n";
    for (i = 1; i <= columns + 4; i++) {
        css += ".push-" + i + " {\n";
        width = totalWidth  / gridSystemWidth *
            i * (gutterWidth + columnWidth) + totalWidth / gridSystemWidth * gutterWidth / 2;
        css += "    margin-left: " + width + gridWidthType + ";\n";
        css += "}\n\n";
    }

    css += "/* Pull column (left or right) */\n";
    for (i = 1; i <= columns + 4; i++) {
        css += ".pull-" + i + " {\n";
        width = - totalWidth / gridSystemWidth *
            i * (gutterWidth + columnWidth) + totalWidth / gridSystemWidth * gutterWidth / 2;
        css += "    margin-left: " + width + gridWidthType + ";\n";
        css += "}\n\n";

        css += ".pull-right-" + i + " {\n";
        width = - totalWidth / gridSystemWidth *
            i * (gutterWidth + columnWidth) + totalWidth / gridSystemWidth * gutterWidth / 2;
        css += "    margin-right: " + width + gridWidthType + ";\n";
        css += "}\n\n";
    }

    output.innerHTML = "<pre>" + css + "</pre>";
}
