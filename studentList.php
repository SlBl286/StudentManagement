<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Quản Lý Sinh Viên TH23.21</title>
    <link href="./img/student.ico" rel="icon" type="image/ico" />
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php
        include_once "./main/header.php";
    ?>
    
    <div>
        
        <?php
            // đã đăng nhập
            if(isset($_SESSION['username'])){
            ?>
            <p>Danh Sách Sinh Viên</p>
        <?php
            }
            //chưa đăng nhập
            else{
        ?> 
            <p>Đăng Nhập để xem thông tin</p>
        <?php    
            }
        ?>
    </div>

    <?php
        include_once "./main/footer.php";
    ?>
</body>
</html>

