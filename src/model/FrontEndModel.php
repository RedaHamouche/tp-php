<?php 

class FrontEndModel{

    public function post(){
        var_dump(data::dbConnect());
    }

    public function listPost() {
       
        $bdd = data::dbConnect();
    
        $post_list = $bdd->query("SELECT * FROM article");

        $result = $post_list->fetchAll();

        return $result;
    }

    public function listPostById($articleId) {
       
        $bdd = data::dbConnect();
    
        $show_article = $bdd->prepare("SELECT * FROM article WHERE id = :id");

        $show_article->execute([
            "id" => $articleId
        ]);

        return $show_article->fetch(PDO::FETCH_ASSOC);
    }
}