<?php
    require './scripts/connect.php';
    $sql = "SELECT * FROM rand5";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<li><a href=".$row['url']." target='_blank'>".$row["name"]."</a></li>\n";
        }
    }
    $conn->close();
?>