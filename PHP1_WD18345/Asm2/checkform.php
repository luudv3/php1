<?php
include("them.php");
session_start();

function validateAge($age){
    //Tuổi là số nguyên không âm
    return preg_match('/^\d+/', $age);
}
function validateName($name){
    return preg_match('/^[a-zA-Z]+/', $name);
}
if($_SERVER['REQUEST_METHOD']=== "POST"){
    $name = $_POST['name'];
    $age = $_POST['age'];
    if(!validateName($name)){
        $_SESSION["nameErr"]= "Tên không được chứa các kí tự đặc biệt";
    }else{
        $_SESSION["nameErr"]= "";
    }
    if(!validateAge($age)){
        $_SESSION["nameErr"]= "Tên không được nhập số âm";
    }else{
        $_SESSION["nameErr"]= "";
    }
    if($_SESSION['nameErr']=="" && $_SESSION['ageErr']==""){
        include("connection.php");
        $desscription = $_POST['desscription'];
        $sql = "INSERT INTO students (name, age, mota, img)VALUE (:name, :age, :mota, :img)";
        $stmt = $conn -> prepare($sql);

        if($stmt -> execute([":name" => $name, ":age" => $age, ":mota" => $mota, ":img" => $img])){
            header("location: index.php");
            exit();
        }else{
            echo "Error" . $stmt -> ErrorInfo()[2];
        }
    }
}
?>