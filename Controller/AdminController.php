<?php
/**
 * Created by PhpStorm.
 * User: ean
 * Date: 15.11.2017
 * Time: 15:13
 */

namespace Controller;


use Framework\Controller;
use Framework\Request;
use Framework\Session;
use Model\Entity\Project;
use Model\Entity\User;
use Model\ProjectModel;

class AdminController extends Controller
{
    public function indexAction(Request $request)
    {
        if(Session::has('login')) {
            $form = new ProjectModel(
                $request->post('projectTitle'),
                $request->post('projectLink'),
                $request->post('projectDescription') //add to request file upload
            );
            if($request->isPost()){
                $project = new Project(
                    $form->title,
                    $form->link,
                    $form->description);
                $repository = $this
                    ->container
                    ->get('repositoryManager')
                    ->createRepository('Project');
                $repository->save($project);
            }
            $repository = $this
                ->container
                ->get('repositoryManager')
                ->createRepository('User');

            $users = $repository->getAll();

            $repository = $this
                ->container
                ->get('repositoryManager')
                ->createRepository('ContactUs');
            $feedbacks = $repository->getAll();
            Session::set('login', true);
            return $this->render('index.html', ['users' => $users, 'feedbacks' => $feedbacks]);
        }
        return $this->container->get('router')->redirect('index.php?controller=default&action=login');
    }
    public function addUserAction(Request $request)
    {
        if(Session::has('login')) {
            if($request->isPost()) {
                $form = new User(
                    $request->post('addLogin'),
                    $request->post('addPassword')
                );
            }
            Session::set('login', true);
            return $this->render('addUser.html');
        }
         return $this->container->get('router')->redirect('index.php?controller=default&action=login');
    }
}