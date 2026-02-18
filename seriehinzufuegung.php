<?php

$host = "localhost";
$user = "root";
$pass = "marlen1234";
$dbname = "Sportferienprojekt";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
    die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
}

$name = trim($_POST["series_name"] ?? "");
$category = trim($_POST["series_category"] ?? "");
$description = $_POST["series_description"] ?? null;
$status = trim($_POST["series_status"] ?? "");

$sql = "INSERT INTO series (series_name, series_category, series_description, series_status)
        VALUES (?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssss", $name, $category, $description, $status);

if (!mysqli_stmt_execute($stmt)) {
    die("Insert fehlgeschlagen: " . mysqli_stmt_error($stmt));
}

header("Location: serieformular.html");
exit;