<?php
/**
 * Created by PhpStorm.
 * User: ean
 * Date: 13.11.2017
 * Time: 17:22
 */

namespace Model;


class LoginModel
{
    public $login;
    public $password;
    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
    }
    public function isValid()
    {
        return !empty($this->login) && !empty($this->password);
    }
}