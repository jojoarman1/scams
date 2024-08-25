<?php
require_once './php/user.php'; // Подключаем user.php, чтобы использовать переменные
require_once './php/tasks.php'; // Подключаем tasks.php для получения данных из БД
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0" />
  <link rel="stylesheet" href="./style/global.css" />
  <link rel="stylesheet" href="./style/index.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" />
  <style>
    /* Загрузочный экран */
    #loading-screen {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: black;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 9999; /* Убедитесь, что экран перекрывает все остальные элементы */
      transition: opacity 0.5s ease-out, visibility 0.5s ease-out;
      opacity: 1;
      visibility: visible;
    }

    #loading-text {
      font-size: 2rem;
      font-family: 'Montserrat', sans-serif;
    }

    /* Класс для скрытия загрузочного экрана */
    #loading-screen.hidden {
      opacity: 0;
      visibility: hidden;
    }
  </style>
</head>
<body>
  <!-- Загрузочный экран -->
  <div id="loading-screen">
    <div id="loading-text"></div>
  </div>

  <div class="root1">
    <div class="main">
      <section class="zadniifon-parent">
        <a class="uptext1">
          <span class="palka">/</span>
          <span class="scam2">SCAM$</span>
          <span class="betatxt">beta</span>
        </a>
        <div class="zadniifon1"></div>
        <div class="frame-wrapper">
          <div class="frame-parent">
            <div class="frame-container">
              <div class="walletbutton-parent">
                <div class="avauser-wrapper">
                  <img class="avauser" src="<?php echo htmlspecialchars($user_photo_url); ?>" alt="User Avatar">
                </div>
              </div>
            </div>
            <div class="scam-info">
              <b class="kolvoscams"><?php echo htmlspecialchars($user_coins); ?></b> <!-- Здесь выводим количество коинов -->
              <h3 class="valutauser">SCAM$</h3>
            </div>
          </div>
        </div>
        <div class="tasks-container-wrapper">
          <div class="tasks-container">
            <h3 class="tasks">Tasks</h3>
            <div class="zadaniya">
              <?php if (!empty($tasks)): ?>
                <?php foreach ($tasks as $task): ?>
                <div class="polnoezadanie">
                  <div class="task-content">
                      <b class="task-description"><?php echo htmlspecialchars($task['name']); ?></b>
                      <div class="prizzazadanie-parent">
                          <b class="prizzazadanie"><a>+</a><?php echo htmlspecialchars($task['reward']); ?></b>
                          <b class="valuta">SCAM$</b>
                      </div>
                  </div>
                  <div class="buttonopen-wrapper">
                      <a href="<?php echo htmlspecialchars($task['link']); ?>" target="_blank" class="buttonopen">
                          <div class="backtextopen"></div>
                          <b class="textopen">Open</b>
                      </a>
                  </div>
                  <div class="obvodkazadaniya"></div>
                </div>
                <?php endforeach; ?>
              <?php else: ?>
                <p>No tasks available.</p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </section>
      <div class="mainbuttons">
        <div class="mainbuttons1">
          <div class="homebutton" id="homeButton">
            <div class="homebuttonimage-wrapper">
              <img class="homebuttonimage-icon2" loading="lazy" alt="" src="./public/homebuttonimage1.svg" />
            </div>
            <b class="hometext">Home</b>
          </div>
          <div class="button-leader" id="leaderboardsButton">
            <div class="homebuttonimage-wrapper">
              <img class="homebuttonimage-icon2" loading="lazy" alt="" src="./public/leaderboardsbuttonimage1.svg" />
            </div>
            <b class="hometext">Leaders' table</b>
          </div>
          <div class="frendsbutton2" id="friendsButton">
            <div class="frendsbuttonimage-frame">
              <img class="frendsbuttonimage-icon2" loading="lazy" alt="" src="./public/frendsbuttonimage.svg" />
            </div>
            <b class="hometext">Frends</b>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Telegram Web App API -->
  <script src="https://telegram.org/js/telegram-web-app.js"></script>
  <script>
    window.Telegram.WebApp.ready();

    // Получение информации о пользователе
    const user = window.Telegram.WebApp.initDataUnsafe.user;

    // Отправляем данные пользователя на сервер через AJAX
    fetch('save_user.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        id: user.id,
        username: user.username,
        photo_url: user.photo_url,
        auth_date: user.auth_date
      })
    });
  </script>

  <script src="./script/index.js"></script>
  <script src="./script/telegram-web-app.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js"></script>
  <script src="./script/FullOpen.js"></script>
</body>
</html>
