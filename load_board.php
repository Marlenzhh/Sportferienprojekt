<?php
require __DIR__ . '/ordnungverbindung.php';
session_start();

header('Content-Type: application/json; charset=utf-8');

$userId = (int) ($_SESSION['user_id'] ?? 1);

$sql = "
SELECT s.series_id, s.series_name, us.status
FROM user_series us
JOIN series s ON s.series_id = us.series_id
WHERE us.user_id = $userId
";

$result = mysqli_query($conn, $sql);

$data = [
    "planned" => [],
    "watching" => [],
    "completed" => []
];

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['status'] === 'Noch anschauen') {
        $data['planned'][] = $row;
    } elseif ($row['status'] === 'Weiterschauen') {
        $data['watching'][] = $row;
    } elseif ($row['status'] === 'Bereits angeschaut') {
        $data['completed'][] = $row;
    }
}

echo json_encode($data);
