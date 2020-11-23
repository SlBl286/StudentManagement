<?php
    include_once "../database/database.php";
        
    
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    if(empty($name)){
        header("location: ../addMajors.php?error=emptyinput");
        exit();
    }
    include_once "./function.php";
    $value = fieldExit($conn,$name,"majors","name");
    if($value == false){
        $sql = "INSERT INTO `majors`(`name`) VALUES (?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "add account SQL error";
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$name);
            mysqli_stmt_execute($stmt);    
        }
        mysqli_stmt_close($stmt);
        header("location: ../majorsList.php");
        exit();
        
    }
    else{
        header("location: ../addMajors.php?error=valueExit");
        exit();
    }
}
else{
    header("location: ../addMajors.php?error=submitError");
    exit();
}
        
