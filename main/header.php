<?php
    session_start();
    
?>

    <div class="topnav">
        <a href="./index.php" class="<?php echo $active[0] ?>">Trang chính</a>
        <a href="./studentList.php" class="<?php echo $active[1] ?>">Danh Sách Sinh Viên</a>
        <a href="./classList.php" class="<?php echo $active[2] ?>">Danh Sách Lớp</a>
        <a href="./majorsList.php" class="<?php echo $active[3] ?>">Danh Sách Khoa</a>
        <a href="./about.php" class="<?php echo $active[4] ?>">Thông Tin Nhóm</a>
        <?php
                if(isset($_SESSION['username'])){
                    echo "<a href='./logout.php'>Thoát</a>";
                }
                else{
                    echo "<a href='./login.php'>Đăng Nhập</a>";
                }
        ?>
    </div>
        

