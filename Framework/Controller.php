<?php
/**
 * Created by PhpStorm.
 * User: ean
 * Date: 19.10.2017
 * Time: 15:17
 */

namespace Framework;

abstract class Controller
{
    const DEFAULT_LAYOUT = 'layout.html';
    const ADMIN_LAYOUT = 'layoutAdmin.html';

    protected $layout = self::DEFAULT_LAYOUT;

    protected $container;
    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;
    }
    public function setLayout(Request $request)
    {
        $uri = $request->getUri();
        if (strpos($uri, '/admin') === 0) {
            $this->layout = self::ADMIN_LAYOUT;
        }
    }
    protected function render($view, array $articles = [])
    {
        extract($articles);
        $path = str_replace(['Controller', '\\'], '', get_class($this));
        $file = VIEW_DIR . $path . DS. $view;
        if (!file_exists($file)) {
            throw new \Exception("{$file} not found");
        }
        ob_start();
        require $file;
        $content =  ob_get_clean();

        ob_start();
        require VIEW_DIR . $this->layout;
        $body =  ob_get_clean();

        return new Response($body);
    }
}