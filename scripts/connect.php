<?php
mysql_connect
("localhost",
"gsc_prukol",
 "djKjlz14nfyr")
or die("<p>Ошибка подключения к базе данных: " .
mysql_error() . "</p>");
echo "<p>Вы подключились к MySQL!</p>";
?>