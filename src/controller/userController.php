<?php 

class UserController{

    static function addUser($firstname, $lastname, $email, $pass, $admin) {
        $model = new UserModel;
        $flash = new FlashController;

        if($pass === $_POST['pass_verify']) {
            $model->insertUser($firstname, $lastname, $email, $pass, $admin);
        } else {
            $flash->setFlash('Mauvaise combinaison de mot de passe');
        }
    }
}