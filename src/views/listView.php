<?php
$values = FrontEndController::getPost();
require_once $_SERVER["DOCUMENT_ROOT"]."/views/header.php";
?>
<body>
<?php foreach($values as $article) :?>
    <div class="card mx-4 my-3">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $article['title']; ?></h5>
            <p><?= $article['content']; ?></p>
            <h6 class="card-subtitle mb-2 text-muted">Écrit par : <?= $article['author']; ?></h6>
            <h6 class="card-subtitle mb-2 text-muted">Le : <?= $article['content_date']; ?></h6>
            <a href="/show?articleId=<?= $article['id'] ?>" class="btn btn-primary">Voir l'article</a>
        </div>
    </div>
<?php endforeach ?>   
</body>
</html>