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
    <title>Admin</title>
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
<form action="http://localhost/WEB_FILM/admin/login.php" method="post">
    <div class="popup">
                        <div class="close-btn">&times;</div>
                        <div class="form">
                            <h2>Đăng Nhập</h2>
                            <div class="form-element">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Nhập email">
                            </div>
                            <div class="form-element">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" placeholder="Nhập mật khẩu">
                            </div>
                            <div class="form-element">
                            <input type="checkbox" name="checkbox" id="checkbox" placeholder="">
                                <label for="remember">Nhớ mật khẩu</label>
                            </div>
                            <div class="form-element">
                                <button name="btn_submit" >Đăng nhập</button>
                            </div>
                            <div class="form-element">
                                <a href="#">Quên mật khẩu?</a>
                            </div>
                        </div>
                    </div>
            </div>
</form>
<?php
   require_once('../database/connectDB.php');
   require_once('../database/dbhelper.php');
   if (isset($_POST["btn_submit"]) && $_POST["email"] != '' && $_POST["password"] != '') {
       $username = $_POST["email"];
       $password = $_POST["password"];
       // $password = md5($password);
       $sql = "SELECT * FROM Khachhang WHERE email = '$username' AND matkhau = '$password' ";
       execute($sql);
       $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
       $user = mysqli_query($con, $sql);
        if (mysqli_num_rows($user) > 0) {
           echo '<script language="javascript">
               alert("Đăng nhập thành công!"); 
               window.location = "./index.php";
           </script>';
           $_SESSION['email'] = $username;
          //  $username = trim(strip_tags($_POST['email']));
          //  $password = trim(strip_tags($_POST['password']));
          //  session_start();
          //  setcookie("email", $username, time() + 30 * 24 * 60 * 60, '/');
          //  setcookie("password", $password, time() + 30 * 24 * 60 * 60, '/');
       } else {
           echo '<script language="javascript">
               alert("Tài khoản và mật khẩu không chính xác !");
               window.location = "./login.php";
            </script>';
       }
   }
    ?>
</body>
</html>