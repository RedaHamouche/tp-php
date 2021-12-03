<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/views/header.php";
?>
<body>
<div class="form m-4">
  <?php if(FlashController::hasFlash()) : ?>
    <div class="alert alert-danger" role="alert">
      <?= FlashController::getFlash(); ?>
    </div>
  <?php endif; ?>
  <form action="/logUser" method="post">
    <label>Email : </label>
    <input type="email" name="email"/><br />
    <label>Password : </label>
    <input type="password" name="pass"/><br />
    <br>
    <input type="submit" value="Envoyer">
  </form>
</div> 