<?php
// Подключение к базе данных
require_once './bd/db_connect.php';

// Подготовка SQL-запроса для получения всех пользователей
$sql = "SELECT id, username, photo_url, coins FROM users ORDER BY coins DESC";
$result = $conn->query($sql);

$users_html = '';
$top_user_html = '';

// Проверяем, если в базе есть пользователи
if ($result->num_rows > 0) {
    $rank = 1; // Порядковый номер пользователя (место в топе)
    while($row = $result->fetch_assoc()) {
        $user_id = $row['id'];
        $username = $row['username'];
        $photo_url = $row['photo_url'];
        $coins = $row['coins'];

        // Если это первый пользователь, мы считаем его текущим пользователем для примера
        if ($rank == 1) {
            $top_user_html = '
            <div class="userinfoinleaders">
                <div class="backinfousersinleaders"></div>
                <div class="top-scammer-avatar">
                    <div class="avausersinleaders"><img src="'.$photo_url.'" alt="User Avatar" /></div>
                    <div class="top-scammer-name">
                        <b class="usernameinleaders">'.$username.'</b>
                        <div class="top-scammer-stats">
                            <b class="kolvoscamsinleaders">'.$coins.'</b>
                            <b class="valutinleaders">SCAM$</b>
                        </div>
                    </div>
                </div>
                <div class="top-scammer-rank">
                    <b class="mestovtopeusers">'.$rank.'</b>
                </div>
            </div>';
        } else {
            // Добавляем HTML-код для каждого пользователя
            $users_html .= '
            <div class="userinfodown">
                <div class="avausersinleadersdown"><img src="'.$photo_url.'" alt="User Avatar" /></div>
                <div class="usernameinleadersdown-parent2">
                    <b class="usernameinleadersdown6">'.$username.'</b>
                    <div class="kolvoscamsinleadersdown-parent3">
                        <b class="kolvoscamsinleadersdown5">'.$coins.'</b>
                        <b class="valutinleadersdown5">SCAM$</b>
                    </div>
                </div>
                <div class="mestovtopeusersdown-wrapper2">
                    <b class="scammer-title">'.$rank.'</b>
                </div>
            </div>';
        }

        $rank++;
    }
} else {
    // Если пользователей нет, выводим сообщение
    $users_html = '<div class="userinfodown"><b>No users found</b></div>';
}

// Закрытие соединения с базой данных
$conn->close();
?>

<!DOCTYPE html>
<html>
  <head>
    <!-- Ваш код здесь -->
  </head>
  <body>
      <div id="loading-screen">
        <div id="loading-text"></div>
      </div>
    <div class="root">
      <div class="main">
        <section class="top-container">
          <a class="uptext1">
            <span class="palka">/</span>
            <span class="scam2">SCAM$</span>
            <span class="betatxt">beta</span>
          </a>
          <div class="zadniifon"></div>
          <div class="top-scammers-container">
            <div class="top-scammers-header">
              <h1 class="texttopscammers">Telegram Wall of Fame</h1>
              <div class="top-scammer-info">
                <!-- Мой юсер сверху начало -->
                <?= $top_user_html; ?>
                <!-- Мой юсер сверху конец -->
              </div>
            </div>
            <div class="leaderboard-container">
              <div class="leaderboard-header">
                <b class="kolvoholders">43.4M holders</b>
                <div class="leadersgameusers">
                  <!-- Топ игроков начало -->
                  <?= $users_html; ?>
                  <!-- Топ игроков конец -->
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="mainbuttons1">
          <!-- Ваши кнопки здесь -->
        </div>
      </div>
    </div>
    <!-- Ваши скрипты здесь -->
  </body>
</html>
