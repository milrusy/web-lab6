<?php
$host = "sql204.infinityfree.com";
$port = "3306";
$username = "if0_35519255";
$password = "RXs3tJVdicJkt";
$dbname = "if0_35519255_databaseforlab";
$connection = new mysqli($host, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Помилка підключення до бази даних: " . $connection->connect_error);
}

$sql = "TRUNCATE TABLE toasts";

if ($connection->query($sql) === TRUE) {
    echo "Таблиця успішно очищена";
} else {
    echo "Помилка очищення таблиці: " . $connection->error;
}

$connection->close();
?>
