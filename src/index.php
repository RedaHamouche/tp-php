<?php
session_start();
ini_set('display_errors',1); 
error_reporting(E_ALL);
require_once $_SERVER["DOCUMENT_ROOT"]."/config/bootstrap.php";
require($_SERVER["DOCUMENT_ROOT"]."/controller/FrontEndController.php");

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
    case '/getPost':
        ApiController::getPost();
        break;
    case '/getUsers':
        ApiController::getUsers();
        break;
    default:
        FrontEndController::getPost();
        break;
}
?>