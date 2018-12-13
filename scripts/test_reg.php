<?php
    session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
if (isset($_POST['login'])) 
{ $login = $_POST['login']; 
    if ($login == '') { unset($login);} 
} //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { 
        $password=$_POST['password']; 
    if ($password =='') { unset($password);} 
    }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
        $_SESSION['error'] = "Будь ласка, заповніть всі поля";
        exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=/index.php'></head></html>");
    }
    //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
$password = stripslashes($password);
    $password = htmlspecialchars($password);
//удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
    $password = sha1($password);
// подключаемся к базе
    include ("connect.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
$result = $conn->query("SELECT * FROM Users WHERE login='$login'"); //извлекаем из базы все данные о пользователе с введенным логином
$row = $result->fetch_assoc();
    if (empty($row['passwordHash']))
    {
    //если пользователя с введенным логином не существует
    $_SESSION['error'] = "Користувача {$login} не знайдено";
        exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=/index.php'></head></html>");
    }
    else {
    //если существует, то сверяем пароли
    if ($row['passwordHash']==$password) {
    //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
    $_SESSION['login']=$row['login']; 
    $_SESSION['idUser']=$row['idUser'];
    $_SESSION['name'] = $row['name'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
    exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=/index.php'></head></html>");
    unset($_SESSION['error']);
    }
 else {
    //если пароли не сошлись

    $_SESSION['error'] = "Введено невірний пароль";
        exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=/index.php'></head></html>");
    }
    }
?>