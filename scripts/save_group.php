<?php
   session_start();
   session_start();
   if(empty($_SESSION['login']) or empty($_SESSION['id_user']) or ($_SESSION['status'] != 'a' and $_SESSION['status'] != 'm')) 
   {
       $_SESSION['msg'] = "У Вас відсутні права на дану дію";
       exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
   }
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
 $sql = "SELECT id_group FROM groups WHERE name=?";
 $result = $conn->prepare($sql);
$result->bind_param("s", $name);
$result->execute(); 
$result = $result->get_result();
    //$result = $conn->query("SELECT id_group FROM groups WHERE name='$name'");
    $row = $result->fetch_assoc();
    if (!empty($row['id_group'])) {
      $_SESSION['msg'] = "Вибачте, група з таким ім'ям вже є на сайті";
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");

    }
 // если такого нет, то сохраняем данные
 $sql2 = "INSERT INTO groups (name) VALUES(?)";
 $result2 = $conn->prepare($sql2);
 $result2->bind_param("s", $name);
 $result2 = $result2->execute(); 
    //$result2 = $conn->query("INSERT INTO groups (name) VALUES('$name')");
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