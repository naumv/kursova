<?php
require 'connect.php';
        echo "<h2>Випадкові відео</h2>";
        $sql = "SELECT * FROM rand50";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo <<<HERE
                <li><a href={$row[url]}>{$row["name"]}</a>
                <form action="./scripts/add_video_me.php" method="post">
                        <button name="id_video" type="submit" value="{$row['id_video']}">Зберегти</button>
                </form>
                </li> 
HERE;
            }
        }
        $conn->close();
?>