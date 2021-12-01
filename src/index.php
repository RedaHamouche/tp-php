<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/config/bootstrap.php";
require($_SERVER["DOCUMENT_ROOT"]."/controller/PostController.php");

$path = explode("/", $_SERVER['REQUEST_URI']);

switch ($path[1]) {
    case 'ds':
        require PROJECTPATH . "/views/PostView.php";
        break;
    case 'add':
        require PROJECTPATH . "/views/PostView.php";
        PostController::addPost($_POST['content']);
        header('Location: /ds');
        break;
    default:
        echo "index";
        break;
}
?>