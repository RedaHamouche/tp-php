<?php 

class PostController{
    static function test(){
        $test = new PostModel;
        $test->post();
        echo 'oui';
    }

    static function getPost(){
        $values = [];
        $model = new PostModel;
        $values = $model->listPost();

        return $values;
    }

    static function addPost($content) {
        $model = new PostModel;
        $model->insertPost($content);
    }
}