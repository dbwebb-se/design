/**
 * @preserve Setup the basis for the responsive menu.
 * @author Mikael Roos <mos@dbwebb.se>
 * @see {@link https://github.com/janaxs/responsive-menu}
 */
(function() {
    "use strict";

    // Get the items needed for the menu to work.
    var body = document.getElementsByTagName("body")[0];
    var menuButton = document.getElementById("rm-menu-button");
    var menu = document.getElementById("rm-menu");
    var menuMax = document.querySelector(".rm-max #rm-menu");
    var submenus = document.getElementsByClassName("rm-submenu-button");

    // To support WordPress submenus
    var submenuswp = document.getElementsByClassName("sub-menu");



    /**
     * Set the size of the max menu.
     */
    var setMaxMenuSize = function() {
        if (menuMax === null) {
            return;
        }

        menuMax.style.width  = window.innerWidth + "px";
        menuMax.style.height = window.innerHeight + "px";
    };

    setMaxMenuSize();


    /**
     * Show submenu where ever a li item holds a submenu. Used as callback
     * for li click events but only valid for the mobile version. The desktop
     * version uses hover instead och click events.
     */
    var showSubmenu = function(event) {
        //console.log("Show submenu");

        if (this.parentNode.classList.contains("rm-desktop")) {
            //console.log("Cancel show submenu");
            return;
        }

        this.parentElement.classList.toggle("rm-submenu-open");
        this.parentElement.querySelector("ul").classList.toggle("rm-show-submenu");

        //event.preventDefault();
        event.stopPropagation();
    };



    /**
     * Add eventlisteners for each li holding a submenu
     */
    Array.prototype.filter.call(submenus, function(element) {
        element.addEventListener("click", showSubmenu);
        //console.log("found submenu");
    });

    // To support WordPress menus
    Array.prototype.filter.call(submenuswp, function(element) {
        // Add a clickable button to (max) menu
        var button = document.createElement("a");

        button.setAttribute("href", "#");
        button.setAttribute("class", "rm-submenu-button");
        button.addEventListener("click", showSubmenu);
        element.parentNode.insertBefore(button, element.parentNode.firstChild);

        //element.parentNode.addEventListener("click", showSubmenu);
        //console.log("found submenuwp");
    });



    /**
     * Show the menu when clicking on the closed (mobile) menu button.
     */
    menuButton.addEventListener("click", function(event) {
        // Toggle display of menu
        menu.classList.toggle("rm-clicked");
        menuButton.classList.toggle("rm-clicked");
        body.classList.toggle("rm-modal");

        // Toggle between desktop and mobile menu when no max menu enabled.
        if (menuMax === null) {
            menu.classList.toggle("rm-mobile");
            menu.classList.toggle("rm-desktop");
        }

        event.preventDefault();
        event.stopPropagation();
    });



    /**
     * Prevent touch event scrolling & closing maxmenu on iOS
     */
    /*
    menuMax.addEventListener("scroll", function(event) {
        event.stopPropagation();
    });
*/



    /**
     *
     */
    /*
    var clearMenu = function (event) {
        //console.log("Clear menu");
        // Add desktop and remove mobile, but not if max menu is enabled
        if (menuMax === null) {
            menu.classList.remove("rm-mobile");
            menu.classList.add("rm-desktop");
        }

        // Remove clicked items
        body.classList.remove("rm-modal");
        menuButton.classList.remove("rm-clicked");
        menu.classList.remove("rm-clicked");

        event.preventDefault();
    };
*/

    window.addEventListener("resize", function(/* event */) {
        //clearMenu(event);
        setMaxMenuSize();
    });
    //document.addEventListener("click", clearMenu);
})();
