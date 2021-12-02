<?php
$values = FrontEndController::getPost();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
  <a href="./addView">Ajouter un article</a>
<?php foreach($values as $article) :?>
    <div class="card mx-4 my-3">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Titre</h5>
            <p><?= $article['content']; ?></p>
            <h6 class="card-subtitle mb-2 text-muted">Écrit par : <?= $article['author']; ?></h6>
            <h6 class="card-subtitle mb-2 text-muted">Le : <?= $article['content_date']; ?></h6>
            <a href="/show?articleId=<?= $article['id'] ?>" class="btn btn-primary">Voir l'article</a>
        </div>
    </div>
<?php endforeach ?>   
</body>
</html>