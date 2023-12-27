<?php
require_once('../database/dbhelper.php');
?>
<?php
require('../header.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Quản Lý Sản Phẩm</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScrseipt -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
   
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Quản Lý Khách Hàng</h2>
            </div>
            <div class="panel-body"></div>
            <a href="add.php">
                <button class=" btn btn-success" style="margin-bottom:20px">Thêm Khách hàng</button>
            </a>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr style="font-weight: 500;">
                        <td width="70px">STT</td>
                        <td>User Name</td>
                        <td>Họ Tên</td>
                        <td>Email</td>
                        <td>SĐT</td>
                        <td>Ngày Sinh</td>
                        <td>Giới Tính</td>
                        <td>Địa Chỉ</td>
                        <td>Mật Khẩu</td>
                        <td width="50px"></td>
                        <td width="50px"></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Lấy danh sách Sản Phẩm
                    if (!isset($_GET['page'])) {
                        $pg = 1;
                        echo 'Bạn đang ở trang: 1';
                    } else {
                        $pg = $_GET['page'];
                        echo 'Bạn đang ở trang: ' . $pg;
                    }

                    try {

                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                        } else {
                            $page = 1;
                        }
                        $limit = 5;
                        $start = ($page - 1) * $limit;
                        $sql = "SELECT * FROM khachhang limit $start,$limit";
                        executeResult($sql);
                        // $sql = 'select * from product limit $star,$limit';
                        $productList = executeResult($sql);

                        $index = 1;
                        foreach ($productList as $item) {
                            echo '  <tr>
                    <td>' . ($index++) . '</td>
                    <td style="text-align:center">'.$item['username'].'</td>
                    <td>' . $item['hoten'] . '</td>
                    <td>' . $item['email'].'</td>
                    <td>' . $item['sdt'] . '</td>
                    <td>' . $item['ngaysinh'] . '</td>
                    <td>' . $item['gioitinh'] . '</td>
                    <td>' . $item['diachi'] . '</td>
                    <td>' . $item['matkhau'] . '</td>
                    <td>
                        <a href="sua.php?username=' . $item['username'] . '">
                            <button class=" btn btn-warning">Sửa</button> 
                        </a> 
                    </td>
                    <td>            
                    <button class="btn btn-danger" onclick="deleteProduct(xoa.php?username=' . $item['username'] . ')">Xoá</button>
                    </td>
                    
                </tr>';
                        }
                    } catch (Exception $e) {
                        die("Lỗi thực thi sql: " . $e->getMessage());
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <ul class="pagination">
            <?php
            $sql = "SELECT * FROM khachhang";
            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result)) {
                $numrow = mysqli_num_rows($result);
                $current_page = ceil($numrow / 5);
                // echo $current_page;
            }
            for ($i = 1; $i <= $current_page; $i++) {
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page) {
                    echo '
            <li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                } else {
                    echo '
            <li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>
                    ';
                }
            }
            ?>
        </ul>
    </div>

    </div>
    <script type="text/javascript">
        function deleteProduct(id) {
            var option = confirm('Bạn có chắc chắn muốn xoá phim này không?')
            if (!option) {
                return;
            }

            console.log(id)
            //ajax - lenh post
            $.post('xoa.php', {
                'username': id,
                'action': 'delete'
            }, function(data) {
                location.reload()
            })
        }
    </script>
</body>

</html>