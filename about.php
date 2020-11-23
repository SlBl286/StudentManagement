<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sinh Viên TH23.21</title>
    <link href="./img/student.ico" rel="icon" type="image/ico" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/reset.css">
</head>
<body>
    <?php
        $active = array("","","","","");
        $active[4] = "active";
        include_once "./main/header.php";
    ?>
    
    <div class="wrapper-about">
        <h1>Danh Sách Thành Viên</h1>
            <p>Đoàn Duy Quý</p>
            <p>Nguyễn Bá Thức</p>
    </div>

    <?php
        include_once "./main/footer.php";
    ?>
</body>
</html>


