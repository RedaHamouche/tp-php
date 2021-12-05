<?php 


class ApiController {
    static function getPost(){
        $articles = [];
        $model = new FrontEndModel;
        $articles = $model->listPost();

        echo json_encode($articles);
    }
    
    static function getUsers(){
        $users = [];
        $model = new UserModel;
        $users = $model->listUsers();

        echo json_encode($users);
    }
}

?>