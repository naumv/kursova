<?php
session_start();
if (isset($_POST['page_crement'])) { 
        $page_crement = $_POST['page_crement']; 
        $_SESSION['page'] += $page_crement;
        if ($_SESSION['page'] < 0 ) $_SESSION['page'] = 0;
        if ($_SESSION['page'] > $_SESSION['max_page'] ) $_SESSION['page'] = $_SESSION['max_page'];
}
exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");

?>