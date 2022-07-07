<?php
require '../vendor/autoload.php';
$pdo = new PDO('mysql:dbname=usercredentials', 'root', '');
$fluent = new \Envms\FluentPDO\Query($pdo);
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $query = $fluent->deleteFrom('products', $id)->execute();
}


?>