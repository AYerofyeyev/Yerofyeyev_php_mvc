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
use Framework\Session;
use Model\ContactUsModel;
use Model\Entity\ContactUs;
use Model\LoginModel;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        if(Session::has('login')){
            Session::remove('login');
        }
        $form = new ContactUsModel(
            $request->post('name'),
            $request->post('email'),
            $request->post('phone'),
            $request->post('message'),
            $request->post('options'),
            $request->getClient()
        );
        if ($request->isPost()){
            if ($form->isValid()){
                $contactUs = new ContactUs(
                    $form->name,
                    $form->email,
                    $form->phone,
                    $form->message,
                    $form->options,
                    $form->ip);
                $repository = $this
                    ->container
                    ->get('repositoryManager')
                    ->createRepository('ContactUs');
                $repository->save($contactUs);
                Session::setFlash('success');
                $this->container->get('router')->redirect('index.php?controller=default&action=index');
            }
            Session::setFlash('fail');
        }
        return $this->render('index.html', ['form' => $form, 'hint' => Session::getFlash()]);
    }
    public function serviceAction(Request $request)
    {
        if(Session::has('login')){
            Session::remove('login');
        }
        $form = new ContactUsModel(
            $request->post('name'),
            $request->post('email'),
            $request->post('phone'),
            $request->post('message'),
            $request->post('options'),
            $request->getClient()
        );
        if ($request->isPost()){
            if ($form->isValid()){
                $contactUs = new ContactUs(
                    $form->name,
                    $form->email,
                    $form->phone,
                    $form->message,
                    $form->options,
                    $form->ip);
                $repository = $this
                    ->container
                    ->get('repositoryManager')
                    ->createRepository('ContactUs');
                $repository->save($contactUs);
                Session::setFlash('success');
                $this->container->get('router')->redirect('index.php?controller=default&action=service');
            }
            Session::setFlash('fail');
        }
        return $this->render('service.html');
    }
    public function blogAction(Request $request)
    {
        if(Session::has('login')){
            Session::remove('login');
        }
        $repository = $this
            ->container
            ->get('repositoryManager')
            ->createRepository('Blog');

        $blogs = $repository->getAll();

        $form = new ContactUsModel(
            $request->post('name'),
            $request->post('email'),
            $request->post('phone'),
            $request->post('message'),
            $request->post('options'),
            $request->getClient()
        );
        if ($request->isPost()){
            if ($form->isValid()){
                $contactUs = new ContactUs(
                    $form->name,
                    $form->email,
                    $form->phone,
                    $form->message,
                    $form->options,
                    $form->ip);
                $repository = $this
                    ->container
                    ->get('repositoryManager')
                    ->createRepository('ContactUs');
                $repository->save($contactUs);
                Session::setFlash('success');
                $this->container->get('router')->redirect('index.php?controller=default&action=blog');
            }
            Session::setFlash('fail');
        }

        return $this->render('blog.html', ['blogs' => $blogs]);
    }
    public function latestWorksAction(Request $request)
    {
        if(Session::has('login')){
            Session::remove('login');
        }
        $form = new ContactUsModel(
            $request->post('name'),
            $request->post('email'),
            $request->post('phone'),
            $request->post('message'),
            $request->post('options'),
            $request->getClient()
        );
        if ($request->isPost()){
            if ($form->isValid()){
                $contactUs = new ContactUs(
                    $form->name,
                    $form->email,
                    $form->phone,
                    $form->message,
                    $form->options,
                    $form->ip);
                $repository = $this
                    ->container
                    ->get('repositoryManager')
                    ->createRepository('ContactUs');
                $repository->save($contactUs);
                Session::setFlash('success');
                $this
                    ->container
                    ->get('router')
                    ->redirect('index.php?controller=default&action=latestWorks');
            }
            Session::setFlash('fail');
        }
        $repository = $this
            ->container
            ->get('repositoryManager')
            ->createRepository('Project');

        $projects = $repository->getAll();
        return $this->render('latestWorks.html', ['projects' => $projects]);
    }
    public function contactUsAction(Request $request)
    {
        if(Session::has('login')){
            Session::remove('login');
        }
        $form = new ContactUsModel(
            $request->post('name'),
            $request->post('email'),
            $request->post('phone'),
            $request->post('message'),
            $request->post('options'),
            $request->getClient()
        );
        if ($request->isPost()){
            if ($form->isValid()){
                $contactUs = new ContactUs(
                    $form->name,
                    $form->email,
                    $form->phone,
                    $form->message,
                    $form->options,
                    $form->ip);
                $repository = $this
                    ->container
                    ->get('repositoryManager')
                    ->createRepository('ContactUs');
                $repository->save($contactUs);
                Session::setFlash('success');
                $this->container->get('router')->redirect('index.php?controller=default&action=contactUs');
            }
            Session::setFlash('fail');
        }
        return $this->render('contactUs.html', ['form' => $form, 'hint' => Session::getFlash()]);
    }
    public function loginAction(Request $request)
    {
        if(Session::has('login')){
            Session::remove('login');
        }
        $form = new LoginModel(
            $request->post('login'),
            $request->post('password')
        );

        if($request->isPost()) {
            if ($form->isValid()) {
                $repository = $this
                    ->container
                    ->get('repositoryManager')
                    ->createRepository('User');

                $user = $repository->check($form->login);
                if ($user && $user->getActive()) {
                    if ($user->getPassword() === $form->password) {
                        Session::set('login', true);
                        $this->container->get('router')->redirect('index.php?controller=admin&action=index');
                    }
                }
            }
            Session::setFlash("<p style='color:black;'>Invalid</p>");
        }
        return $this->render('login.html', ['form' => $form, 'hint' => Session::getFlash()]);
    }
    public function aboutUsAction(Request $request)
    {
        if(Session::has('login')){
            Session::remove('login');
        }
        $form = new ContactUsModel(
            $request->post('name'),
            $request->post('email'),
            $request->post('phone'),
            $request->post('message'),
            $request->post('options'),
            $request->getClient()
        );
        if ($request->isPost()){
            if ($form->isValid()){
                $contactUs = new ContactUs(
                    $form->name,
                    $form->email,
                    $form->phone,
                    $form->message,
                    $form->options,
                    $form->ip);
                $repository = $this
                    ->container
                    ->get('repositoryManager')
                    ->createRepository('ContactUs');
                $repository->save($contactUs);
                Session::setFlash('success');
                $this->container->get('router')->redirect('index.php?controller=default&action=aboutUs');
            }
            Session::setFlash('fail');
        }
        return $this->render('aboutUs.html');
    }
}