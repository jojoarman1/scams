<?php
// Путь к файлу с SQL данными
$sqlFile = __DIR__ . '/bd/scams.sql';

// Подключение к базе данных
$servername = "localhost"; 
$username = "root";        
$password = "root";            
$dbname = "scams";

// Создаем соединение
$conn = new mysqli($servername, $username, $password);

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Проверяем, существует ли база данных
$db_selected = $conn->select_db($dbname);

if (!$db_selected) {
    // Если база данных не существует, создаем ее
    $createDbSql = "CREATE DATABASE $dbname";
    if ($conn->query($createDbSql) === TRUE) {
        echo "Database created successfully.";

        // Выбираем созданную базу данных
        $conn->select_db($dbname);

        // Читаем файл SQL
        $sql = file_get_contents($sqlFile);

        // Выполняем SQL-запросы из файла
        if ($conn->multi_query($sql)) {
            echo "Database imported successfully.";
        } else {
            echo "Error importing database: " . $conn->error;
        }
    } else {
        die("Error creating database: " . $conn->error);
    }
} else {
    echo "Database already exists.";
}
?>
