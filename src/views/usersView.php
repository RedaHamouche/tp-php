<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/views/header.php";
?>

<body>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Is Admin</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($users as $user) :?>
    <tr>
        <td><?= $user['firstname'];?></td>
        <td><?= $user['lastname'];?></td>
        <td><?= $user['email'];?></td>
        <td>
            <?= $user['administrator']; ?>
        </td>
        <td>
            <?php if($_SESSION['email'] !== $user['email']) : ?>
                <a href="/deleteUser?id=<?= $user['id']; ?>" class="text-danger"><u>Delete user</u></a>
            <?php endif ?>
            <?php if($user['administrator'] === "false") : ?>
                <a href="/updateAdmin?id=<?= $user['id']; ?>" class="text-success ml-2"><u>Make admin</u></a>
            <?php endif ?>
        </td>
    </tr>
    <?php endforeach ?>  
</tbody>
</table>
</body>