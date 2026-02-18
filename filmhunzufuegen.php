/* Marlen Mueller
   Created on Thursday, 12.02.2026 */

<?php

$host = "localhost";
$user = "root";
$pass = "marlen1234";
$dbname = "Sportferienprojekt";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
    die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
}

$name = trim($_POST["movie_name"] ?? "");
$category = trim($_POST["movie_category"] ?? "");
$description = $_POST["movie_description"] ?? null;
$status = trim($_POST["movie_status"] ?? "");

$sql = "INSERT INTO movie (movie_name, movie_category, movie_description, movie_status)
        VALUES (?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssss", $name, $category, $description, $status);

if (!mysqli_stmt_execute($stmt)) {
    die("Insert fehlgeschlagen: " . mysqli_stmt_error($stmt));
}

header("Location: filmformular.html");
exit; 