<?php
$article = FrontEndController::showPost($_GET['articleId']);
require_once $_SERVER["DOCUMENT_ROOT"]."/views/header.php";
?>
<body>
<div class="card mx-4 my-3">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Titre</h5>
        <p><?= $article['content']; ?></p>
        <h6 class="card-subtitle mb-2 text-muted">Écrit par : <?= $article['author']; ?></h6>
        <h6 class="card-subtitle mb-2 text-muted">Le : <?= $article['content_date']; ?></h6>
    </div>
</div>
</body>
</html>