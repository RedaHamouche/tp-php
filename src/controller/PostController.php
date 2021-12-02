<?php 

class PostController{

    static function addPost($content) {
        $model = new PostModel;
        $model->insertPost($content);
    }
}