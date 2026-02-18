/* Marlen Mueller
   Created on Friday, 13.02.2026 */

<?php
$host = 'localhost';
$user = 'root';
$pass = 'marlen1234';
$dbname = 'Sportferienprojekt';

$conn=mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die ("Verbindung fehlgeschlagen:" . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8mb4");