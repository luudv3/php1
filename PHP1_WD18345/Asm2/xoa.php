<?php
include("connection.php");
if($_SERVER['REQUEST_METHOD']=== "POST"){
    $id = $_POST['id'];

    $sql = "DELETE FROM students WHERE id = :id";

    $stmt = $conn -> prepare($sql);

if($stmt -> execute(array(':id' => $id))){
    header("location:index.php");
    exit();
}else{
    echo "error:" . $stmt -> errorInfo()[2];
}
}
?>