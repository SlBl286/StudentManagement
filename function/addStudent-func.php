<?php
        include_once "../database/database.php";
        
    
if(isset($_POST['submit'])){
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $birthday = $_POST['birthday'];
    $sex = $_POST['sex'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $class_id = $_POST['classId'];
    if(empty($firstname) || empty($lastname) || empty($birthday) || empty($sex) || empty($phone) || empty($email) || empty($address) || empty($class_id)  ) {
        header("location: ../addStudent.php?error=emptyinput");
        exit();
    }
    include_once "./function.php";
    $value = fieldExit($conn,$phone,"students","phone");
    if($value == false){
        $sql = "INSERT INTO students(first_name,last_name,birthday,sex,phone,email,address,class_id) VALUES (?,?,?,?,?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "add account SQL error";
        }
        else{
            mysqli_stmt_bind_param($stmt,"sssssssi",$firstname,$lastname,$birthday,$sex,$phone,$email,$address,$class_id);
            mysqli_stmt_execute($stmt);    
        }
        mysqli_stmt_close($stmt);
        header("location: ../studentList.php");
        exit();
        
    }
    else{
        header("location: ../addStudent.php?error=valueExit");
        exit();
    }
}
else{
    header("location: ../addStudent.php?error=submitError");
    exit();
}