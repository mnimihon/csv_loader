<?php

namespace app\Views;

class Loader extends View
{

    public function getTitle(): string
    {
        return 'Загрузчик';
    }

    public function getView(): string
    {
        return 'Loader';
    }
}