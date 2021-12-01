<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$dsn = 'mysql:host=db';
$user = 'root';
$pwd = 'example';
$pdo = new PDO($dsn, $user, $pwd);

$db = 'demo';
$pdo->exec("CREATE DATABASE IF NOT EXISTS `$db`");
$query = $pdo->query('SHOW DATABASES');
print_r($query->fetchAll(PDO::FETCH_ASSOC));

$path = explode("/", $_SERVER['REQUEST_URI']);

switch ($path[1]) {
    case 'ds':
        echo "ds";
        break;
    
    default:
        echo "index";
        break;
}

echo PROJECT_PATH;