<?php
    session_start();
    if(isset($_SESSION['max_page']) and $_SESSION['max_page'] > 0)
    {
    echo <<<HERE
    <form action="./scripts/select_page.php" method="post">
    <button name="page_crement" type="submit" value="-1">
    Попередня сторінка
    </button>
    <button name="page_crement" type="submit" value="1">
    Наступна
    </button>
    </form>
HERE;
    }
?>