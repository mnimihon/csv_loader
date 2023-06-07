<?php

namespace app\Core;

use app\Core\Http\Uri;

class Router
{

    const DEFAULT_ACTION = 'Index';
    const DEFAULT_CONTROLLER = 'Loader';

    public static function run()
    {
        $uri = new Uri;
        $controllerClass = self::getControllerClass($uri);
        $actionMethod = self::getActionMethod($uri);
        (new $controllerClass)->$actionMethod();
    }

    public static function getActionMethod(Uri $uri): string
    {
        $actionName = $uri->getAction() ?: self::DEFAULT_ACTION;
        return 'action' . ucfirst($actionName);
    }

    public static function getControllerClass(Uri $uri): string
    {
        $controllerName = $uri->getController() ?: self::DEFAULT_CONTROLLER;
        return 'app\\Controllers\\' . ucfirst($controllerName) . 'Controller';
    }
}