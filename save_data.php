<?php
header('Content-Type: text/html; charset=utf-8');
$host = "sql204.infinityfree.com";
$port = "3306";
$username = "if0_35519255";
$password = "RXs3tJVdicJkt";
$dbname = "if0_35519255_databaseforlab";
$connection = new mysqli($host, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Помилка підключення до бази даних: " . $connection->connect_error);
}

echo "Підключення до бази даних успішне";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $header = $_POST["header"];
    $main = $_POST["main"];

    if (empty($_POST["header"]) || empty($_POST["main"])) {
        die("Помилка: Заповніть всі поля");
    }

    $stmt = $connection->prepare("INSERT INTO toasts (header, main) VALUES (?, ?)");

    if (!$stmt) {
        die("Помилка при підготовці заяви: " . $connection->error);
    }

    $stmt->bind_param('ss', $header, $main);

    if ($stmt->execute()) {
        echo "success";
    } else {
        error_log("Error: " . $stmt->error);

    }

    $stmt->close();
}

$connection->close();
?>