<?php


class Router
{
    private $routes;

    public function __construct()
    {
        $routesPatch = ROOT."/config/routes.php";
        $this->routes = include ($routesPatch);
    }

    private function getUri () {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], "/");
        }
    }

    public function Run () {
        $uri = $this->getUri();
        foreach ($this->routes as $uriPattern => $patch) {
            if (preg_match("~$uriPattern~", $uri)) {
                $internalRoute = preg_replace("~$uriPattern~", $patch, $uri);
                $segments = explode("/", $internalRoute);
                $controllerName = array_shift($segments)."Controller";
                $controllerName = ucfirst($controllerName);
                $actionName = "action".ucfirst(array_shift($segments));
                $controllerFile = ROOT."/controllers/".$controllerName.".php";
                if (file_exists($controllerFile)) {
                    include_once ($controllerFile);
                    $controllerObject = new $controllerName;
                    $parametrs = $segments;
                    $result = call_user_func_array(array($controllerObject, $actionName), $parametrs);
                    if ($result != null) {
                        break;
                    }
                }
            }
        }
    }
}