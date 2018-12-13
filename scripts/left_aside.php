<?php
 if (empty($_SESSION['login']) or empty($_SESSION['idUser'])){
     if($_SESSION['registration'])
     {
        echo <<<HERE
        <form action="./scripts/save_user.php" method="post">
        <p>
            <label>Ваш логін:<br></label>
            <input name="login" type="text" size="15" maxlength="15">
        </p>
        <p>
            <label>Вашt ім'я:<br></label>
            <input name="name" type="text" size="15" maxlength="15">
        </p>
        <p>
            <label>Ваш пароль:<br></label>
            <input name="password" type="password" size="15" maxlength="15">
        </p>

        <p>
            <label>Ваш пароль ще раз:<br></label>
            <input name="password_two" type="password" size="15" maxlength="15">
        </p>
        <p>
            <input type="submit" name="submit" value="Зареєструватись">
        </p>
HERE;
        if (!empty($_SESSION['error']))
        {
        echo "<p>{$_SESSION['error']}</p>";
        }
        echo <<<HERE
        </form>
        <p>
            <a href="./scripts/in_form.php">Ввійти</a>
        <p> 
HERE;

     }
     else {
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
HERE;
    if (!empty($_SESSION['error']))
    {
    echo "<p>{$_SESSION['error']}</p>";
    }
echo <<<HERE
    </form>
    <p>
        <a href="./scripts/reg_form.php">Зареєструватись</a>
    <p> 
HERE;
     }
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