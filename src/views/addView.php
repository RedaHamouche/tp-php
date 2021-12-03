<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/views/header.php";
?>
<body>
<div class="form">
  <form action="/addArticle" method="post" enctype="multipart/form-data">
    <label>Title : </label><br>
    <input type="text" name="title"/>
    <label for="file">Image</label>
    <input type="file" name="file">
    <label>Contenu : </label><br>
    <textarea type="text" name="content" rows="10"></textarea>
    <br>
    <input type="submit" value="Envoyer">
  </form>
</div>  
</body>
</html>