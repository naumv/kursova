<?php
require 'connect.php';
        echo "<h2>Останні додані відео</h2>";
HERE; 
if (isset( $_SESSION['page'])) { 
        $page = $_SESSION['page']; 
    }
    else
    {
            $page = 0;
    }
    $skip = $page * 50; 
        $sql = "SELECT * FROM video50 LIMIT ?, 50";
        //$result = $conn->query($sql);
        $result = $conn->prepare($sql);
        $result->bind_param("i", $skip);
        $result->execute();    
        $result = $result->get_result();
        $sql2 = "SELECT count(*) as count from video50";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        $_SESSION['max_page'] = ((int) ($row2['count'] / 50)) - ((($row2['count'] % 50) == 0) ? 1 : 0 ); 
        //$row2['name'] = "Name";
        if ($result->num_rows > 0) {
            // output data of each row
            if (($_SESSION['status'] == 'a' or $_SESSION['status'] == 'm') and isset($_SESSION['id_group']) )
            {
                $result2 = $conn->query("SELECT name from groups where id_group = {$_SESSION['id_group']}");
                if ($result2->num_rows > 0){
                $row2 = $result2->fetch_assoc();
                }
        }
                while($row = $result->fetch_assoc()) {
                echo <<<HERE
                <li><a href={$row[url]} target='_blank'>{$row["name"]} </a>
                <form action="./scripts/add_video_me.php" method="post">
                        <button name="id_video" type="submit" value="{$row['id_video']}">Зберегти</button>
                </form>
HERE;
                if(isset($row2['name'])){
                echo <<<HERE
                <form action="./scripts/add_video_to_group.php" method="post">
                        <button name="id_video" type="submit" value="{$row['id_video']}">
                        Додати відео в групу {$row2['name']}
                         </button>
                </form></li>
HERE;
                }
                }
        }
        
        $conn->close();
?>