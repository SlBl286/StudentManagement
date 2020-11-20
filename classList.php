<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sinh Viên TH23.21</title>
    <link href="./img/student.ico" rel="icon" type="image/ico" />
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php
        include_once "./main/header.php";
    ?>
    <main>
        <div>
            <?php
                if(isset($_SESSION['username'])){
            ?>
            <p>Danh Sách lớp</p>
            <?php
                }else{
            ?>
            <p>Đăng Nhập để xem thông tin</p>
        </div>
    </main>
    <?php
            }
        include_once "./main/footer.php";
    ?>
</body>
</html>


