<?php

namespace App\Gamee;

class Request
{

    public static function uri()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

}
