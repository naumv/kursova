<?php
$servername = "localhost";
$username = "gsc_prukol";
$password = "djKjlz14nfyr";
$dbname = "kursova2";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8");
?>