<?php
/**
 * Created by PhpStorm.
 * User: ean
 * Date: 02.11.2017
 * Time: 16:48
 */

namespace Framework;


class Response
{
    private $body;
    public function __construct($body)
    {
        $this->body = $body;
    }

    public function __toString()
    {
        return (string) $this->body;
    }
}