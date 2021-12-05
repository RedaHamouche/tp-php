<?php
session_start();
ini_set('display_errors',1); 
error_reporting(E_ALL);
require_once $_SERVER["DOCUMENT_ROOT"]."/config/bootstrap.php";
require($_SERVER["DOCUMENT_ROOT"]."/controller/FrontEndController.php");

// include_once './php-router/Request.php';
// include_once './php-router/Router.php';
// $router = new Router(new Request);

// $router->get('/test', function() {
//     return <<<HTML
//     <h1>Hello world</h1>
//   HTML;
//   });
  
  
//   $router->get('/profile', function($request) {
//     return <<<HTML
//     <h1>Profile</h1>
//   HTML;
//   });
  
//   $router->post('/data', function($request) {
  
//     return json_encode($request->getBody());
//   });

$path = explode("?", $_SERVER['REQUEST_URI']);
switch ($path[0]) {
    case '/ds':
        echo 'ok';
        break;
    case '/addView':
        require PROJECTPATH . "/views/addView.php";
        break;
    case '/addArticle':
        PostController::addPost();
        break;
    case '/show':
        FrontEndController::showPost();
        break;
    case '/signup':
        require PROJECTPATH . "/views/signup.php";
        break;
    case '/addUser':
        UserController::addUser();
        break;
    case '/logout':
        session_destroy();
        header('Location: /');
        break;
    case '/login':
        require PROJECTPATH . "/views/login.php";
        break;
    case '/logUser':
        UserController::logUser();
        break;
    case '/delete':
        PostController::deletePost();
        break;
    case '/updateArticle':
        PostController::updatePost();
        break;
    case '/usersView':
        UserController::getUsers();
        break;
    case '/deleteUser':
        UserController::deleteUser();
        break;
    case '/updateAdmin':
        UserController::updateAdmin();
        break;
    case '/api':
        ApiController::getPost();
    default:
        FrontEndController::getPost();
        break;
}
?>