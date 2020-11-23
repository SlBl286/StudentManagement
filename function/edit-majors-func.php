<?php
    if(isset($_POST['submit'])){
        $id = $_POST['majorsId'];
        $name = $_POST['name'];
        if(empty($name)){
            header("location: ../majorsList.php?error=emptyinput");
            exit();
        }
        include_once "./function.php";
        $value = fieldExit($conn,$name,"majors","name");
        if($value == false){
            $sql = "UPDATE majors SET name = ? WHERE id = ?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                echo "SQL statement failed";
            }
            else{
                mysqli_stmt_bind_param($stmt,"si",$name,$id);
                mysqli_stmt_execute($stmt);
            }
            mysqli_stmt_close($stmt);
            header("location: ../majorsList.php");
            exit();
            
        }
        else{
            header("location: ../majorsList.php");
            exit();
        }
    }
    else{
        header("location: ../majorsList.php?error=submitError");
        exit();
    }
    