<?php
    session_start();
    $mysqli = new mysqli("127.0.0.1:3306","root","","usercredentials");
    $result = $mysqli->query("select id,email,password from userinfo");
    $user = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $email_input = $_POST['email'];
    $password_input = hash('sha256',$_POST['password']);
    $loginuser = checkuser($email_input,$password_input,$user);
    if($loginuser == 1){
        $_SESSION['email']=$email_input;
        echo "<script> location.href = 'table.php';</script>";
    }else{
        echo "<script> alert('Incorrect Email or Password');</script> ";
        echo "<script> location.href = 'index.html';</script>";
    }
    $mysqli->close();



    function checkuser($email,$password,$user){
        for($i=0 ; $i < count($user) ; $i++){
            if($email == $user[$i]['email'] && $password == $user[$i]['password']){
                $_SESSION['id'] = $user[$i]['id'];
                return 1;
            }
        }
        return 0;
    }
?>