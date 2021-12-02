<?php 

class PostModel{

    public function post(){
        var_dump(data::dbConnect());
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