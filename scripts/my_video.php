<?php
require 'connect.php';
    if (empty($_SESSION['login']) or empty($_SESSION['idUser']))
    {
        $sql = "SELECT name, url, duration, rating from Videos order by idVideo DESC LIMIT 50";
        echo "<h2>Останні додані відео</h2>";
    }
    else{
        echo "<h2>Останні додані Вами відео</h2>";
        $sql = "SELECT name, url, duration, rating from Videos join UsersHasVideo using (idVideo) WHERE idUser = {$_SESSION['idUser']} order by idVideo DESC LIMIT 50";
    }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<li><a href=".$row[url].">".$row["name"]."</a>".$row['duration']." ".$row['rating']."</li>\n";
            }
        }
        else{
            echo "<p>У Вас відсутні додані відео</p>";
        }
        $conn->close();
    

?>