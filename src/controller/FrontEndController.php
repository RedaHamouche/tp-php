<?php 

class FrontEndController{
    static function test(){
        $test = new FrontEndModel;
        $test->post();
        echo 'oui';
    }

    static function getPost(){
        $articles = [];
        $model = new FrontEndModel;
        $articles = $model->listPost();

        require_once PROJECTPATH . "/views/listView.php";
    }

    static function addPost($content) {
        $model = new FrontEndModel;
        $model->insertPost($content);
    }

    static function showPost() {
        $article = [];
        $model = new FrontEndModel;
        $article = $model->listPostById($_GET['articleId']);

        require_once PROJECTPATH . "/views/showView.php";
        return $article;
    }

}