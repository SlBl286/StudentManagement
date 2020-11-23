<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sinh Viên TH23.21</title>
    <link href="img/student.ico" rel="icon" type="image/ico" />
    <link type="text/css" rel="stylesheet" href="./css/reset.css">
    <link type="text/css" rel="stylesheet" href="./css/style.css">
    
</head>
<body>
    <?php
        $active = array("","","","","","");
        $active[0] = "active";
        include_once "main/header.php";
        
        
    ?>
    <main>
        <div class="wrapper-index">
            <?php
                if(isset($_SESSION['username'])){
                    include_once "./database/database.php";
            ?>
                <h3>Thống kê</h3>
                <div class="outter-box-index" >
                    <div class="inner-box a" id="1">
                        <p class="box-title">Số Sinh Viên</p>
                        <?php
                            $sql = "SELECT count(*) as C FROM students";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt,$sql)) echo 'SQL error';
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            $row = mysqli_fetch_assoc($result);
                        ?>
                        <p class="box-content"><?php echo $row['C'];?></p>
                    </div>
                    <div class="inner-box b" id="2">
                        <p class="box-title">Số lớp</p>
                        <?php
                            $sql = "SELECT count(*) as C FROM classes";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt,$sql)) echo 'SQL error';
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            $row = mysqli_fetch_assoc($result);
                        ?>
                        <p class="box-content"><?php echo $row['C'];?></p>
                    </div>
                    <div class="inner-box c" id="3">
                        <p class="box-title">Số ngành</p>
                        <?php
                            $sql = "SELECT count(*) as C FROM majors";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt,$sql)) echo 'SQL error';
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            $row = mysqli_fetch_assoc($result);
                        ?>
                        <p class="box-content"><?php echo $row['C'];?></p>
                    </div>
                    <div class="inner-box d" id="4">
                    <p class="box-title">Điểm</p>
                    <?php
                            $sql = "SELECT count(*) as C FROM transcripts";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt,$sql)) echo 'SQL error';
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            $row = mysqli_fetch_assoc($result);
                        ?>
                        <p class="box-content"><?php echo $row['C'];?></p>
                    </div>
                </div>
            <?php
                mysqli_stmt_close($stmt);
                }else{
            ?>
            <p class="noti">Đăng Nhập để xem thông tin</p>
        </div>
    </main>
    
    <?php
        }
        include_once "main/footer.php";
    ?>
</body>

</html>


