<?php
/**
 * Created by PhpStorm.
 * User: ean
 * Date: 03.11.2017
 * Time: 17:05
 */

namespace Framework;


class Router
{
    public function redirect($to)
    {
        header("Location: {$to}");
        die();
    }
}