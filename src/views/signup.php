<?php
$article = FrontEndController::showPost($_GET['articleId']);
require_once $_SERVER["DOCUMENT_ROOT"]."/views/header.php";
?>
<body>
<div class="form">
  <form action="/addUser" method="post">
    <label>First Name : </label>
    <input type="text" name="firstname"/><br />
    <label>Last Name : </label>
    <input type="text" name="lastname"/><br />
    <label>Email : </label>
    <input type="email" name="email"/><br />
    <label>Password : </label>
    <input type="password" name="pass"/><br />
    <label>Verify Password : </label>
    <input type="password" name="pass_verify"/><br />
    <br>
    <input type="submit" value="Envoyer">
  </form>
</div>  
</body>
</html>