<?php 
class Data {
    private $dsn = 'mysql:host=db';
    private $user = 'root';
    private $pwd = 'example';

    private $db = 'demo';

    function dbConnect() {
        $pdo = new PDO($this->dsn, $this->user, $this->pwd);

        $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db`");
        $query = $pdo->query('SHOW DATABASES');
        print_r($query->fetchAll(PDO::FETCH_ASSOC));
    }
}