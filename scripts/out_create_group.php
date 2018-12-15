<?php
   session_start();
   if(empty($_SESSION['login']) or empty($_SESSION['id_user']) or ($_SESSION['status'] != 'a' and $_SESSION['status'] != 'm')) 
   {
       $_SESSION['msg'] = "У Вас відсутні права на дану дію";
       exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
   }
echo <<<HERE
<form autocomplete="off" class="create_group" action="./scripts/save_group.php" method="post">
    <p>
    <label>Ім'я групи:<br></label>
    <input name="name" type="text" size="80%" maxlength="80">
</p>
    <input type="submit" value="Додати групу">
</form>
HERE;
?>