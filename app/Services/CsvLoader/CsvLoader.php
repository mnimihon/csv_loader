<?php

namespace app\Services\CsvLoader;

abstract class CsvLoader
{

    abstract protected function getRows(array $file): \Generator;

    abstract function load(array $file);
}