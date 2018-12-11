<?php
    if (isset($_POST['login'])) { 
        $login = $_POST['login']; 
        if ($login == '') { unset($login);} 
    } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { 
        $password=$_POST['password']; 
        if ($password =='') { unset($password);} 
    }
    if (isset($_POST['name'])) { 
        $name = $_POST['name']; 
        if ($name == '') { $name = 'Користувач';} 
    } 
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $name = stripslashes($name);
    $name = htmlspecialchars($name);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
 //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
    $name = trim($name);
 // подключаемся к базе
    include ("connect.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
 // проверка на существование пользователя с таким же логином
    $result = $conn->query("SELECT idUser FROM Users WHERE login='$login'");
    $row = $result->fetch_assoc();
    echo "start ".$login." ".$password."\n";
    if (!empty($row['idUser'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
 // если такого нет, то сохраняем данные
    $result2 = $conn->query("INSERT INTO Users (login,passwordHash, name) VALUES('$login','$password', '$name')");
    // Проверяем, есть ли ошибки
    if ($result2)
    {
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='../index.php'>Главная страница</a>";
    }
 else {
    echo "Ошибка! Вы не зарегистрированы.";
    }
    ?>