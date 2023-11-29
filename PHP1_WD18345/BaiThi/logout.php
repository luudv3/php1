<?php
session_start(); // Khởi động session

unset($_SESSION['username']); // Xóa biến 'username' khỏi session
unset($_SESSION['password']); // Xóa biến 'password' khỏi session

header('location:login.php'); // Chuyển hướng người dùng đến trang login.php
?>
