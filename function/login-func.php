<?php
        include_once "../database/database.php";

    
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    if(empty($username) || empty($pwd)){
        header("location: ../login.php?error=emptyinput");
        exit();
    }
    include_once "./function.php";
    $userExit = userExit($conn,$username);
    echo $userExit['user_name'];
    if($userExit == false){
        header("location: ../login.php?error=user");
        exit();
    }
    $pwdhashed = $userExit['pwd'];
    $checkpwd = password_verify($pwd,$pwdhashed);
    if($checkpwd == false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if($checkpwd == true){
        session_start();
        $_SESSION['username'] = $userExit['user_name'];
        $_SESSION['id'] = $userExit['id'];
        header("location: ../index.php");
        exit();
    }
}
else{
    header("location: ../login.php");
    exit();
}

