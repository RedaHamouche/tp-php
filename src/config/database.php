<?php 
class Data {
    static $dsn = 'mysql:host=db;dbname=tp_hp';
    static $user = 'root';
    static $pwd = 'example';

    static $db = 'demo';

    static function dbConnect() {
        $pdo = new PDO(self::$dsn, self::$user, self::$pwd);
        return $pdo;
    }
}