<?php
require 'connect.php';
        echo "<h2>Ваш список відео</h2>";
$sql = "SELECT v.name as name , v.url as url, u_h_v.status as status, v.id_video as id_video
 FROM videos v join user_has_video u_h_v using(id_video) where u_h_v.id_user = {$_SESSION['id_user']}";
$result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo <<<HERE
                <li><a href={$row[url]}>{$row["name"]}</a> 
                    <form action="./scripts/edite_video_status.php" method="post">
                        <select name="status">
HERE;
                    echo '<option value="c"';
                    if ($row['status'] == 'c') echo " selected ";
                    echo '>Переглянутий</option>';
                    echo '<option value="h"';
                    if ($row['status'] == 'h') echo " selected ";
                    echo '>Переглядаю</option>';
                    echo '<option value="s"';
                    if ($row['status'] == 's') echo " selected ";
                    echo '>В планах</option>';
                    echo <<<HERE
                  </select>
                  <button name="id_video" type="submit" value="{$row['id_video']}">Змінити статус</button>
                 </form>
HERE;
            }
        }
        $conn->close();
?>