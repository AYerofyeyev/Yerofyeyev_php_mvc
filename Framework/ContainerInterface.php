<?php
/**
 * Created by PhpStorm.
 * User: ean
 * Date: 08.11.2017
 * Time: 11:39
 */

namespace Framework;


interface ContainerInterface
{
    public function get($key);
}