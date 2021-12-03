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

    static function deletePost($id) {
        $model = new PostModel;
        $model->deletePost($id);
        header("Location: / ");
    }

    static function updatePost($id, $title, $content) {
        $model = new PostModel;
        $model->updatePost($id, $title, $content);
        header("Location: / ");
    }
}