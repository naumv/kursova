<?php
    session_start();
    $_SESSION['output'] = "out_my_video.php";
    exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
?>