<?php
$servername = "localhost"; 
$username = "root";        
$password = "root";            
$dbname = "scams";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получаем данные из таблицы tasks
$sql = "SELECT name, link, reward FROM tasks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $tasks = [];
    while($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }
} else {
    $tasks = [];
}

$conn->close();
?>
