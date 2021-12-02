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

    static function logUser($email, $pass) {
        $model = new UserModel;
        $flash = new FlashController;

        $check_account = $model->checkAccount($email, $pass);
        if($check_account == true) {
            header("Location: /");
        } else {
            header("Location: /login");
        }
    }
}