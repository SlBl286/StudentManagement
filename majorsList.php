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
        $active[3] = "active";
        include_once "./main/header.php";
    ?>
    <main>
        <div class="wrapper-majorslist">
            <?php
                // đã đăng nhập
                if(isset($_SESSION['username'])){      
            ?>
             <section class="search-majors">
                <div>
                    <form action="majors-search.php" method="post">
                        <input type="search" name="majorsinfor" placeholder="Tìm Kiếm Khoa ...">
                        <button type="submit" name="submit">Tìm Kiếm</button>
                    </form>
                </div>
                <button class="addmajors-btn" ><a href="./addMajors.php">Thêm Khoa</a></button>
            </section>
            <section class="majors-list">
                <h2>Danh Sách Khoa</h2>
                <div>
                    <table class="majors-table">
                         <tr>
                             <th>ID</th>
                             <th>Khoa</th>
                             <th>Số Lớp</th>
                             <th></th>
                        </tr>
                        <?php
                            include_once "./database/database.php";
                            $sql = "SELECT id, name,student_num,class_num FROM majors";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt,$sql)){
                                echo "SQL statement failed";
                            }
                            else{
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                                foreach ($result as $row) {
                        ?>
                        <tr>
                             <td><?php echo $row['id'] ?></td>
                             <td><?php echo $row['name'] ?></td>
                             <td><?php echo $row['class_num'] ?></td>
                             <form action="./del-edit-majors.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <td><button type="submit" name='edit-btn' class="ed-btn edit-btn">Sửa</button><button type="submit" name='del-btn' class="ed-btn del-btn">Xóa</button></td>
                             </form>
                        </tr> 
                        <?php
                                }  
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


