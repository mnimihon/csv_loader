<?php

namespace app\Core\Http;

class Uri
{

    private $action;
    private $controller;

    public function __construct()
    {
        $this->setLocationMethod();
    }

    public function getLocationPart()
    {
        $uriArray = explode('?', $_SERVER['REQUEST_URI']);
        return $uriArray[0];
    }

    private function setLocationMethod()
    {
        $uriComponents = explode('/', self::getLocationPart());
        $this->action = $uriComponents[2] ?? null;
        $this->controller = $uriComponents[1] ?? null;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getController()
    {
        return $this->controller;
    }
}