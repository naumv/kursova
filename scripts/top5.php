<?php
    require './scripts/connect.php';
    $sql = "SELECT * FROM top5";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<li><a href=".$row['url'].">".$row["name"]."</a> (".$row["count"].")</li>\n";
        }
    }
    $conn->close();
?>