<?php
   session_start();
   if    (empty($_SESSION['login']) or empty($_SESSION['id_user'])) 
   {
       $_SESSION['msg'] = "Доступ до даного функціоналу є лише в зареєстрованих користувачів.
       Ввійдіть або зареєструйтесь.";
       exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
   }
    if (isset($_POST['id_video'])) { 
        $id_video = $_POST['id_video']; 
        
    } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    if (empty($_SESSION['id_user']) or empty($id_video)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
      $_SESSION['msg'] = "Вибачте, сталась помилка";
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
    }
 // подключаемся к базе
    include ("connect.php");
   $sql = "INSERT INTO user_has_video (id_user, id_video) VALUES(?,?)";
   $result = $conn->prepare($sql);
   $result->bind_param("ii", $_SESSION['id_user'], $id_video);
   $result = $result->execute(); 
   //$result = $conn->query($sql);
    if ($result)
    {
      $_SESSION['msg'] = "Відео успішно додане";
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
    }
 else {
      $_SESSION['msg'] = "Помилка при додаванні, можливо Ви вже додали це відео.";
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
    }
    ?>