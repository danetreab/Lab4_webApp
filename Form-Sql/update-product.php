<?php
require '../vendor/autoload.php';
$id = $_GET['updateid'];
// require '[lib-dir]/Envms/FluentPDO/src/Query.php';
    $pdo = new PDO('mysql:dbname=usercredentials', 'root', '');
    $fluent = new \Envms\FluentPDO\Query($pdo);

    $name = $_POST['uname'];
    $amount = $_POST['uamount'];
    $price = $_POST['uprice'];

    $set = array('name'=>$name,'amount'=>$amount,'price'=>$price);

    $query = $fluent->update('products', $set, $id)->execute();
?>