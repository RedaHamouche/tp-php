<?php 

class UserController{

    static function addUser($firstname, $lastname, $email, $admin) {
        $model = new UserModel;
        $values = $model->insertUser($firstname, $lastname, $email, $admin);
    }
}