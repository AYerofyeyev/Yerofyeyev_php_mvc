<?php
/**
 * Created by PhpStorm.
 * User: ean
 * Date: 18.10.2017
 * Time: 12:43
 */

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__ . DS . '..' . DS);
define('VIEW_DIR', ROOT . 'View' . DS);
define('CONF_DIR', ROOT . 'config' . DS);

spl_autoload_register(function ($className){
    $path = ROOT . str_replace('\\', DS, $className) . '.php';
    if (!file_exists($path)){
        throw new \Exception("<main style='color: black;'><h5>{$path} not found</h5></main>");
    }
    require $path;
});
try {
    \Framework\Session::start();

    $dbConfig = require CONF_DIR . 'db.php';
    $db = new \PDO($dbConfig['dsn'], $dbConfig['user'], $dbConfig['password']);
    $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    $container = new \Framework\Container();
    $router = new \Framework\Router();
    $repositoryManager = new \Framework\RepositoryManager();
    $repositoryManager->setDb($db);

    $container->set('router', $router);
    $container->set('repositoryManager', $repositoryManager);

    $request = new \Framework\Request($_GET, $_POST, $_SERVER);
    $controller = $request->get('controller', 'default');
    $action = $request->get('action', 'index');
    $controller = '\\Controller\\' .  ucfirst($controller). 'Controller';
    $controller = new $controller();
    $controller->setContainer($container);
    $controller->setLayout($request);
    $action = $action . 'Action';
    if (!method_exists($controller, $action)){
        throw new \Exception("<main style='color: black;'><h5>{$action} not found</h5></main>");
    }
    $content = $controller->$action($request);
} catch (\Exception $e){
    $controller = new \Controller\ErrorController($e);
    $content = $controller->errorAction();
}
echo $content;
