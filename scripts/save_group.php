<?php
   session_start();
   if (isset($_POST['name'])) { 
        $name = $_POST['name']; 
    } 
  $name = trim($name);

    if ($name == '') { unset($name);}
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    if (empty($name)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
      $_SESSION['msg'] = "Будь ласка, заповніть всі поля";
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");

    }
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $name = stripslashes($name);
    $name = htmlspecialchars($name);
    // подключаемся к базе
    include ("connect.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
 // проверка на существование пользователя с таким же логином
    $result = $conn->query("SELECT id_group FROM groups WHERE name='$name'");
    $row = $result->fetch_assoc();
    if (!empty($row['id_group'])) {
      $_SESSION['msg'] = "Вибачте, група з таким ім'ям вже є на сайті";
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");

    }
 // если такого нет, то сохраняем данные
    $result2 = $conn->query("INSERT INTO groups (name) VALUES('$name')");
    // Проверяем, есть ли ошибки
  
    if ($result2)
    {
      $_SESSION['msg'] = "Група успішно додана";
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
    }
 else {
      $_SESSION['msg'] = "Невідома помилка, група не додана";
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
    }
    ?>