<?php
header("Content-Type: application/json; charset=UTF-8");
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        // Egy adott bejegyzés lekérdezése ID alapján
        $id = intval($_GET['id']);
        $sql = "SELECT * FROM bejegy WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $post = $result->fetch_assoc();
            echo json_encode($post); // Egy adott bejegyzés JSON formátumban
        } else {
            echo json_encode(["error" => "A bejegyzés nem található."]);
        }
    } else {
        // Az összes bejegyzés lekérdezése
        $sql = "SELECT * FROM bejegy";
        $result = $conn->query($sql);

        $posts = [];
        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
        echo json_encode($posts);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'));
    $username = $conn->real_escape_string($data->username);
    $title = $conn->real_escape_string($data->title);
    $content = $conn->real_escape_string($data->content);

    $sql = "INSERT INTO bejegy (username, title, content) VALUES ('$username', '$title', '$content')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Bejegyzés sikeresen hozzáadva!"]);
    } else {
        echo json_encode(["error" => "Hiba történt a bejegyzés hozzáadásakor."]);
    }
}

$conn->close();
?>
