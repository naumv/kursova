<?php
    session_start();
    if(isset($_SESSION['max_page']) and $_SESSION['max_page'] > 0)
    {
        echo '<form action="./scripts/select_page.php" method="post">';
        if(isset($_SESSION['page']) and $_SESSION['page'] != 0){
    echo <<<HERE
    <button name="page_crement" type="submit" value="-1">
    Попередня сторінка
    </button>
HERE;
        }
if( $_SESSION['page'] != $_SESSION['max_page'] ){
        echo <<<HERE
    <button name="page_crement" type="submit" value="1">
    Наступна
    </button>
HERE;
}
echo     '</form>';
    }
?>