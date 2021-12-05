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
        header("Location: / ");
    }

    static function updatePost() {
        $model = new PostModel;
        $model->updatePost($_GET['articleId'], $_POST['content'], $_POST['title']);
        header("Location: / ");
    }
}