<form action="adminacc.php" method="post">
    <input type="hidden" name="username" value="admin">
    <input type="hidden" name="pwd" value="admin">
    <button type="submit" name="submit">ADD ACCOUNT</button>

</form>


<?php
include_once "../function/function.php";
include_once "./database.php";
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    if(userExit($conn,$username) == false){
        $pwd = $_POST['pwd'];
        $sql = "INSERT INTO `users`( `user_name`, `pwd`) VALUES (?,?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "add account SQL error";
        }
        else{
            $hashpwd = password_hash($pwd,PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt,"ss",$username,$hashpwd);
            mysqli_stmt_execute($stmt);
            
        }
        mysqli_stmt_close($stmt);
    }
    else{
        echo "account exit";
        exit();
    }
    
    
}


?>

