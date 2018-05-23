<?php
/**
 * Created by PhpStorm.
 * User: ean
 * Date: 08.11.2017
 * Time: 12:00
 */

namespace Framework;


class Container implements ContainerInterface
{
    private $options = [];
    public function get($key)
    {
        if (isset($this->options[$key])) {
            return $this->options[$key];
        }
        return null;
    }
    public function set($key, $option)
    {
        $this->options[$key] = $option;
        return $this;
    }
}