<?php
    session_start();
if (isset($_POST['login'])) 
{ $login = $_POST['login']; 
    if ($login == '') { unset($login);} 
} 
    if (isset($_POST['password'])) { 
        $password=$_POST['password']; 
    if ($password =='') { unset($password);} 
    }
  
if (empty($login) or empty($password)) 
    {
        $_SESSION['error'] = "Будь ласка, заповніть всі поля";
        exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=/index.php'></head></html>");
    }
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
$password = stripslashes($password);
    $password = htmlspecialchars($password);
//удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
    $password = sha1($password);
// подключаемся к базе
    require ("connect.php");
    //$result = $conn->query("SELECT * FROM users WHERE login='$login'"); //извлекаем из базы все данные о пользователе с введенным логином
    $sql = "SELECT * FROM users WHERE login= ?";
    $result = $conn->prepare($sql);
    $result->bind_param("s",$login);
    $result->execute(); 
    $result = $result->get_result();
    $row = $result->fetch_assoc();
    if (empty($row['password_hash']) or $row['status'] == 'd')
    {
    //если пользователя с введенным логином не существует
    $_SESSION['error'] = "Користувач {$login} не існує або він заблокований";
        exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
    }
    else {
    //если существует, то сверяем пароли
    if ($row['password_hash']==$password) {
    //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
    $_SESSION['login']=$row['login']; 
    $_SESSION['id_user']=$row['id_user'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['status'] = $row['status'];
    //эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
    unset($_SESSION['error']);
    exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
    }
 else {
    //если пароли не сошлись
    $_SESSION['error'] = "Введено невірний логін або пароль";
        exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
    }
    }
?>