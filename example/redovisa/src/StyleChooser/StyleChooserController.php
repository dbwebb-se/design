<?php

namespace Anax\StyleChooser;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * Style chooser controller loads available stylesheets from a directory and
 * lets the user choose the stylesheet to use.
 */
class StyleChooserController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;



    /**
     * @var string $cssUrl The baseurl to where the css files are.
     * @var string $cssDir The path to the directory storing css files.
     * @var array  $styles The styles available in the style directory.
     * @var string $key    The session key used to store the active style.
     */
    private $cssUrl = "css";
    private $cssDir = ANAX_INSTALL_PATH . "/htdocs/css";
    private $styles = [];
    private static $key = "AnaxStyleChooser";



    /**
     * Get the session key to use to retrieve the active stylesheet.
     *
     * @return string
     */
    public static function getSessionKey() : string
    {
        return self::$key;
    }



    /**
     * The initialize method is optional and will always be called before the
     * target method/action. This is a convienient method where you could
     * setup internal properties that are commonly used by several methods.
     *
     * @return void
     */
    public function initialize() : void
    {
        foreach(glob("{$this->cssDir}/*.css") as $file) {
            $filename = basename($file);
            $url = "{$this->cssUrl}/$filename";
            $content = file_get_contents($file);
            $comment = strstr($content, "*/", true);
            $comment = preg_replace(["#\/\*!#", "#\*#"], "", $comment);
            $comment = preg_replace("#@#", "<br>@", $comment);
            $first = strpos($comment, ".");
            $short = substr($comment, 0, $first + 1);
            $long = substr($comment, $first + 1);
            $this->styles[$url] = [
                "shortDescription" => $short,
                "longDescription" => $long,
            ];
        }

        foreach ($this->styles as $key => $value) {
            $isMinified = strstr($key, ".min.css", true);
            if ($isMinified) {
                unset($this->styles["$isMinified.css"]);
            }
        }
    }



    /**
     * Display the stylechooser with details on current selected style.
     *
     * @return object
     */
    public function indexAction() : object
    {
        $title = "Stylechooser";

        $page = $this->di->get("page");
        $session = $this->di->get("session");

        $active = $session->get(self::$key, null);

        $page->add("anax/stylechooser/index", [
            "styles" => $this->styles,
            "activeStyle" => $active,
            "activeShortDescription" => $this->styles[$active]["shortDescription"] ?? null,
            "activeLongDescription" => $this->styles[$active]["longDescription"] ?? null,
        ]);

        return $page->render([
            "title" => $title,
        ]);
    }



    /**
     * Update current selected style.
     *
     * @return object
     */
    public function updateActionPost() : object
    {
        $response = $this->di->get("response");
        $request = $this->di->get("request");
        $session = $this->di->get("session");
        $key = $request->getPost("stylechooser");

        $flashMessage = null;
        if ($key === "none") {
            $session->set("flashmessage", "Unsetting the style and using deafult style.");
            $session->set(self::$key, null);
        } elseif (array_key_exists($key, $this->styles)) {
            $session->set("flashmessage", "Using the style '$key'.");
            $session->set(self::$key, $key);
        }

        return $response->redirect("style");
    }



    /**
     * Update current selected style using a GET url and redirect to last
     * page visited.
     *
     * @param string $style the key to the style to use.
     *
     * @return object
     */
    public function updateActionGet($style) : object
    {
        $response = $this->di->get("response");
        $request = $this->di->get("request");
        $session = $this->di->get("session");

        $key = $this->cssUrl . "/" . $style . ".css";
        $keyMin = $this->cssUrl . "/" . $style . ".min.css";

        $flashMessage = null;
        if ($style === "none") {
            $session->set("flashmessage", "Unsetting the style and using the default style.");
            $session->set(self::$key, null);
        } elseif (array_key_exists($keyMin, $this->styles)) {
            $session->set("flashmessage", "Now using the style '$keyMin'.");
            $session->set(self::$key, $keyMin);
        } elseif (array_key_exists($key, $this->styles)) {
            $session->set("flashmessage", "Now using the style '$key'.");
            $session->set(self::$key, $key);
        }

        $url = $session->getOnce("redirect", "style");
        return $response->redirect($url);
    }
}
