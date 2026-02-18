<?php
$host = "localhost";
$user = "root";
$pass = "marlen1234";
$dbname = "sportferienprojekt";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
}

$email = $_POST['email'];
$password = $_POST['password'];

$check = mysqli_prepare($conn, "SELECT user_id FROM user WHERE user_email = ?");
mysqli_stmt_bind_param($check, "s", $email);
mysqli_stmt_execute($check);
mysqli_stmt_store_result($check);

if (mysqli_stmt_num_rows($check) > 0) {
    header("Location: registeremail.html");
    exit();
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO user (user_email, user_passwort) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $email, $hashed_password);
mysqli_stmt_execute($stmt);

echo "Nutzer erfolgreich registriert!";
header("Location: login.html");
exit();
?>