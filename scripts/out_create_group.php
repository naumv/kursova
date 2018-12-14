<?php
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