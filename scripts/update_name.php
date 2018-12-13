<?php
session_start();
if (isset($_POST['name'])) { 
    $name = $_POST['name'];
} 
$name = trim($name);
if ($name =='') { unset($name);} 
if (empty($name)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
      $_SESSION['error'] = "Ви ввели некоректне ім'я";
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=/index.php'></head></html>");

    }
else{
    require 'connect.php';
    $result = $conn->query("CALL updateUserName({$_SESSION['idUser']}, {$name})");
    if(!$result)
     {
         $_SESSION['error'] = "Зміна імені не вдалася";
     }   
     else
     {
         unset($_SESSION['error']);
     }
}
?>