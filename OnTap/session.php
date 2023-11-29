<?php
session_start(); //Đặt trước cacs thẻ HTML, các lẹnh echo,print
$_SESSION["username"] = "admin";
echo '<a href="getsession.php">session</a>';
?>