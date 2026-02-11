<?php

$host = 'localhost';
$user = 'root';
$pass = 'marlen1234';
$dbname = 'Sportferienprojekt';

$conn=mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die ("Verbindung fehlgeschlagen:" . mysqli_connect_error());
}
echo "Verbindung erfolgreich!" . "<br><br>";


?>