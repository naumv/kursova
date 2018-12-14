<?php
require 'connect.php';
        echo "<h2>Групи відео</h2>";
        $sql = "SELECT * FROM group50";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<li>".$row["name"]."</li>\n";
            }
        }
        $conn->close();
?>