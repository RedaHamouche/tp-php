<?php 
class PostModel{

    public function post(){
        var_dump(data::dbConnect());
    }

    public function insertPost($content) {
       
        $bdd = data::dbConnect();
        $requete = $bdd->prepare('INSERT INTO article(title, author, content, content_date) VALUES (:title, :author, :content, NOW())');

        if(!empty($_POST['content'])) {
            $requete->execute(array(
                'content' => $_POST['content'],
                'title' => $_POST['title'],
                'author' => $_SESSION['currentUser']
            ));
        }
    }
}