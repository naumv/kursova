<?php
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
?>