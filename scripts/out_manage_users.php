<?php
    session_start();
   if(empty($_SESSION['login']) or empty($_SESSION['id_user']) or $_SESSION['status'] != 'a')  
   {
       $_SESSION['msg'] = "Доступ до даного функціоналу є лише в адміністраторів.";
       exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index.php'></head></html>");
   }
require 'connect.php';
        echo <<<HERE
        <h2>Користувачі сайту</h2>
        <table>
        <tr>
        <th>Ід</th>
        <th>Логін</th>
        <th>Ім'я</th>
        <th>Статус</th>
        </tr> 
HERE;
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo <<<HERE
                 <tr>
                    <td>{$row['id_user']}</td>
                    <td>{$row['login']}</td>
                    <td>{$row['name']}</td>
                    <td>
                    <form action="./scripts/edite_user.php" method="post">
                    <select name="status">
HERE;
                    echo '<option value="a"';
                    if ($row['status'] == 'a') echo " selected ";
                    echo '>admin</option>';
                    echo '<option value="m"';
                    if ($row['status'] == 'm') echo " selected ";
                    echo '>moderator</option>';
                    echo '<option value="u"';
                    if ($row['status'] == 'u') echo " selected ";
                    echo '>user</option>';
                    echo '<option value="d"';
                    if ($row['status'] == 'd') echo " selected ";
                    echo '>deleted</option>';
                  echo <<<HERE
                  </select>
                  <button name="id_user" type="submit" value="{$row['id_user']}">Змінити статус</button>
                 </form>
                    </td>
                <tr>\n
HERE;
            }
        }
        echo "</table>";
        $conn->close();
?>