<?php
$host = "localhost";
$user = "root";
$pass = "marlen1234";
$dbname = "sportferienprojekt";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) die("Verbindung fehlgeschlagen: " . mysqli_connect_error());

if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT user_passwort FROM user WHERE user_email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $hashed_password_db);
    mysqli_stmt_fetch($stmt);

    if ($hashed_password_db) {
        header("Location: tracking.html"); 
        exit();

        if (password_verify($password, $hashed_password_db)) {
            echo "Login erfolgreich!";
        } else {
            echo "Falsches Passwort!";
        }
    } else {
        header("Location: emailnotfound.html");
        exit();
    }
} else {
    echo "Bitte Email und Passwort eingeben!";
}
?>
