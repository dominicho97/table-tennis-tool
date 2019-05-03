<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

session_start();

// $_SESSION['name'] = ["id"=>"1", "user"=>"jimmy", "room"=>"1"];

$_name = $_SESSION['name'] ?? '';

$_thisPage = $_GET['page'] ?? '';

if($_name == '' && $_thisPage != 'login'){
  header('Location: users.php?page=login');
} elseif(basename($_SERVER['PHP_SELF'], '.php') == 'index'){
  header('Location: calander.php');
}

$routes = array(
  'calander' => array(
    'controller' => 'Calander',
    'action' => 'index'
  ),
  'login' => array(
    'controller' => 'Users',
    'action' => 'login'
  ),
);

if (empty($routes[basename($_SERVER['PHP_SELF'], '.php')])) {
  header('Location: calander.php');
}

empty($_GET['page']) ? $_page = '' : $_page = '-' . $_GET['page'];

$route = $routes[basename($_SERVER['PHP_SELF'], '.php') . $_page];
$controllerName = $route['controller'] . 'Controller';

require_once __DIR__ . '/controller/' . $controllerName . ".php";

$controllerObj = new $controllerName();
$controllerObj->route = $route;
$controllerObj->filter();
$controllerObj->render();
