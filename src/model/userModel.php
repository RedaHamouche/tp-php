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
            $_SESSION['email'] = $email;
            $_SESSION['admin'] = $admin;
        }
    }

    public function checkAccount($email, $pass){
        $bdd = data::dbConnect();
        $member = $bdd->prepare("SELECT email, pass, firstname, lastname, administrator FROM member WHERE email = :email");
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
            $_SESSION['admin'] = $member_data['administrator'];
            $_SESSION['email'] = $email;
            return true;
        } else {
            return false;
        }
    }
    public function checkEmail($email){
        $bdd = data::dbConnect();
        $memberEmail = $bdd->prepare("SELECT email FROM member WHERE email = :email");
        $memberEmail->execute([
            'email' => $email,
        ]);
        $memberExist = $memberEmail->fetch();
        if (!$memberExist){
            return true;
        } else {
            return false;
        }
    }

    public function listUsers() {
       
        $bdd = data::dbConnect();
    
        $users_list = $bdd->query("SELECT * FROM member");

        $users = $users_list->fetchAll();

        return $users;
    }

    public function deleteUser($id) {
       
        $bdd = data::dbConnect();
        $requete = $bdd->prepare('DELETE FROM member WHERE id = :id');
        $requete->execute(array(
            'id' => $id
        ));
    }
    public function updateAdmin($id) {
       
        $bdd = data::dbConnect();
        $requete = $bdd->prepare('UPDATE member SET administrator = "true" WHERE id = :id');
        $requete->execute(array(
            'id' => $id
        ));
    }
}