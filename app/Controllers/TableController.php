<?php

namespace app\Controllers;

use app\Core\Http\Response;
use app\Models\Products;
use app\Views\Table;

class TableController extends Controller
{

    public function actionIndex()
    {
        (new Table)->render();
    }

    public function actionDelete()
    {
        (new Products)->delete(true);
        (new Response)->redirect('/table');
    }
}