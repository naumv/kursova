<?php
    session_start();
    $_SESSION['output'] = "out_video_in_group.php";
    $_SESSION['max_page'] = 0;
    $_SESSION['page'] = 0;
    if (isset($_POST['id_group'])) { 
        $_SESSION['id_group'] = $_POST['id_group'];
    } 
    else
    {
        $_SESSION['msg'] = "Переданий невірний ідентифікатор групи";
    }
    exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
?>