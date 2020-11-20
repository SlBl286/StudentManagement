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
            <h3>Website Quản Lý Sinh Viên</h3>
            <table>
                <tr>
                    <td>Số sinh viên</td>
                    <td>Số lớp</td>
                    <td>Số khoa</td>
                    
                </tr> 
            </table>
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


