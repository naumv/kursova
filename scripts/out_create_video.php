<?php
echo <<<HERE
<form autocomplete="off" class="create_video" action="./scripts/save_video.php" method="post">
    <p>
    <label>Ім'я відео:<br></label>
    <input name="name" type="text" size="80%" maxlength="200">
</p>
<p>
    <label>Посилання на відео:<br></label>
    <input name="url" type="url" size="80%" maxlength="200">
</p>
        <input type="submit" value="Додати відео">
</form>
HERE;
?>