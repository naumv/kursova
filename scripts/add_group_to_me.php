<?php
   session_start();
   if    (empty($_SESSION['login']) or empty($_SESSION['id_user'])) 
   {
       $_SESSION['msg'] = "Доступ до даного функціоналу є лише в зареєстрованих користувачів.
       Ввійдіть або зареєструйтесь.";
       exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
   }
    if (isset($_POST['id_group'])) { 
        $id_group = $_POST['id_group']; 
        
    } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    if (empty($_SESSION['id_user']) or empty($id_group)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
      $_SESSION['msg'] = "Вибачте, сталась помилка";
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
    }
 // подключаемся к базе
    include ("connect.php");
   $sql = "INSERT INTO user_has_group (id_user, id_group) VALUES(?,?)";
   $result = $conn->prepare($sql);
   $result->bind_param("ii", $_SESSION['id_user'], $id_group);
   $result = $result->execute();
  // $result = $conn->query($sql);
    if ($result)
    {
      $_SESSION['msg'] = "Група успішно додана";
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
    }
 else {
      $_SESSION['msg'] = "Помилка при додаванні, можливо Ви вже додали цю групу.";
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
    }
    ?>