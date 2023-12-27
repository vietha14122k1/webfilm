<?php
session_start();
if (isset($_COOKIE['email']) ) {
    setcookie("email", "", time() - 30 * 24 * 60 * 60, '/');
    setcookie("password", "", time() - 30 * 24 * 60 * 60, '/');
    header('Location: ../index.php');
}
