<?php
   session_start();
   if(empty($_SESSION['login']) or empty($_SESSION['id_user'])) 
   {
       $_SESSION['msg'] = "Доступ до даного функціоналу є лише в зареєстрованих користувачів.";
       exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
   }
   if (isset($_POST['id_video'])) { 
        $id_video = $_POST['id_video'];
    } 
    if (isset($_POST['status'])) { 
      $status = $_POST['status'];
  } 
require 'connect.php';
$sql = "CALL update_user_has_video_status(?,?,?)";
$result = $conn->prepare($sql);
$result->bind_param("iis", $_SESSION['id_user'], $id_video, $status);
$result = $result->execute(); 
//$result = $conn->query($sql);
    // Проверяем, есть ли ошибки
    if ($result)
    {
      $_SESSION['msg'] = "Статус відео змінено";
    }
    else{
      $_SESSION['msg'] = "Сталась невідома помилка";
    }
    exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");

    ?>