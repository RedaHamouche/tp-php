<?php 


class ApiController {
    static function getPost(){
        $articles = [];
        $model = new FrontEndModel;
        $articles = $model->listPost();

        echo json_encode($articles);
    }
}

?>