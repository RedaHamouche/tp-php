<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/config/bootstrap.php";

$path = explode("/", $_SERVER['REQUEST_URI']);

switch ($path[1]) {
    case 'ds':
        echo "ds";
        break;
    
    default:
        echo "index";
        break;
}