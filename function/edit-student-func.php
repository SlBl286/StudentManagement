<?php
    if(isset($_POST['submit'])){
        $id = $_POST['studentId'];
        $firstname = $_POST['first_name'];
        $lastname = $_POST['last_name'];
        $birthday = $_POST['birthday'];
        $sex = $_POST['sex'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $class_id = $_POST['classId'];
        if(empty($firstname) || empty($lastname) || empty($birthday) || empty($sex) || empty($phone) || empty($email) || empty($address) || empty($class_id)){
            header("location: ../studentList.php");
            exit();
        }
        include_once "./function.php";
            $sql = "UPDATE `students` SET `first_name`= ?,`last_name`= ?,`birthday`= ?,`sex`= ?,`phone`= ?,`email`= ?,`address`= ?,`class_id`= ? WHERE id = ?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                echo "SQL statement failed";
            }
            else{
                mysqli_stmt_bind_param($stmt,"sssssssii",$firstname,$lastname,$birthday,$sex,$phone,$email,$address,$class_id,$id);
                mysqli_stmt_execute($stmt);
            }
            mysqli_stmt_close($stmt);
            header("location: ../studentList.php");
            exit();
    }
    else{
        header("location: ../studentList.php");
        exit();
    }
    