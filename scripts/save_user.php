<?php
   session_start();
    if (isset($_POST['login'])) { 
        $login = $_POST['login']; 
        
    } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { 
        $password=$_POST['password']; 
        
    }
    if (isset($_POST['name'])) { 
        $name = $_POST['name']; 
        
    } 
    if (isset($_POST['password_two'])) { 
      $password_two=$_POST['password_two']; 
      if ($password_two =='') { unset($password_two);} 
  }
  $login = trim($login);
  $password = trim($password);
  $name = trim($name);
  $password_two = trim($password_two);
  if ($login == '') { unset($login);} 
  if ($password =='') { unset($password);} 
  if ($name == '') { $name = 'Користувач';} 
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
      $_SESSION['error'] = "Будь ласка, заповніть всі поля";
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");

    }
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $name = stripslashes($name);
    $name = htmlspecialchars($name);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $password_two = stripslashes($password_two);
    $password_two = htmlspecialchars($password_two);
    if ($password !== $password_two)
    {
      $_SESSION['error'] = "Ви ввели різні паролі";
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
    }
 //удаляем лишние пробелы
    $password = sha1($password);
 // подключаемся к базе
    include ("connect.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
 // проверка на существование пользователя с таким же логином
    //$result = $conn->query("SELECT id_user FROM users WHERE login='$login'");
    $sql = "SELECT id_user FROM users WHERE login= ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if ($row) {
      $_SESSION['error'] = "Вибачте, логін {$login} вже зайнято, спробуйте інший.";
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");

    }
 // если такого нет, то сохраняем данные
    //$result2 = $conn->query("INSERT INTO users (login,password_hash, name) VALUES('$login','$password', '$name')");
    // Проверяем, есть ли ошибки
    $sql = "CALL insert_user(?,?,?)";
    $result2 = $conn->prepare($sql);
    $result2->bind_param("sss", $login,$password, $name);
    $result2->execute(); 
    if ($result2)
    {
      //$result = $conn->query("SELECT * FROM users WHERE login = {$login}");
      $sql = "SELECT * FROM users WHERE login = ?";
      $result = $conn->prepare($sql);
      $result->bind_param("s", $login);
      $result->execute(); 
      $result = $result->get_result();
      $row = $result->fetch_assoc();
      $_SESSION['login']=$row['login']; 
      $_SESSION['id_user']=$row['id_user'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['status'] = $row['status'];
      unset($_SESSION['error']);
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
    }
 else {
      $_SESSION['error'] = "Невідома помилка, Ви не зареєструвані.";
      exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
    }
    ?>