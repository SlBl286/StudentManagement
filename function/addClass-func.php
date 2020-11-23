<?php
    include_once "../database/database.php";
        
    
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $majorId = $_POST['majors'];
    if(empty($majorId) || empty($name) ) {
        header("location: ../addClass.php?error=emptyinput");
        exit();
    }
    include_once "./function.php";
    $value = fieldExit($conn,$name,"classes","name");
    if($value == false){
        $sql = "INSERT INTO `classes`(`name`,majors_id) VALUES (?,?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "add account SQL error";
        }
        else{
            mysqli_stmt_bind_param($stmt,"ss",$name,$majorId);
            mysqli_stmt_execute($stmt);    
        }
        mysqli_stmt_close($stmt);
        header("location: ../classList.php");
        exit();
        
    }
    else{
        header("location: ../addClass.php?error=valueExit");
        exit();
    }
}
else{
    header("location: ../addClass.php?error=submitError");
    exit();
}
        
