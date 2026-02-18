/* Marlen Mueller
   Created on Wednesday, 11.02.2026 */
   
<?php
$host = 'localhost';
$user = 'root';
$pass = 'marlen1234';
$dbname = 'Sportferienprojekt';

$conn=mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die ("Verbindung fehlgeschlagen:" . mysqli_connect_error());
}

$sql = "SELECT movie_id, movie_name, movie_category, movie_description, movie_status FROM movie";
$result = mysqli_query($conn, $sql);
$articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<style>
    ::selection {
        background-color: #e8b2c8;
        color: black;
    }
    .mein-button {
        background-color: #cab19a;
        color: white; 
        padding: 10px 20px;
        border: none;
        border-radius: 5px; 
        cursor: pointer; /* Zeiger-Effekt */
        transition: background-color 0.3s;
    }

    .mein-button:hover {
        background-color: rgb(79, 64, 39);
    }

    body {
        background-color: #ece3dc;
        background-image: url('images/bild9.png');
        background-attachment: fixed;
        background-repeat: no-repeat; 
        background-position: center;
        background-size: cover; 
    }
    .movie-box {
        transition: transform 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
    }
    .movie-box:hover {
        background-color: #dec8b8;
        box-shadow: 0 6px 14px rgb(175, 164, 135);
        transform: translateY(-4px);
        cursor: pointer;
    }
    footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        height: var(--footer-height);
        text-align: center;
        background-color: #7c6858;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
        <title>Filmübersicht</title>
    </head>
        <header>
            <h1 style="color: black; font-family: Arial">Filmübersicht</h1>
            <a href="startseite.html"><button class="mein-button">Startseite</button></a>
        </header>
    <body>
    <hr>
        <?php if (empty($articles)): ?>
            <p>kein Film vorhanden</p>
        <?php else: ?>
            <div style="
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 20px;
            ">
            <?php foreach ($articles as $row): ?>
                <div style="margin-bottom: 20px; font-family: Arial">

                    <strong class="article-box" style=" display: block; 
                                    border: 1px solid #ccc; 
                                    padding: 10px; 
                                    margin-bottom: 15px; 
                                    border-radius: 6px; 
                                    background-color: #e198ae3d; 
                                    font-family: Arial; 
                                    font-weight: normal;">

                        <b>Film ID:</b> <?= htmlspecialchars($row['movie_id']) ?><br>
                        <b>Name des Films:</b> <?= htmlspecialchars($row['movie_name']) ?><br>
                        <b>Kategorie:</b> <?= htmlspecialchars($row['movie_category']) ?><br>
                        <b>Beschreibung:</b> <?= htmlspecialchars($row['movie_description']) ?><br>
                        <b>Status:</b> <?= htmlspecialchars($row['movie_status']) ?>
                    </strong>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </body>
    <footer>
        <p style="font-family: Arial; font-size: 16px;">Datenbank</p>
    </footer>
</html>