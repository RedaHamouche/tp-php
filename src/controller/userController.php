<?php 

class UserController{

    static function addUser($firstname, $lastname, $email, $pass, $admin) {
        $model = new UserModel;
        $flash = new FlashController;

        $check_email = $model->checkEmail($email);


        if($pass === $_POST['pass_verify']) {
            $model->insertUser($firstname, $lastname, $email, $pass, $admin);
            header("Location: /");
        }
        else if ($check_email === false) {
            $flash->setFlash("L'email existe déja");
        }
         else {
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
            $flash->setFlash('Mauvais mot de passe et/ou email');
            header("Location: /login");
        }
    }

    static function getUsers(){
        $values = [];
        $model = new UserModel;
        $values = $model->listUsers();

        return $values;
    }

    static function deleteUser($id) {
        $model = new UserModel;
        $model->deleteUser($id);
        header("Location: /usersView ");
    }

    static function updateAdmin($id) {
        $model = new UserModel;
        $model->updateAdmin($id);
        header("Location: /usersView ");
    }

}