<?php
   session_start();
   if(empty($_SESSION['login']) or empty($_SESSION['id_user']) or ($_SESSION['status'] != 'a' and $_SESSION['status'] != 'm')) 
   {
       $_SESSION['msg'] = "У Вас відсутні права на дану дію";
       exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
   }
    if (isset($_POST['id_video'])) { 
        $id_video = $_POST['id_video']; 
        
    } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    if (empty($_SESSION['id_group']) or empty($id_video)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
      $_SESSION['msg'] = "Вибачте, сталась помилка";
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
    }
 // подключаемся к базе
    include ("connect.php");
   $sql = "INSERT INTO video_has_group (id_group, id_video) VALUES(?,?)";
   $result = $conn->prepare($sql);
   $result->bind_param("ii", $_SESSION['id_group'],$id_video);
   $result = $result->execute(); 
   //$result = $conn->query($sql);
    if ($result)
    {
      $_SESSION['msg'] = "Відео успішно додане в групу";
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
    }
 else {
      $_SESSION['msg'] = "Помилка при додаванні, можливо це відео вже присутнє в групі.";
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
    }
    ?>