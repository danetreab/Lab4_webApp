<?php
$id = $_GET['updateid'];
if(isset($_POST['submit'])){

require '../vendor/autoload.php';

// require '[lib-dir]/Envms/FluentPDO/src/Query.php';
    $pdo = new PDO('mysql:dbname=usercredentials', 'root', '');
    $fluent = new \Envms\FluentPDO\Query($pdo);

    $name = $_POST['uname'];
    $amount = $_POST['uamount'];
    $price = $_POST['uprice'];

    $set = array('name'=>$name,'amount'=>$amount,'price'=>$price);

    $query = $fluent->update('products', $set, $id)->execute();
    echo "<script> location.href = 'table.php';</script>";
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"/>
    <link rel="stylesheet" href="css/mdb.min.css" />
    <style>
      form{
        margin: 25px 30%;
      }
    </style>
</head>
<body>
    <form method="POST">
        <h3>Update-Product</h3>
      <!-- Email input -->
      <div class="form-outline mb-3">
        <input type="text" required name="uname" class="form-control" />
        <label class="form-label">Name</label>
      </div>
      <div class="form-outline mb-3">
        <input type="text" required name="uamount" class="form-control" />
        <label class="form-label">Amount</label>
      </div> 
      <div class="form-outline mb-3">
        <input type="text" required name="uprice" class="form-control" />
        <label class="form-label">Price</label>
      </div> 
      <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Update</button>
    </form>
</body>
<script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript"></script>
</html>
