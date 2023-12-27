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
                <h2 class="text-center">Quản Lý Phim</h2>
            </div>
            <div class="panel-body"></div>
            <a href="add.php">
                <button class=" btn btn-success" style="margin-bottom:20px">Thêm Phim</button>
            </a>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr style="font-weight: 500;">
                        <td width="70px">STT</td>
                        <td>Mã Phim</td>
                        <td>Tên Phim</td>
                        <td>Title</td>
                        <td>Phút Xem</td>
                        <td>Giờ Xem</td>
                        <td>Ngày Chiếu</td>
                        <td>Giá Vé</td>
                        <td>Ảnh Phim</td>
                        <td>Mã Phòng</td>
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
                        $sql = "SELECT * FROM phim limit $start,$limit";
                        executeResult($sql);
                        // $sql = 'select * from product limit $star,$limit';
                        $productList = executeResult($sql);

                        $index = 1;
                        foreach ($productList as $item) {
                            echo '  <tr>
                    <td>' . ($index++) . '</td>
                    <td style="text-align:center">'.$item['maphim'].'</td>
                    <td>' . $item['tenphim'] . '</td>
                    <td>' . $item['title'].'</td>
                    <td>' . $item['phut'] . '</td>
                    <td>' . $item['gioxem'] . '</td>
                    <td>' . $item['ngaychieu'] . '</td>
                    <td>' . $item['giave'] . '</td>
                    <td style="text-align:center">
                        <img src="http://localhost/WEB_FILM/accets/img/' . $item['img'] . '" alt="" style="width: 50px">
                    </td>
                    <td>' . $item['maphong'] . '</td>
                    <td>
                        <a href="sua.php?maphim=' . $item['maphim'] . '">
                            <button class=" btn btn-warning">Sửa</button> 
                        </a> 
                    </td>
                    <td>            
                    <button class="btn btn-danger" onclick="deleteProduct(' . $item['maphim'] . ')">Xoá</button>
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
            $sql = "SELECT * FROM `phim`";
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
            $.post('ajax.php', {
                'id': id,
                'action': 'delete'
            }, function(data) {
                location.reload()
            })
        }
    </script>
</body>

</html>