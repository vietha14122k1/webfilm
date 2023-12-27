<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accets/css/index.css">
    <link rel="stylesheet" href="accets/plugin/fontawesome-free/css/all.css">
    <link rel="icon" href="accets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng nhập</title>
    <style>
        

  .btl-login{
    border: none;
  }
  .popup{
    /* z-index: 99;
    position: absolute;
    top: -150%;
    left: 50%;
    opacity: 0;
    transform: translate(-50%, -50%) scale(1.25);
    width: 380px; */
    padding: 20px 30px;
    background-color: #dee2e6;
    box-shadow: 2px 2px 5px 5px rgba(0, 0, 0, 0.15);
    border-radius: 10px;
    transition:top 0ms ease-in-out 200ms,
    opacity 0ms ease-in-out 200ms,
    transform 0ms ease-in-out 200ms;
  }
  .popup.active{
    top: 50%;
    opacity: 1;
    transform: translate(-50%, -50%) scale(1);
    transition:top 0ms ease-in-out 0ms,
    opacity 0ms ease-in-out 0ms,
    transform 0ms ease-in-out 0ms;
  }
  .popup .close-btn{
    position: absolute;
    top: 10px;
    right: 10px;
    width: 15px;
    height: 15px;
    background-color: #888;
    color: #eee;
    text-align: center;
    line-height: 15px;
    border-radius: 15px;
    cursor: pointer;
  }
  .popup .form h2 {
    text-align: center;
    color: #222;
    margin: 10px 0px 20px;
    font-size: 25px;
  }

  .popup .form.form-element{
    margin: 15px 0px;
  }
  .popup .form .form-element label{
    font-size: 14px;
    color: #222;

  }
  .popup .form .form-element input[type="email"],
  .popup .form .form-element input[type="password"],
  .popup .form .form-element input[type="text"],
  .popup .form .form-element input[type="date"],
  .popup .form .form-element select option
  {
    margin-top: 5px;
    display: block;
    width: 100%;
    padding: 10px;
    outline: none;
    border: 1px solid #aaa;
    border-radius: 5px;
  }
  .popup .form .form-element input[type="checkbox"]{
    margin-right: 5px;
  }
  .popup .form .form-element button{
    width: 100%;
    height: 40px;
    border: none;
    outline: none;
    font-size: 1.5rem;
    background-color: #222;
    color: #f5f5f5;
    border-radius: 10px;
    cursor: pointer;
  }
  .popup .form .form-element a{
    display: block;
    text-align: right;
    font-size: 1.5rem;
    color: #1a79ca;
    text-decoration: none;
    font-weight: 600;
  }
    </style>
</head>
<body>
  
<?php
$conn=mysqli_connect("localhost","root","","web-film");
if(!$conn) echo 'Ket noi khong thanh cong';

	// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
	if (isset($_POST["btn_submit"])) {
		// lấy thông tin người dùng
		$username = $_POST["email"];
		$password = $_POST["password"];
		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);
		if ($username == "" || $password =="") {
			echo "username hoặc password bạn không được để trống!";
		}else{
			$sql = "select * from khachhang where email = '$username' and matkhau = '$password' ";
			$query = mysqli_query($conn,$sql);
			$num_rows = mysqli_num_rows($query);
			if ($num_rows==0) {
				echo "tên đăng nhập hoặc mật khẩu không đúng !";
			}else{
				//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
				$_SESSION['email'] = $username;
                // Thực thi hành động sau khi lưu thông tin vào session
               
                header('Location: http://localhost/WEB_FILM/layout/login.php');
			}
		}
	}
?>
<form action="" method="post">
    <div class="popup">
                        <div class="close-btn">&times;</div>
                        <div class="form">
                            <h2>Đăng Ký</h2>
                            <div class="form-element">
                                <label for="email">Họ và tên</label>
                                <input type="text" name="hoten" id="hoten" placeholder="Nhập họ tên">
                            </div>
                            <div class="form-element">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Nhập email">
                            </div>
                            <div class="form-element">
                                <label for="email">Số điện thoại</label>
                                <input type="text" name="sdt" id="sdt" placeholder="Nhập sdt">
                            </div>
                            <div class="form-element">
                                <label for="email">Ngày sinh</label>
                                <input type="date" name="ngaysinh" id="sdt" placeholder="Nhập sdt">
                            </div>
                            <div class="form-element">
                                <label for="email">Giới tính</label>
                                <Select name="gioitinh">
                                  <option value="">---Vui lòng chọn giới tính---</option>
                                  <option value="Nam">Nam</option>
                                  <option value="Nữ">Nữ</option>
                                  <option value="Khác">Khác</option>
                                </Select>
                            </div>
                            <div class="form-element">
                                <label for="email">Địa chỉ</label>
                                <input type="text" name="diachi" id="sdt" placeholder="Nhập sdt">
                            </div>
                            <div class="form-element">
                                <label for="password">Password</label>
                                <input type="password" name="password"  placeholder="Nhập mật khẩu">
                            </div>
                            <div class="form-element">
                                <label for="password">Nhập lại Password</label>
                                <input type="password" name="re-password" placeholder="Nhập mật khẩu">
                            </div>
                            <br>
                            <div class="form-element">
                                <button name="submit">Đăng ký</button>
                            </div>
                        </div>
                    </div>
            </div>
</form>
    
  <?php
  require_once('../database/connectDB.php');
  require_once('../database/dbhelper.php');
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['submit']) && $_POST['hoten'] != "" && $_POST['email'] != "" && $_POST['sdt'] != "" && $_POST['password'] != "" && $_POST['re-password'] !="" && $_POST['ngaysinh'] !="" && $_POST['gioitinh'] !="" && $_POST['diachi'] != "") {
      $name = $_POST['hoten'];
  
      $pass = $_POST['password'];
      $repass = $_POST['re-password'];
      $phone = $_POST['sdt'];
      $email = $_POST['email'];
      $ngaysinh = $_POST['ngaysinh'];
      $gioitinh = $_POST['gioitinh'];
      $diachi = $_POST['diachi'];
      //kiểm tra trùng paswword không
      if ($pass != $repass) {
        echo '<script language="javascript">
                    alert("Nhập không trùng mật khẩu, vui lòng đăng ký lại!");
                    window.location = "register.php";
              </script>';
        die();
      }
      //kiểm tra username
      $sql = "SELECT * FROM khachhang where sdt = '$phone' OR email='$email'";
      $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        echo '<script language="javascript">
                 alert("Số điện thoại hoặc Email đã được sử dụng!");
                 window.location = "register.php";
             </script>';
        die();
      }
      
      $sql = 'INSERT INTO khachhang(hoten,email,sdt,ngaysinh,gioitinh,diachi,matkhau) values ("' . $name . '","' . $email . '","' . $phone . '","' . $ngaysinh . '","' . $gioitinh . '","' . $diachi . '","' . $pass . '")';
      execute($sql);
      echo '<script language="javascript">
                alert("Bạn đăng ký thành công!");
                window.location = "login.php";
             </script>';
    } else {
      echo '<script language="javascript">
    alert("hãy nhập đủ thông tin!");
    window.location = "register.php";
    </script>';
    }
  }
  ?>
</body>
</html>