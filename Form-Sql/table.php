<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body style="margin: 50px;">
  <h1>List of Product</h1>
  <button><a href="create-product.html">Add Product</a></button>
  <br>
  <table class="table">
    <thead>
      <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Amount</th>
        <th>Price</th>
        <th>Action</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      require '../vendor/autoload.php';
      $pdo = new PDO('mysql:host=localhost:3306;dbname=usercredentials', 'root', '');
      $fluent = new \Envms\FluentPDO\Query($pdo);
      $query = $fluent->from('products');
      // $id = $fluent -> from('products') -> where ('id') -> fetch();

      foreach ($query as $row) {
        $id = $row['id'];
        $name = $row['name'];
        $amount = $row['amount'];
        $price = $row['price'];
        echo '<tr>
        <td> '. $id . '</td>
        <td> '. $name . '</td>
        <td> '. $amount . '</td>
        <td> '. $price . '</td>
        <td>
        <button><a href="update-product.php?updateid='.$id.'">Update</a></button>
        <button><a href="delete-product.php?deleteid='.$id.'">Delete</a></button>
        </td>
        </tr>
        ';
        
        
    }
    
      ?>
      
    </tbody>
  </table>
</body>
</html>