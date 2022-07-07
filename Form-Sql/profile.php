<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <?php
    session_start();
    $email = $_SESSION['email'];
    $mysqli = new mysqli("127.0.0.1:3306","root","","usercredentials");
    $result = $mysqli->query("select username,email,filename,gender,class from userinfo where email='$email'");
    $user = mysqli_fetch_all($result,MYSQLI_ASSOC);
    ?>
    <div class="container">
        <div class="profile">
            <img width=200px height=200px src="<?php echo 'image/'.$user[0]['filename']; ?>" alt="" srcset="">
        </div>
        <div class="userinfo">
            <h1><?php echo $user[0]['username']; ?></h1>
            <p><?php echo 'Email : '.$user[0]['email']; ?></p>
            <p><?php echo 'Gender : '.$user[0]['gender']; ?></p>
            <p><?php echo 'Class : '.$user[0]['class']; ?></p>
        </div>
        <div class="button">
            <a href="index.html">Signout</a>
        </div>
    </div>
</body>
</html>