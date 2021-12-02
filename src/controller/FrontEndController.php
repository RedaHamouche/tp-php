<?php 

class FrontEndController{
    static function test(){
        $test = new FrontEndModel;
        $test->post();
        echo 'oui';
    }

    static function getPost(){
        $values = [];
        $model = new FrontEndModel;
        $values = $model->listPost();

        return $values;
    }

    static function addPost($content) {
        $model = new FrontEndModel;
        $model->insertPost($content);
    }

    static function showPost($articleId) {
        $values = [];
        $model = new FrontEndModel;
        $values = $model->listPostById($articleId);

        return $values;
    }
}