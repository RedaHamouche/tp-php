<?php

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
        PostController::addPost($_POST['content']);
        require PROJECTPATH . "/views/listView.php";
        break;
    case '/show':
        FrontEndController::showPost($_GET['articleId']);
        require PROJECTPATH . "/views/showView.php";
        break;
    default:
        require PROJECTPATH . "/views/listView.php";
        break;
}
?>