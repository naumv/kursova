<?php
require 'connect.php';
        echo "<h2>Групи відео</h2>";
        $sql = "SELECT * FROM group50";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo <<<HERE
                <li>
                    <form action="./scripts/video_in_group.php" method="post">
                        <button name="id_group" type="submit" value="{$row['id_group']}">{$row['name']}</button>
                </form>
                </li> 
HERE;
            }
        }
        $conn->close();
?>