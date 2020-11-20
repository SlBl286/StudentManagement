<?php
    session_start();
?>
    <header>
        <a href="./index.php" class='header-home'>Trang Chính</a>
        <nav>
            <ul>
                <li><a href="./studentList.php">Danh Sách Sinh Viên</a></li>
                <li><a href="./classList.php">Danh Sách Lớp</a></li>
                <li><a href="./about.php">About</a></li>
            </ul> 
            <?php
                if(isset($_SESSION['username'])){
                    echo "<a href='./logout.php' class='login-logout'>Thoát</a>";
                }
                else{
                    echo "<a href='./login.php' class='login-logout'>Đăng Nhập</a>";
                }
            ?>
        </nav>    
    </header>
        

