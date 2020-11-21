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
                // đã đăng nhập
                if(isset($_SESSION['username'])){
            ?>
             <section class="search-student">
                <div>
                    <form action="" method="post">
                        <input type="search" name="studentinfor" placeholder="Tìm Kiếm ...">
                        <button type="submit">Tìm Kiếm</button>
                    </form>
                </div>
            </section>
            <section class="student-list">
                <h3>Danh Sách Sinh Viên</h3>
                <div>
                    <table>
                        
                    </table>
                </div>
            </section>
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
    </main>
    <?php
        include_once "./main/footer.php";
    ?>
</body>
</html>


