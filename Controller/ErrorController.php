<?php
/**
 * Created by PhpStorm.
 * User: ean
 * Date: 16.11.2017
 * Time: 16:39
 */

namespace Controller;


use Framework\Controller;
use Framework\Request;

class ErrorController extends Controller
{
    private $exception;
    public function __construct(\Exception $exception)
    {
        $this->exception = $exception;
    }

    public function errorAction()
    {
        $message = $this->exception->getMessage();
        return $this->render('error.html', ['message' => $message]);
    }
}