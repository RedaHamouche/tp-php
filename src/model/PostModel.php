<?php 
class PostModel{

    public function post(){
        var_dump(data::dbConnect());
    }

    public function insertPost($content, $title, $file) {
       
        $bdd = data::dbConnect();
        $requete = $bdd->prepare('INSERT INTO article(title, author, content, img, content_date) VALUES (:title, :author, :content, :img, NOW())');
        if(!empty($_POST['content']) && $_SESSION['currentUser']) {
            $requete->execute(array(
                'content' => $_POST['content'],
                'title' => $_POST['title'],
                'img' => $_FILES['file']['name'],
                'author' => $_SESSION['currentUser']
            ));
        }
    }

    public function deletePost($id) {
       
        $bdd = data::dbConnect();
        $requete = $bdd->prepare('DELETE FROM `article` WHERE id = :id');
        $requete->execute(array(
            'id' => $id
        ));
    }

    public function updatePost($id, $title, $content) {
       
        $bdd = data::dbConnect();
        $requete = $bdd->prepare('UPDATE article SET title = :title, content = :content, author_update = :author_update WHERE id = :id');
        $requete->execute(array(
            'title' => $title,
            'content' => $content,
            'author_update' => $_SESSION['currentUser'],
            'id' => $id
        ));
    }
}