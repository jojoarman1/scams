<?php
// Подключение к базе данных
require_once './bd/db_connect.php';

// Получаем id пользователя через сессию или другим образом
$user_id = $_SESSION['user_id']; // пример

// Подготовка SQL-запроса
$sql = "SELECT username, photo_url, DATEDIFF(NOW(), registration_date) AS account_age FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['username'];
    $photo_url = $row['photo_url'];
    $account_age = $row['account_age'];
} else {
    $username = 'Unknown';
    $photo_url = 'default_photo.png';
    $account_age = 0;
}

$stmt->close();
$conn->close();
