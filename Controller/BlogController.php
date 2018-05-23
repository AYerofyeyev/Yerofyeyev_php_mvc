<?php
/**
 * Created by PhpStorm.
 * User: ean
 * Date: 20.10.2017
 * Time: 10:23
 */

namespace Controller;

use Framework\Controller;
use Framework\Request;

class BlogController extends Controller
{
    public function indexAction(Request $request)
    {
        $id = $request->get('id');
        $repository = $this
            ->container
            ->get('repositoryManager')
            ->createRepository('Blog');

        $blog = $repository->get($id);
        return $this->render('index.html', ['blog' => $blog]);
    }
}