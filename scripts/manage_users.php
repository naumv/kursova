<?php
    session_start();
    $_SESSION['output'] = "out_manage_users.php";
    $_SESSION['max_page'] = 0;
    $_SESSION['page'] = 0;
    exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
?>