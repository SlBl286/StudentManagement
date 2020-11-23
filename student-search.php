<?php
include_once "./database/database.php";

?>
<!DOCTYPE html>
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
        $active = array("","","","","","");
        $active[1] = "active";
        include_once "./main/header.php";
    ?>
    <main>
        <div class="wrapper-studentlist">
            <?php
                // đã đăng nhập
                if(isset($_SESSION['username'])){      
            ?>
            <section class="student-list">
                <h2>Danh Sách Tìm Kiếm</h2>
                <div>
                    <table class="tudent-table">
                         <tr>
                             <th>ID</th>
                             <th>Họ</th>
                             <th>Tên</th>
                             <th>Ngày Sinh</th>
                             <th>Giới tính</th>
                             <th>Điện Thoại</th>
                             <th>Địa Chỉ</th>
                             <th>Lớp</th>
                             <th></th>

                        </tr>
                        <?php
                            include_once "./database/database.php";
                            if(isset($_POST['submit'])){
							    $search = $_POST['studentinfor'];
							    $sql = "SELECT * FROM students WHERE last_name LIKE '%${search}%' OR First_name LIKE '%${search}%' OR phone LIKE '%${search}%' OR email LIKE '%${search}%' OR address LIKE '%${search}%';";
							    $stmt = mysqli_stmt_init($conn);
							    if(!mysqli_stmt_prepare($stmt,$sql)){
							        echo "SQL ERROR";
							    }
							    mysqli_stmt_execute($stmt);
							    $result = mysqli_stmt_get_result($stmt);

							    foreach ($result as $row) {
                        ?>
                        <tr>
                             <td><?php echo $row['id'] ?></td>
                             <td><?php echo $row['first_name'] ?></td>
                             <td><?php echo $row['last_name'] ?></td>
                             <td><?php echo $row['birthday'] ?></td>
                             <td><?php echo $row['sex'] ?></td>
                             <td><?php echo $row['phone'] ?></td>
                             <td><?php echo $row['address'] ?></td>
                             <td><?php echo $row['class_id'] ?></td>
                             <form action="./del-edit-student.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <td><button type="submit" name='edit-btn' class="ed-btn edit-btn">Sửa</button><button type="submit" name='del-btn' class="ed-btn del-btn">Xóa</button></td>
                             </form>
                        </tr> 
                        <?php
                                }  
                            }
                            else{
                            	header("location: ./studentList.php");
                            }
                        ?>
                    </table>
                </div>
            <?php
                }
                //chưa đăng nhập
                else{
            ?> 
            <p class="noti">Đăng Nhập để xem thông tin</p>
            <?php    
                }
            ?>
            </section>
        </div>
    </main>
    <?php
        include_once "./main/footer.php";
    ?>
</body>
</html>


