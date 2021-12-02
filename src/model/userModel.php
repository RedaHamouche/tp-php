<?php 

class UserModel{

    public function post(){
        var_dump(data::dbConnect());
    }

    public function insertUser($firstname, $lastname, $email, $admin) {
        $bdd = data::dbConnect();
        $pass_hache =  password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $req = $bdd->prepare("INSERT INTO member(firstname , lastname, email, pass, administrator) VALUES(:firstname, :lastname,  :email,  :pass, :administrator)");
        
        $user = $req->execute(array(
            "firstname" => $firstname,
            "lastname" => $lastname,
            "email" => $email,
            "pass" => $pass_hache
        ));
        return $user;
    }
}