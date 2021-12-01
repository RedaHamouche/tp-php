<?php 

class PostModel{

    public function post(){
        var_dump(data::dbConnect());
    }

    public function insertUser($firstname, $lastname, $email) {
        $bdd = data::dbConnect();
        $req = $bdd->prepare("INSERT INTO article(author , content, content_date) VALUES(:author, :content,  :content_date)");
        
        $user = $req->execute(array(
            "firstname" => $firstname,
            "lastname" => $lastname,
            "email" => $email,
            "pass" => $pass_hache
        ));
        return $user;
    }

    public function listPost() {
       
        $bdd = data::dbConnect();
    
        $post_list = $bdd->query("SELECT * FROM article");

        $result = $post_list->fetchAll();

        return $result;
    }

    public function insertPost($content) {
       
        $bdd = data::dbConnect();
    
        $requete = $bdd->prepare('INSERT INTO article(author, content, content_date) VALUES (:author, :content, NOW() )');

        if(!empty($_POST['content'])) {
            $requete->execute(array(
                'content' => $_POST['content'],
                'author' => 'louis'
            ));
        }
    }
}