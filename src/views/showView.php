<?php
$article = FrontEndController::showPost($_GET['articleId']);
require_once $_SERVER["DOCUMENT_ROOT"]."/views/header.php";
?>
<body>
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
        <div>
        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === "true") : ?>
            <a href="/delete?articleId=<?= $article['id'] ?>" class="btn btn-danger">Delete</a>
            <button class="btn btn-primary update-btn">Modifier</button>
        <?php endif ?>
        </div>
    </div>
</div>
<form action="/updateArticle?articleId=<?= $article['id'] ?>" method="post" enctype="multipart/form-data" class="m-4 d-none update-form">
    <label>Title : </label><br>
    <input type="text" name="title"/>
    <label for="file">Image</label>
    <input type="file" name="file">
    <label>Contenu : </label><br>
    <textarea type="text" name="content" rows="10"></textarea>
    <br>
    <input type="submit" value="Envoyer">
  </form>
  <script defer>
      const updateButton = document.querySelector('.update-btn');
      updateButton.addEventListener("click", () => {
          document.querySelector(".update-form").classList.toggle("d-none");
      })

  </script>
</body>
</html>