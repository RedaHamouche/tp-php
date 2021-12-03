<?php 

class PostController{

    static function addPost($content, $title, $file) {
        $model = new PostModel;
        $model->insertPost($content, $title, $file);

        $tmpName = $_FILES['file']['tmp_name'];
        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];

        move_uploaded_file($tmpName, PROJECTPATH .'/upload/'.$name);

        header("Location: / ");
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