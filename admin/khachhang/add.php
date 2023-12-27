<?php
session_start();
require_once('../database/connectDB.php');
require_once('../database/dbhelper.php');

?>

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
    <title>Đăng ký</title>
    <style>
  .btl-login{
    border: none;
  }
  .popup{
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
  .popup .form .form-element input[type="text"],
  .popup .form .form-element input[type="date"],
  .popup .form .form-element input[type="password"]{
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


<form action="add.php" method="post">
    <div class="popup">
                        <div class="close-btn">&times;</div>
                        <div class="form">
                            <h2>Đăng Ký</h2>
                            <div class="form-element">
                                <label for="email">User Name</label>
                                <input type="text" name="username" id="username" placeholder="Nhập username" required="required">
                            </div>
                            <div class="form-element">
                                <label for="email">Họ Tên</label>
                                <input type="text" name="hoten" id="hoten" placeholder="Nhập họ tên" required="required">
                            </div>
                            <div class="form-element">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Nhập email" required="required">
                            </div>
                            <div class="form-element">
                                <label for="email">Số Điện Thoại</label>
                                <input type="text" name="sdt" id="ngaysinh" placeholder="Nhập số điện thoại" required="required">
                            </div>
                            <div class="form-element">
                                <label for="email">Ngày Sinh</label>
                                <input type="date" name="ngaysinh" id="ngaysinh" placeholder="Nhập ngày sinh" required="required">
                            </div>
                            <div class="form-element">
                                <label for="email">Giới tính</label>
                                <input type="text" name="gioitinh" id="gioitinh" placeholder="Nhập giới tính" required="required">
                            </div>
                            <div class="form-element">
                                <label for="email">Địa Chỉ</label>
                                <input type="text" name="diachi" id="diachi" placeholder="Nhập địa chỉ" required="required">
                            </div>
                            <div class="form-element">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" placeholder="Nhập mật khẩu">
                            </div>
                            <div class="form-element">
                                <button name="btn_submit" >Đăng ký</button>
                            </div>
                            <div class="form-element">
                                <a href="#">Quay lại</a>
                            </div>
                        </div>
                    </div>
            </div>
</form>
<?php

   if (isset($_POST["btn_submit"]) && $_POST["email"] != '' && $_POST["password"] != ''&& $_POST["sdt"] != ''&& $_POST["username"] != ''&& $_POST["hoten"] != ''&& $_POST["ngaysinh"] != ''&& $_POST["gioitinh"] != ''&& $_POST["diachi"] != '') {
       $username = $_POST["username"];
       $hoten = $_POST["hoten"];
       $email = $_POST["email"];
       $sdt = $_POST["sdt"];
       $ngaysinh = $_POST["ngaysinh"];
       $gioitinh = $_POST["gioitinh"];
       $diachi = $_POST["diachi"];
       $password = $_POST["password"];
       $sql = "INSERT INTO khachhang (hoten, username, email, sdt, ngaysinh, gioitinh, diachi, matkhau) VALUES ('$hoten','$username','$email','$sdt','$ngaysinh','$gioitinh','$diachi','$password')";
       execute($sql);
       $id=$_POST['email'];
       $id=$email;
       $email =$_GET['email'];
       echo '<script language="javascript">
           alert("Bạn đã tạo thành công!");
           window.location = "../index.php?email='.$id.'";
        </script>';
      exit();
   }
    ?>
</body>
</html>