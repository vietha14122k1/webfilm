<?php
require('../header.php');
?>
<?php
require_once('../database/dbhelper.php');
$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

    if (isset($_POST["btn_Luu"])) {
        $errors= array();
$file_name = $_FILES['img']['name'];
$file_size = $_FILES['img']['size'];
$file_tmp = $_FILES['img']['tmp_name'];
$file_type = $_FILES['img']['type'];
$file_parts =explode('.',$_FILES['img']['name']);
$file_ext=strtolower(end($file_parts));
$expensions= array("jpeg","jpg","png");
if(in_array($file_ext,$expensions)=== false){
$errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
}
if($file_size > 2097152) {
$errors[]='Kích thước file không được lớn hơn 2MB';
}
$image = $_FILES['img']['name'];
$target = "photo/".basename($image);


        $maphim = $_POST['maphim'];
        $tenphim = $_POST['tenphim'];
        $title =$_POST['title'];
        
        $phut = $_POST['phut'];
        $gioxem = $_POST['gioxem'];
        $ngaychieu = $_POST['ngaychieu'];
        $giave = $_POST['giave'];
        $maphong = $_POST['maphong'];
        $sql = 'insert into phim
            values ("' . $maphim . '","' . $tenphim . '","' . $title . '","' . $phut . '","' . $gioxem . '","' . $ngaychieu . '","' . $giave . '","' . $image . '","' . $maphong . '")';
            $data= mysqli_query($con, $sql);
            
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Thêm Sản Phẩm</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- summernote -->
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>

<body>
    
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Thêm Sản Phẩm</h2>
            </div>
            <div class="panel-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Mã Phim:</label>
                        
                        <input required="true" type="text" class="form-control" id="maphim" name="maphim" value="">
                    </div>
                    <div class="form-group">
                        <label for="name">Tên Phim:</label>
                        
                        <input required="true" type="text" class="form-control"  name="tenphim" value="">
                    </div>
                    <div class="form-group">
                        <label for="name">Phút:</label>
                        <input required="true" type="text" class="form-control" name="phut" value="">
                    </div>
                    <div class="form-group">
                        <label for="name">Giờ Xem:</label>
                        <input required="true" type="text" class="form-control"  name="gioxem" value="">
                    </div>
                    <div class="form-group">
                        <label for="name">Ngày Chiếu:</label>
                        <input type="date" required="true" class="form-control"  name="ngaychieu" value="">
                    </div>
                    <div class="form-group">
                        <label for="name">Giá Vé:</label>
                        <input required="true" type="number" class="form-control" name="giave" value="">
                    </div>
                    <div class="form-group">
                        <label for="name">Ảnh:</label>
                        <input type="file" class="form-control-file" id="img" id="img" name="img">
                        
                    </div>
                    <div class="form-group">
                        <label for="name">Mã Phòng:</label>
                        
                        <input required="true" type="text" class="form-control"  name="maphong" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Nội dung</label>
                        <textarea class="form-control" rows="3" name="title"></textarea>
                    </div>
                    <button name="btn_Luu" class="btn btn-success" onclick="go()">Lưu</button>
                    <?php
                    $previous = "javascript:history.go(-1)";
                    if (isset($_SERVER['HTTP_REFERER'])) {
                        $previous = $_SERVER['HTTP_REFERER'];
                    }
                    ?>
                    <a href="<?= $previous ?>" class="btn btn-warning">Back</a>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        function go(){
            alert("Thêm phim thành công!");
        }
    </script>
</body>       
</html>