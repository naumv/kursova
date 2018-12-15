<?php
require 'connect.php';
    if (empty($_SESSION['login']) or empty($_SESSION['id_user']))
    {
        $sql = "SELECT name, url from videos order by id_video DESC LIMIT 50";
        echo "<h2>Останні додані відео</h2>";
        $result = $conn->query($sql);
    }
    else{
        echo "<h2>Останні додані Вами відео</h2>";
        $sql = "SELECT name, url from videos join user_has_video using (id_video) 
        WHERE id_user = ? order by id_video DESC LIMIT 50";
            $result = $conn->prepare($sql);
            $result->bind_param("i", $_SESSION['id_user']);
            $result->execute(); 
            $result = $result->get_result(); 
    }
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<li><a href=".$row[url].">".$row["name"]."</a></li>\n";
            }
        }
        else{
            echo "<p>У Вас відсутні додані відео</p>";
        }
        $conn->close();
    

?>