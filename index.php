<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sinh Viên TH23.21</title>
    <link href="img/student.ico" rel="icon" type="image/ico" />
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php
        include_once "main/header.php";
    ?>
    <main>
        <div class="wrapper-index">
            <?php
                if(isset($_SESSION['username'])){
            ?>
            <main>
                <h3>Thống kê</h3>
                <div class="outter-box-index">
                    <div class="inner-box1">
                        <p>Số Sinh Viên</p>
                    </div>
                    <div class="inner-box2">
                        <p>Số lớp</p>
                    </div>
                    <div class="inner-box3">
                        <p>Số ngành</p>
                    </div>
                    <div class="inner-box4">
                    <p>box1</p>
                    </div>
                </div>
            </main>
            <?php
                }else{
            ?>
            <p>Đăng Nhập để xem thông tin</p>
        </div>
    </main>
    
    <?php
        }
        include_once "main/footer.php";
    ?>
</body>
</html>


