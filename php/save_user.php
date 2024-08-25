<?php
// Подключение к базе данных
require_once './bd/db_connect.php';

// Получение данных из запроса
$data = json_decode(file_get_contents('php://input'), true);

$user_id = $data['id'];
$username = $data['username'];
$photo_url = $data['photo_url'];
$auth_date = $data['auth_date'];

// Подготовка и выполнение запроса для вставки или обновления данных
$sql = "INSERT INTO users (id, username, photo_url, registration_date)
        VALUES (?, ?, ?, FROM_UNIXTIME(?))
        ON DUPLICATE KEY UPDATE username=?, photo_url=?, registration_date=FROM_UNIXTIME(?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param('ississ', $user_id, $username, $photo_url, $auth_date, $username, $photo_url, $auth_date);
$stmt->execute();
$stmt->close();
$conn->close();
