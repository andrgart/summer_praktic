<?php
$song_path = $_GET['song_path'];
$user_name = $_GET['user_name'];
$test = '';

require_once "config.php";
$connect = mysqli_connect($host, $user, $pass, $db); 
if(!$connect){
    echo false;
    die();
}

$result = mysqli_query($connect, "SELECT `id` FROM `users` WHERE `user_name` = '$user_name'");
$user_id_list = mysqli_fetch_array($result);
$user_id = $user_id_list[0]; 

$result2 = mysqli_query($connect, "SELECT * FROM `songs` WHERE `song_path` = '$song_path'");
while($row = mysqli_fetch_array($result2)){
    $song_id = $row['id'];
}

$test_array = array();
$add_test = 0;

$is_there_record = 0;
mysqli_query($connect, "SET CHARSET UTF8;");
$result3 = mysqli_query($connect, "SELECT * FROM `user_songs`;");
while($row = mysqli_fetch_array($result3)){
    if(($song_id == $row['song_id'] && $user_id == $row['user_id'])){
        $is_there_record = 1;
    }
}

if($is_there_record == 0){
    $add_test = 1;
    $result = mysqli_prepare($connect, "INSERT INTO `user_songs`(`user_id`, `song_id`) VALUES (?,?)");
    mysqli_stmt_bind_param($result, "ss", $user_id, $song_id); //ss
    $res = mysqli_stmt_execute($result);
}

echo $add_test;