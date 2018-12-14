<?php
   session_start();
   if (isset($_POST['id_user'])) { 
        $id_user = $_POST['id_user'];
    } 
    if (isset($_POST['status'])) { 
      $status = $_POST['status'];
  } 
require 'connect.php';
$sql = "CALL update_user_status({$id_user}, \"{$status}\")";
$result = $conn->query($sql);
    // Проверяем, есть ли ошибки
    if ($result)
    {
      $_SESSION['msg'] = "Статус користувача змінено";
    }
    else{
      $_SESSION['msg'] = "Сталась невідома помилка".$sql;
    }
    exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");

    ?>