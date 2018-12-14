<?php
   session_start();
   if (isset($_POST['id_video'])) { 
        $id_video = $_POST['id_video'];
    } 
    if (isset($_POST['status'])) { 
      $status = $_POST['status'];
  } 
require 'connect.php';
$sql = "CALL update_user_has_video_status({$_SESSION['id_user']},{$id_video}, \"{$status}\")";
$result = $conn->query($sql);
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