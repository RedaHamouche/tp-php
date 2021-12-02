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

    public function checkAccount($email, $pass){
        $bdd = data::dbConnect();
        $member = $bdd->prepare("SELECT email, pass, firstname, lastname FROM member WHERE email = :email");
        $member->execute([
            'email' => $email,
        ]);
        $member_data = $member->fetch();
        if (!$member_data){
            return false;
        }
        $ispasscorrect = password_verify($pass, $member_data['pass']);
        if($ispasscorrect == 1){
            $_SESSION['currentUser'] =  $member_data['firstname'] . ' ' .  $member_data['lastname'];
            return true;
        } else {
            return false;
        }
    }
}