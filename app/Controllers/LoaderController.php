<?php

namespace app\Controllers;

use app\Core\Http\Response;
use app\Services\CsvLoader\CsvLoaderProducts;
use app\Views\Loader;

class LoaderController extends Controller
{

    public function actionIndex()
    {
        (new Loader)->render();
    }

    public function actionLoad()
    {
        (new CsvLoaderProducts())->load($_FILES);
        (new Response)->redirect('/table');
    }
}