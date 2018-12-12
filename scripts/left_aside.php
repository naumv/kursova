<?php
 if (empty($_SESSION['login']) or empty($_SESSION['idUser'])){
    echo <<<HERE
    <form action="./scripts/test_reg.php" method="post">
        <p>
            <label>Ваш логін:<br></label>
            <input name="login" type="text" size="15" maxlength="15">
        </p>
        <p>
            <label>Ваш пароль:<br></label>
            <input name="password" type="password" size="15" maxlength="15">
        </p>
        <p>
            <input type="submit" name="submit" value="Войти">
        </p>
    </form>
    <p>
        <a href="./scripts/reg.php">Зареєструватись</a>
    <p> 
HERE;
    }
    else {
        echo <<<HERE
    <p>
        Ви ввійшли на сайт як {$_SESSION['name']}
    </p>
    <form autocomplete="on" class="log_out" action="./scripts/exit.php">
        <input type="submit" value="Переглянути мої відео">
    </form>
    <form autocomplete="on" class="log_out" action="./scripts/exit.php">
        <input type="submit" value="Переглянути мої групи відео">
    </form>
    <form autocomplete="on" class="log_out" action="./scripts/exit.php">
        <input type="submit" value="Вийти">
    </form>
HERE;
    }
?>