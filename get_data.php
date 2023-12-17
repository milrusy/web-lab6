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

$sql = "SELECT * FROM toasts";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $mainValue = $row["main"];
        $headerValue = $row["header"];
        
        $data[] = array("header" => $headerValue, "main" => $mainValue);
    }
    
    $jsonData = json_encode($data);
    echo $jsonData;
} else {
    echo "Немає даних у базі даних.";
}

$connection->close();
?>
