<?php
    $mysqli = new mysqli("127.0.0.1:3306","root","","usercredentials");

    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $clas = $_POST['class'];
    $password = hash('sha256',$_POST['password']);
    $result = $mysqli->query("select username,email from userinfo");
    $user = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $reguser = checkuser($username,$email,$user);
    if($reguser == 1){
        $filename = $_FILES["profile"]["name"];
        $tempname = $_FILES["profile"]["tmp_name"];
            $folder = "image/".$filename;
        $result = $mysqli->query("INSERT INTO userinfo(username,email,gender,class,password,filename) Values ('$username','$email','$gender','$clas','$password','$filename')");
        move_uploaded_file($tempname,$folder);
        echo "<script> location.href = 'index.html';</script>";
    }
    else{
        echo "<script> alert('username or email already used');</script> ";
        echo "<script> location.href = 'register.html';</script>";
    }
    

    function checkuser($username,$email,$user){
        for($i=0 ; $i < count($user) ; $i++){
            if($username == $user[$i]['username'] || $email == $user[$i]['email']){
                return 0;
            }
        }
        return 1;
    }
?>