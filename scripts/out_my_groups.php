<?php
session_start();
if(empty($_SESSION['login']) or empty($_SESSION['id_user'])) 
{
    $_SESSION['msg'] = "Доступ до даного функціоналу є лише в зареєстрованих користувачів.
    Ввійдіть або зареєструйтесь.";
    $_SESSION['output'] = "out_rand50.php";
    exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
}
require 'connect.php';
        echo "<h2>Ваш список груп</h2>";
$sql = "SELECT g.name as name, g.id_group as id_group  
FROM groups g join user_has_group u_h_g using(id_group)
 where u_h_g.id_user = ?";
$result = $conn->prepare($sql);
$result->bind_param("i", $_SESSION['id_user']);
$result->execute(); 
$result = $result->get_result();
//$result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo <<<HERE
                <li>
                    <form action="./scripts/video_in_group.php" method="post">
                        <button name="id_group" type="submit" value="{$row['id_group']}">{$row['name']}</button>
                </form>
                </li> 
HERE;
            }
        }
        else{
            echo "<p>У Вас відсутні додані групи</p>";
        }
        $conn->close();
?>