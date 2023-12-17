<?php

$host = "sql204.infinityfree.com";
$port = "3306";
$username = "secret_username";
$password = "secret_password";
$dbname = "if0_35519255_databaseforlab";

$connection = new mysqli($host, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Помилка підключення до бази даних: " . $connection->connect_error);
}

$sql = "SELECT id FROM toasts ORDER BY id DESC LIMIT 1";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $idValue = $row["id"];
    echo 'var idValueFromDatabase = "' . $idValue . '";';
} else {
    echo "Немає даних у базі даних.";
}

$connection->close();
?>
