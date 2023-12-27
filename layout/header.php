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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>CENIMAX</title>
</head>

<body>

    <header class="header">
        <div class="grid">
            <div class="header-wrap">
                <div class="header-logo">
                    <a href="/" class="header-logo__wrapper">
                        <img class="img-fluid" src="accets/img/logo.png" alt="CENIMAX" title="CENIMAX">
                    </a>
                </div>
                <div class="navigation">
                    <!-- <nav>
                        <i class="fa fa-magnifying-glass"></i>
                            <p class="navigation-list">Tầng 4 TTTM CoopMart, Tôn Đức Thắng, Khai Quang, Vĩnh Yên, Vĩnh Phúc</p>
                        </nav> -->
                    <!-- <button type="submit" style="height: 35px;
                                                    width: 35px;
                                                    margin: 0px;
                                                    margin-right: -3px;
                                                    border-radius: 5px;">
                                                    <i class="fa fa-magnifying-glass" style="box-sizing: border-box;"></i></button> -->

                    <input type="search" class="input-search" name="search" id="" placeholder="Tìm mã đặt chỗ" style=" height: 40px; font-size: 1.4rem;">
                </div>
                <div class="header-right">
                    <?php
                    $id = $_GET['email'];
                    $_SESSION['email'] = $id;
                    if (isset($_SESSION['email'])) {
                        $_SESSION['email'] = $id;
                        echo '<button class="btn-login"><a style="border: none" href="">' .  $_SESSION['email'] .  '</a></button>
                        <div class="logout">
                         <br>
                         <a href="http://localhost/WEB_FILM/layout/login.php"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
                            </div>
                        ';
                    } else {
                        echo ' <a href="http://localhost/WEB_FILM/layout/login.php"><input type="button" class="btl-login" id="show-login" value="Đăng nhập"></a>
                                ';
                    }
                    ?>
                </div>

            </div>

    </header>
    <script>
        // document.querySelector("#show-login").addEventListener("click", function() {
        //     document.querySelector(".popup").classList.add("active")
        // });
        // document.querySelector(".popup .close-btn").addEventListener("click", function() {
        //     document.querySelector(".popup").classList.remove("active")
        // });
    </script>