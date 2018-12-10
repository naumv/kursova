<?php
$servername = "localhost";
$username = "gsc_prukol";
$password = "djKjlz14nfyr";
$dbname = "kursova1";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8");
$sql = "SELECT idUser, login, name FROM Users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["idUser"]. " - Ім'я: " . $row["name"]. " - Login: " . $row["login"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close(); 
?>