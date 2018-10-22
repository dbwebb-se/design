<?php

namespace Anax\Navigation;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * Helper to create a navbar for sites by reading its configuration from file
 * and then applying some code while rendering the resultning navbar.
 *
 */
class Navbar
{
    use ContainerInjectableTrait;



    /**
     * Create an url.
     *
     * @param: string $url where to create the url.
     *
     * @return string as the url create.
     */
    public function url($url)
    {
        return $this->di->get("url")->create($url);
    }



    /**
     * Callback tracing the current selected menu item base on scriptname.
     *
     * @param: string $url to check for.
     *
     * @return boolean true if item is selected, else false.
     */
    public function check($url)
    {
        if ($url == $this->di->get("request")->getCurrentUrl(false)) {
            return true;
        }
    }



    /**
     * Create an url.
     *
     * @param: string $url where to create the url.
     *
     * @return string as the url create.
     */
    public function isParent($parent)
    {
        $route = $this->di->get("request")->getRoute();
        return !substr_compare($parent, $route, 0, strlen($parent));
    }



    /**
     * Create a navigation bar/menu, with submenus.
     *
     * @param array $config with configuration for the menu.
     *
     * @return string with html for the menu.
     */
    public function createMenuWithSubMenus($config)
    {
        $default = [
            "id"      => null,
            "class"   => null,
            "wrapper" => "nav",
        ];
        $menu = array_replace_recursive($default, $config);
        //$menu = array_replace_recursive($menu, $menus[$menuName]);

        // Create the ul li menu from the array, use an anonomous recursive
        // function that returns an array of values.
        $createMenu = function (
            $items,
            $ulId = null,
            $ulClass = null
        ) use (
            &$createMenu
        ) {

            $html = null;
            $hasItemIsSelected = false;

            foreach ($items as $item) {
                // has submenu, call recursivly and keep track on if the submenu has a selected item in it.
                $subMenu        = null;
                $subMenuButton  = null;
                $subMenuClass   = null;
                $selectedParent = null;

                if (isset($item["submenu"])) {
                    list($subMenu, $selectedParent) = $createMenu($item["submenu"]["items"]);
                    $selectedParent = $selectedParent
                        ? "selected-parent "
                        : null;
                    $subMenuButton = "<a class=\"rm-submenu-button\" href=\"#\"></a>";
                    $subMenuClass = "rm-submenu";
                }

                // Check if the current menuitem is selected
                if (!isset($item["url"])) {
                    var_dump($item);
                }
                $selected = $this->check($item["url"])
                    ? "selected "
                    : null;

                // Check if the menuitem is a parent of current page, /controller for /controller/action
                $isParent = null;
                if (isset($item["mark-if-parent"]) && $item["mark-if-parent"] == true) {
                    $isParent = $this->isParent($item["url"])
                        ? "selected-parent "
                        : null;
                }

                // Is there a class set for this item, then use it
                $class = isset($item["class"]) && ! is_null($item["class"])
                    ? $item["class"]
                    : null;

                // Prepare the class-attribute, if used
                $class = ($selected || $selectedParent || $isParent || $class)
                    ? " class=\"{$selected}{$selectedParent}{$isParent}{$class}{$subMenuClass}\" "
                    : null;

                // Add the menu item
                // $url = $menu["create_url"]($item["url"]);
                $url = $this->url($item["url"]);
                $html .= "\n<li{$class}>{$subMenuButton}<a href='{$url}' title='{$item['title']}'>{$item['text']}</a>{$subMenu}</li>\n";

                // To remember there is selected children when going up the menu hierarchy
                if ($selected) {
                    $hasItemIsSelected = true;
                }
            }

            // Return the menu
            return array("\n<ul$ulId$ulClass>$html</ul>\n", $hasItemIsSelected);
        };

        // Call the anonomous function to create the menu, and submenues if any.
        $id = isset($menu["id"])
            ? " id=\"{$menu["id"]}\""
            : null;
        $class = isset($menu["class"])
            ? " class=\"{$menu["class"]}\""
            : null;

        list($html) = $createMenu(
            $menu["items"],
            $id,
            $class
        );

        // Set the id & class element, only if it exists in the menu-array
        $wrapper = $menu["wrapper"];
        if ($wrapper) {
            $html = "<{$wrapper}>{$html}</{$wrapper}>";
        }

        return "\n{$html}\n";
    }
}


    // /**
    //  * Callback tracing the current selected menu item base on scriptname
    //  *
    //  */
    // "callback" => function ($url) {
    //     if ($url == $this->di->get("request")->getCurrentUrl(false)) {
    //         return true;
    //     }
    // },
    // 
    // 
    // 
    // /**
    //  * Callback to check if current page is a decendant of the menuitem, this check applies for those
    //  * menuitems that has the setting "mark-if-parent" set to true.
    //  *
    //  */
    // "is_parent" => function ($parent) {
    //     $route = $this->di->get("request")->getRoute();
    //     return !substr_compare($parent, $route, 0, strlen($parent));
    // },



   /**
     * Callback to create the url, if needed, else comment out.
     *
     */
   /*
    "create_url" => function ($url) {
        return $this->di->get("url")->create($url);
    },
    */
