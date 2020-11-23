<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Khoa</title>
    <link href="./img/student.ico" rel="icon" type="image/ico" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/reset.css">
</head>
<body>
    <?php
        $active = array("","","","","");
        $active[3] = "active";
        include_once "./main/header.php";
    ?>
    <main>
        <div class="wrapper-addmajors">
            <h1>Thêm Khoa</h1><br>
            <form action="./function/addMajors-func.php" method="POST">
                <input type="text" name="name" placeholder="Tên Khoa..."><br>
                <button type="submit" name="submit" class="add-btn" value="submit">Thêm</button>
            </form> 
            <div class="Warning">
                <?php
                    if(isset($_GET['error'])){
                        if($_GET['error'] == 'emptyinput'){
                            echo "<p>Bạn cần nhập tên khoa</p>";
                        }
                        if($_GET['error'] == 'valueExit'){
                            echo "<p>Khoa đã tồn tại</p>";
                        }
                    }
                ?>
            </div>
        </div>
    </main>
    <?php
        include_once "./main/footer.php";
    ?>
</body>
</html>


