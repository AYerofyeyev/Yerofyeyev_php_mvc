<?php
/**
 * Created by PhpStorm.
 * User: ean
 * Date: 03.11.2017
 * Time: 14:20
 */

namespace Model;


class ContactUsModel
{
    public $name;
    public $email;
    public $phone;
    public $message;
    public $options;
    public $ip;

    public function __construct($name, $email, $phone, $message, $options, $ip)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->message = $message;
        $this->options = $options;
        $this->ip = $ip;
    }

    public function isValid()
    {
        return !empty($this->email) && !empty($this->message);
    }
}
