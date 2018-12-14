<?php
require 'connect.php';
        echo "<h2>Ваш список відео</h2>";
$sql = "SELECT v.name as name , v.url as url FROM videos v join user_has_video u_h_v using(id_video) where u_h_v.id_user = {$_SESSION['id_user']}";
$result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo <<<HERE
                <li><a href={$row[url]}>{$row["name"]}</a></li> 
HERE;
            }
        }
        $conn->close();
?>