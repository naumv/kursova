<?php
   session_start();
   if (isset($_POST['name'])) { 
        $name = $_POST['name']; 
    } 
    if (isset($_POST['url'])) { 
      $url = $_POST['url']; 
  }
  $name = trim($name);
  $url = trim($url);
    if ($name == '') { unset($name);}
    if ($url == '') { unset($url);} 
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    if (empty($name) or empty($url)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
      $_SESSION['msg'] = "Будь ласка, заповніть всі поля";
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");

    }
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $name = stripslashes($name);
    $name = htmlspecialchars($name);
    $url = stripslashes($url);
    $url = htmlspecialchars($url);
    // подключаемся к базе
    include ("connect.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
 // проверка на существование пользователя с таким же логином
    $result = $conn->query("SELECT id_video FROM videos WHERE name='$name' AND url = '$url'");
    $row = $result->fetch_assoc();
    if (!empty($row['id_video'])) {
      $_SESSION['msg'] = "Вибачте, дане відео вже додано на сайт.";
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");

    }
 // если такого нет, то сохраняем данные
    $result2 = $conn->query("INSERT INTO videos (name, url) VALUES('$name', '$url')");
    // Проверяем, есть ли ошибки
  
    if ($result2)
    {
      $_SESSION['msg'] = "Відео успішно додане";
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
    }
 else {
      $_SESSION['msg'] = "Невідома помилка, Ви не зареєструвані.";
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
    }
    ?>