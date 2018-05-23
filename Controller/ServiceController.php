<?php
/**
 * Created by PhpStorm.
 * User: ean
 * Date: 18.10.2017
 * Time: 16:43
 */

namespace Controller;

use Framework\Controller;
use Framework\Request;

class ServiceController extends Controller
{
    public function mobileAction(Request $request)
    {
        return $this->render('mobile.html');
    }
    public function landingAction(Request $request)
    {
        return $this->render('landing.html');
    }
    public function infoPortalAction(Request $request)
    {
        return $this->render('infoPortal.html');
    }
    public function corporativeAction(Request $request)
    {
        return $this->render('corporative.html');
    }
}