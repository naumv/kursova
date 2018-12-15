<?php
session_start();
require 'connect.php';
        echo "<h2>Відео в групі</h2>";
if (isset( $_SESSION['page'])) { 
        $page = $_SESSION['page']; 
        }
else
        {
            $page = 0;
        }
$skip = $page * 50; 


$sql2 = "SELECT count(*)  as count
        FROM  videos v join video_has_group v_h_g using(id_video) 
        where v_h_g.id_group = ?";
        //$result = $conn->query($sql);
$result2 = $conn->prepare($sql2);
$result2->bind_param("i", $_SESSION['id_group']);
$result2->execute(); 
$result2 = $result2->get_result();
$row2 = $result2->fetch_assoc();
$_SESSION['max_page'] = ((int) ($row2['count'] / 50)) - ((($row2['count'] % 50) == 0) ? 1 : 0 ); 
$sql = "SELECT v.name as name, v.url as url, v.id_video as id_video  
FROM  videos v join video_has_group v_h_g using(id_video) 
where v_h_g.id_group = ?
LIMIT ? , 50";
$result = $conn->prepare($sql);
$result->bind_param("ii", $_SESSION['id_group'], $skip);
$result->execute(); 
$result = $result->get_result();
//$result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo <<<HERE
                <li><a href={$row[url]} target='_blank' >{$row["name"]}</a>
                <form action="./scripts/add_video_me.php" method="post">
                        <button name="id_video" type="submit" value="{$row['id_video']}">Зберегти</button>
                </form>
                </li> 
HERE;
            }
        }
        else{
                echo "<p>В даній групі відсутні відео</p>";
        }
        $conn->close();
?>