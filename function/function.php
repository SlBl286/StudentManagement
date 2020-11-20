<?php

function userExit($conn,$username){
    
    $sql = "SELECT * FROM users WHERE `user_name` = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL statement failed";
    }
    else{
        mysqli_stmt_bind_param($stmt,"s",$username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if($row = mysqli_fetch_assoc($result)){   
            return $row;
            echo $row;
        }
        else{
            $r = false;
            return $r;
        }
    }
    mysqli_stmt_close($stmt);
}