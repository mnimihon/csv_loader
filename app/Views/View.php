<?php

namespace app\Views;

abstract class View
{

    public function render()
    {
        include $this->getTemplate();
    }

    abstract function getTitle(): string;

    abstract function getView(): string;

    protected function getTemplate(): string
    {
        return __DIR__ . '/../Web/default_template.php';
    }

    protected function getStyle(): string
    {
        return 'app/Web/css/style.css';
    }
}