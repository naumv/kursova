<?php
session_start();
require 'connect.php';
        echo "<h2>Відео в групі</h2>";
$sql = "SELECT v.name as name, v.url as url  FROM  videos v join video_has_group v_h_g using(id_video) where v_h_g.id_group = {$_SESSION['id_group']}";
$result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<li><a href=".$row['url'].">".$row["name"]."</a></li>\n";
            }
        }
        $conn->close();
?>