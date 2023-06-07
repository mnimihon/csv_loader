<?php

namespace app\Core\Http;

class Response
{
    public function redirect($url)
    {
        header('Location: ' . $url);
    }
}