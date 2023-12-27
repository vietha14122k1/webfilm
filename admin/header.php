<?php
require_once('../database/connectDB.php');
require_once('../database/dbhelper.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/WEB_FILM/admin/index.css">
    <link rel="stylesheet" href="accets/plugin/fontawesome-free/css/all.css">
    <link rel="icon" href="http://localhost/WEB_FILM/accets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
    <header>
        <div class="grid">
            <div class="header-menu">
                <div class="header-menu-logo">
                    <a href="http://localhost/WEB_FILM/admin/"><img src="http://localhost/WEB_FILM/admin/logo.png" alt="CENIMAX"></a>
                    
                </div>
                <div class="header-menu-list">
                    <div class="header-menu-list-item"><a href="http://localhost/WEB_FILM/admin/phim">Phim</a></div>
                    <div class="header-menu-list-item"><a href="http://localhost/WEB_FILM/admin/khachhang">Khách Hàng</a></div>
                    <div class="header-menu-list-item"><a href="http://localhost/WEB_FILM/admin/">Thống kê</a></div>
                </div>
                <div class="header-menu-right">User: Admin</div>
            </div>
        </div>
    </header>
    <hr>
