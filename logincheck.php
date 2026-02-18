<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "marlen1234";
$dbname = "sportferienprojekt";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) die("Verbindung fehlgeschlagen: " . mysqli_connect_error());

if (!isset($_POST['email'], $_POST['password'])) {
    echo "Bitte Email und Passwort eingeben!";
    exit;
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT user_id, user_passwort FROM user WHERE user_email = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$userRow = mysqli_fetch_assoc($result);

if (!$userRow) {
    header("Location: emailnotfound.html");
    exit;
}

if (!password_verify($password, $userRow['user_passwort'])) {
    echo "Falsches Passwort!";
    exit;
}

$_SESSION['user_id'] = (int)$userRow['user_id'];

header("Location: tracking.html");
exit;
