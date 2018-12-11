<?php
$servername = "zanner.org.ua";
$username = "ka66_03";
$password = "djKjlz14nfyr";
$dbname = "ka66_03";
$port = 33321;

$conn = new mysqli($servername, $username, $password, $dbname, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8");
?>