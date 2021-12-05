<?php 

class PostController{

    static function addPost() {
        $model = new PostModel;
        $model->insertPost($_POST['content'], $_POST['title'], $_FILES['file']['name']);

        $articles = [];
        $modelUser = new FrontEndModel;
        $articles = $modelUser->listPost();

        $tmpName = $_FILES['file']['tmp_name'];
        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];

        move_uploaded_file($tmpName, PROJECTPATH .'/upload/'.$name);

        require_once PROJECTPATH . "/views/listView.php";
    }

    static function deletePost() {
        $model = new PostModel;
        $model->deletePost($_GET['articleId']);
<<<<<<< HEAD
        header("Location: / ");
=======

        $articles = [];
        $modelUser = new FrontEndModel;
        $articles = $modelUser->listPost();
        require PROJECTPATH . "/views/listView.php";
>>>>>>> 61886951d848d68d3a2f753f5c131a5e59806803
    }

    static function updatePost() {
        $model = new PostModel;
        $model->updatePost($_GET['articleId'], $_POST['content'], $_POST['title']);
<<<<<<< HEAD
        header("Location: / ");
=======
        $articles = [];
        $modelUser = new FrontEndModel;
        $articles = $modelUser->listPost();
        require PROJECTPATH . "/views/listView.php";
>>>>>>> 61886951d848d68d3a2f753f5c131a5e59806803
    }
}