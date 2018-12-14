<?php
require 'connect.php';
        echo "<h2>Останні додані відео</h2>";
HERE;
        $sql = "SELECT * FROM video50";
        $result = $conn->query($sql);
        $row2['name'] = "Name";
        if ($result->num_rows > 0) {
            // output data of each row
            if (($_SESSION['status'] == 'a' or $_SESSION['status'] == 'm') and isset($_SESSION['id_group']) )
            {
                $result2 = $conn->query("SELECT name from groups where id_group = {$_SESSION['id_group']}");
                if ($result2->num_rows > 0){
                $row2 = $result2->fetch_assoc();
                }
        }
                while($row = $result->fetch_assoc()) {
                echo <<<HERE
                <li><a href={$row[url]}>{$row["name"]}</a>
                <form action="./scripts/add_video_me.php" method="post">
                        <button name="id_video" type="submit" value="{$row['id_video']}">Зберегти</button>
                </form>
                <form action="./scripts/add_video_to_group.php" method="post">
                        <button name="id_video" type="submit" value="{$row['id_video']}">
                        Додати відео в групу {$row2['name']}
                         </button>
                </form></li>
HERE;
                }
        }
        
        $conn->close();
?>