<?php

namespace app\Views;

class Table extends View
{

    public function getTitle(): string
    {
        return 'Таблица';
    }

    public function getView(): string
    {
        return 'Table';
    }
}