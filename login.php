<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Đăng Nhập</title>
    <link href="./img/student.ico" rel="icon" type="image/ico" />
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php
        include_once "./main/header.php";
    ?>
    
    <div class="login-form">
        <h3>Đăng Nhập</h3><br>
        <form action="function/login-func.php" method="post">
            <input type="text" name="username" placeholder="Username..."><br>
            <input type="password" name="pwd" placeholder="Password..."><br>
            <button type="submit" name="submit" value="submit">Đăng Nhập</button>
        </form> 
        <div>
            <?php
                if(isset($_GET['error'])){
                    if($_GET['error'] == 'emptyinput'){
                        echo "<p>Bạn cần nhập tài khoản và mật khẩu</p>";
                    }
                    if($_GET['error'] == 'wronglogin'){
                        echo "<p>Sai tên tài khoản hoặc mật khẩu</p>";
                    }
                }
            ?>
        </div>
    </div>
    <?php
        include_once "./main/footer.php";
    ?>
</body>
</html>


