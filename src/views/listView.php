<?php
$values = FrontEndController::getPost();
require_once $_SERVER["DOCUMENT_ROOT"]."/views/header.php";
?>
<body>
<?php foreach($values as $article) :?>
    <div class="card mx-4 my-3">
        
        <div class="card-body">
            <?php if ($article['img'] != null) : ?>
                <img src="<?= "/upload/". $article['img'] ?>" class="rounded mb-3" alt="..." style="width: 200px;">
            <?php endif ?>
            <h5 class="card-title"><?= $article['title']; ?></h5>
            <p><?= $article['content']; ?></p>
            <h6 class="card-subtitle mb-2 text-muted">Écrit par : <?= $article['author']; ?></h6>
            <h6 class="card-subtitle mb-2 text-muted">Le : <?= $article['content_date']; ?></h6>
            <?php if (isset($article['author_update'])) : ?>
                <p class="card-subtitle mb-2 text-muted">Modifer par <?= $article['author_update']; ?></p>
            <?php endif ?>
            <a href="/show?articleId=<?= $article['id'] ?>" class="btn btn-primary">Voir l'article</a>
            <button class="btn btn-success comment-btn">Commenter</button>
        </div>
        <form action="/updateArticle?articleId=<?= $article['id'] ?>" method="post" enctype="multipart/form-data" class="m-4 d-none comment-form">
            <label>Commentaire : </label><br>
            <textarea type="text" name="content" rows="2"></textarea>
            <br>
            <input type="submit" value="Envoyer">
        </form>
        <script defer>
            const updateButton = document.querySelector('.comment-btn');
            updateButton.addEventListener("click", () => {
                document.querySelector(".comment-form").classList.toggle("d-none");
            })

        </script>
    </div>
<?php endforeach ?>   
</body>
</html>