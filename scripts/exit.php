<?php
    session_start();
    if    (empty($_SESSION['login']) or empty($_SESSION['id_user'])) 
        {
            $_SESSION['msg'] = "Доступ до даного функціоналу є лише в зареєстрованих користувачів.";
            exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
        }
        else{
            unset($_SESSION['login']); 
            unset($_SESSION['id_user']);//    уничтожаем переменные в сессиях
            unset($_SESSION['output']);
            unset($_SESSION['id_group']);
           
        }
        exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
            // отправляем пользователя на главную страницу.
?>