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
        PostController::addPost($_POST['content'], $_POST['title'], $_FILES['file']['name']);
        require PROJECTPATH . "/views/listView.php";
        break;
    case '/show':
        FrontEndController::showPost($_GET['articleId']);
        require PROJECTPATH . "/views/showView.php";
        break;
    case '/signup':
        require PROJECTPATH . "/views/signup.php";
        break;
    case '/addUser':
        if(!isset($_POST['admin'])){
            $_POST['admin'] = false;
        }
        UserController::addUser($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['pass'], $_POST['admin']);
        require PROJECTPATH . "/views/signup.php";
        break;
    case '/logout':
        session_destroy();
        header('Location: /');
        break;
    case '/login':
        require PROJECTPATH . "/views/login.php";
        break;
    case '/logUser':
        UserController::logUser($_POST['email'], $_POST['pass']);
        break;
    case '/delete':
        PostController::deletePost($_GET['articleId']);
        require PROJECTPATH . "/views/listView.php";
        break;
    case '/updateArticle':
        PostController::updatePost($_GET['articleId'], $_POST['content'], $_POST['title']);
        require PROJECTPATH . "/views/listView.php";
        break;
    case '/usersView':
        UserController::getUsers();
        require PROJECTPATH . "/views/usersView.php";
        break;
    case '/deleteUser':
        UserController::deleteUser($_GET['id']);
        require PROJECTPATH . "/views/usersView.php";
        break;
    case '/updateAdmin':
        UserController::updateAdmin($_GET['id']);
        require PROJECTPATH . "/views/usersView.php";
        break;
    default:
        require PROJECTPATH . "/views/listView.php";
        break;
}
?>