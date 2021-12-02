<?php 
class UserModel{

    public function post(){
        var_dump(data::dbConnect());
    }

    public function insertUser($firstname, $lastname, $email, $pass, $admin) {
        $bdd = data::dbConnect();
        $pass_hache =  password_hash($pass, PASSWORD_DEFAULT);
        if ($admin !== 'true') {
            $admin = 'false';
        }
        $req = $bdd->prepare("INSERT INTO member(firstname, lastname, email, pass, administrator) VALUES(:firstname, :lastname,  :email,  :pass, :administrator)");
        
        if(!empty($firstname) && !empty($lastname) && !empty($pass) ) {
            $req->execute(array(
                "firstname" => $firstname,
                "lastname" => $lastname,
                "email" => $email,
                "pass" => $pass_hache,
                "administrator" => $admin
            ));
            $_SESSION['currentUser'] = $firstname . ' ' . $lastname;
        }
    }
}