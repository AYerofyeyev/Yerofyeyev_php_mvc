<?php
/**
 * Created by PhpStorm.
 * User: ean
 * Date: 13.11.2017
 * Time: 17:03
 */

namespace Controller;

use Framework\Controller;
use Framework\Request;
use Model\LoginModel;

class SecurityController extends Controller
{
    public function loginAction(Request $request)
    {

    }

    public function logoutAction()
    {
        $this
            ->container
            ->get('router')
            ->redirect('index.php');
    }
}