<?php
   session_start();
   session_start();
   if(empty($_SESSION['login']) or empty($_SESSION['id_user']) or $_SESSION['status'] != 'a') 
   {
       $_SESSION['msg'] = "У Вас відсутні права на дану дію";
       exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
   }
   if (isset($_POST['id_user'])) { 
        $id_user = $_POST['id_user'];
    } 
    if (isset($_POST['status'])) { 
      $status = $_POST['status'];
  } 
require 'connect.php';
$sql = "CALL update_user_status(?,?)";
$result = $conn->prepare($sql);
$result->bind_param("is", $id_user,$status);
$result = $result->execute(); 
//$result = $conn->query($sql);
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