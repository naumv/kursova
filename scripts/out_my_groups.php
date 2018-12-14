<?php
require 'connect.php';
        echo "<h2>Ваш список груп</h2>";
$sql = "SELECT g.name as name  FROM groups g join user_has_group u_h_g using(id_group) where u_h_g.id_user = {$_SESSION['id_user']}";
$result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<li>".$row["name"]."</li>\n";
            }
        }
        $conn->close();
?>