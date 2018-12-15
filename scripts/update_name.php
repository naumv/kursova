<?php
session_start();
if(empty($_SESSION['login']) or empty($_SESSION['id_user'])) 
{
    $_SESSION['msg'] = "Доступ до даного функціоналу є лише в зареєстрованих користувачів.
    Ввійдіть або зареєструйтесь.";
    exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
}
if (isset($_POST['name'])) { 
    $name = $_POST['name'];
} 
$name = trim($name);
if ($name =='') { unset($name);} 
if (empty($name))
    {
      $_SESSION['error'] = "Ви ввели некоректне ім'я";
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=/index.php'></head></html>");
    }
else{
    require 'connect.php';
    $sql = "CALL update_user_name(?,?)";
    //$result = $conn->query("CALL update_user_name({$_SESSION['id_user']}, '{$name}')");
    $result = $conn->prepare($sql);
    $result->bind_param("is", $_SESSION['id_user'], $name);
    $result->execute(); 
    //$result = $result->get_result();
    if(!$result)
     {
         $_SESSION['error'] = "Зміна імені не вдалася";
     }   
     else
     {
         unset($_SESSION['error']);
         $_SESSION['name'] = $name;
     }
}
exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=/index.php'></head></html>");
?>