<?php
require 'connect.php';
        echo "<h2>Випадкові відео</h2>";
        $sql = "SELECT * FROM rand50";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<li><a href=".$row[url].">".$row["name"]."</a></li>\n";
            }
        }
        $conn->close();
?>