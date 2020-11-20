<?php
    session_start();
?>
    <div class="wrapper-header">
        <a href="./index.php" class="branch">Trang Chính</a>
        <ul>
            <li><a href="./studentList.php">Danh Sách Sinh Viên</a></li>
            <li><a href="./classList.php">Danh Sách Lớp</a></li>
            <li><a href="./about.php">About</a></li>
            
            <?php
                if(isset($_SESSION['username'])){
                    echo "<li class='login-logout'><a href='./logout.php'>Thoát</a></li>";
                }
                else{
                    echo "<li class='login-logout'><a href='./login.php'>Đăng Nhập</a></li>";
                }
            ?>
            
        </ul>
    </div>
    <br>

