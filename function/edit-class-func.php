<?php
    if(isset($_POST['submit'])){
        $id = $_POST['classId'];
        $name = $_POST['name'];
        $majorId = $_POST['majorsId'];
        if(empty($name)){
            header("location: ../classList.php?error=emptyinput");
            exit();
        }
        include_once "./function.php";
        $value = fieldExit($conn,$name,"classes","name");
        if($value == false){
            $sql = "UPDATE classes SET name = ?, majors_id = ? WHERE id = ?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                echo "SQL statement failed";
            }
            else{
                mysqli_stmt_bind_param($stmt,"sii",$name,$majorId,$id);
                mysqli_stmt_execute($stmt);
            }
            mysqli_stmt_close($stmt);
            header("location: ../classList.php");
            exit();
            
        }
        else{
            header("location: ../classList.php?error=valueExit");
            exit();
        }
    }
    else{
        header("location: ../classList.php?error=submitError");
        exit();
    }
    