<?php
/**
 * Created by PhpStorm.
 * User: ean
 * Date: 18.10.2017
 * Time: 15:39
 */

namespace Framework;


class Request
{
    private $get = [];
    private $post = [];
    private $server =[];

    public function __construct($get, $post, $server)
    {
        $this->get = $get;
        $this->post = $post;
        $this->server = $server;
    }

    public function get($key, $default = null)
    {
        return isset($this->get[$key]) ? $this->get[$key] : $default;
    }
    public function post($key, $default = null)
    {
        return isset($this->post[$key]) ? $this->post[$key] : $default;
    }
    public function server($key, $default = null)
    {
        return isset($this->server[$key]) ? $this->server[$key] : $default;
    }
    public function isPost()
    {
        return (bool) $this->post;
    }
    public function getClient()
    {
        return $this->server('REMOTE_ADDR');
    }
    public function getUri()
    {
        return $this->server('REQUEST_URI');
    }
}