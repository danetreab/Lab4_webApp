<?php
session_start();
     require '../vendor/autoload.php';
    //      //connect
    //     $mysqli = new mysqli("127.0.0.1:3306","root","","usercredentials");
    //     $name = $_POST['name'];
    //     $price = $_POST['price'];
    //     $amount = $_POST['amount'];
    //     $result = $mysqli->query("select name,price,amount from products");
    //     $add = mysqli_fetch_all($result,MYSQLI_ASSOC);
    //     $conn = mysqli_connect($name, $price, $amount);

    //    if(!$conn){
    //     die("connection fail...". mysqli_connect_error());
    //    }
    //    $sql = "INSERT INTO products (name, price, amount) VALUES ('$name', '$price', '$amount')";
    //    if (mysqli_query($conn, $sql)) {
    //     echo "New record created successfully";
    //   } else {
    //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    //   }
      
    //   mysqli_close($conn);
    $pdo = new PDO('mysql:dbname=usercredentials', 'root', '');
    $fluent = new \Envms\FluentPDO\Query($pdo);

    // $query = $fluent->from('products')->fetch();
    $query = $fluent->from('products');
      
     foreach ($query as $products){
        echo $products ['name']. '<br>';
     }


         $values = array('name' => $_POST['name'], 'user_id' => $_SESSION['id'], 'amount' => $_POST['amount'], 'price' => $_POST['price']);

        $query = $fluent->insertInto('products')->values($values)->execute();
        echo "<script> location.href = 'table.php';</script>";
    
    ?>