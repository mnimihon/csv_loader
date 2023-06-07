<?php

namespace app\Core\Http;

class Request
{

    public function getUri(): Uri
    {
        return new Uri;
    }
}