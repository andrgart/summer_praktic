<?php

if (isset($_POST["img_submit"]) && isset($_FILES["my_mp3"])) {
    echo "Hello";

    $myMp3 = $_FILES["my_mp3"];


    require_once "config.php";
    $connect = mysqli_connect($host, $user, $pass, $db); //соед с БД
    if(!$connect){
        die();
    }

    // используем подготовленный запрос
    // $result = mysqli_prepare($connect, "INSERT INTO `test_table`(`name`) VALUES (?)");

    // mysqli_stmt_bind_param($result, "s", $name); //ss

    // $res = mysqli_stmt_execute($result);
}
else  {
    echo "Exeption";
}