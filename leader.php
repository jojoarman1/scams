<?php
// Подключение к базе данных
require_once './bd/db_connect.php';

// Подготовка SQL-запроса для получения всех пользователей
$sql = "SELECT id, username, photo_url, coins FROM users ORDER BY coins DESC";
$result = $conn->query($sql);

$users_html = '';
$top_user_html = '';
$top_user_id = 1; // ID пользователя, который должен быть сверху

// Проверяем, если в базе есть пользователи
if ($result->num_rows > 0) {
    $rank = 1; // Порядковый номер пользователя (место в топе)
    while($row = $result->fetch_assoc()) {
        $user_id = $row['id'];
        $username = $row['username'];
        $photo_url = $row['photo_url'];
        $coins = $row['coins'];

        // Если это пользователь с id = 1, выводим его как топ-пользователя
        if ($user_id == $top_user_id) {
            $top_user_html = '
            <div class="userinfoinleaders">
                <div class="backinfousersinleaders"></div>
                <div class="top-scammer-avatar">
                    <div class="avausersinleaders"><img class="size-photo" src="'.$photo_url.'" alt="User Avatar" /></div>
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
            // Добавляем HTML-код для всех остальных пользователей
            $users_html .= '
            <div class="userinfodown">
                <div class="avausersinleadersdown"><img class="size-photo" src="'.$photo_url.'" alt="User Avatar" /></div>
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

        // Повторно отображаем пользователя с id = 1 в общем списке
        if ($user_id == $top_user_id) {
            $users_html .= '
            <div class="userinfodown">
                <div class="avausersinleadersdown"><img class="size-photo" src="'.$photo_url.'" alt="User Avatar" /></div>
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
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0" />
    <link rel="stylesheet" href="./style/global.css" />
    <link rel="stylesheet" href="./style/leader.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap"
    />
  </head>
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
        <div class="homebutton" id="homeButton">
          <div class="homebuttonimage-wrapper">
            <img
              class="homebuttonimage-icon2"
              loading="lazy"
              alt=""
              src="./public/homebuttonimage.svg"
            />
          </div>
          <b class="hometext">Home</b>
        </div>
        <div class="button-leader" id="leaderboardsButton">
          <div class="homebuttonimage-wrapper">
            <img
              class="homebuttonimage-icon2"
              loading="lazy"
              alt=""
              src="./public/leaderboardsbuttonimage.svg"
            />
          </div>
          <b class="hometext">Leaders' table</b>
        </div>
        <div class="frendsbutton2" id="friendsButton">
          <div class="frendsbuttonimage-frame">
            <img
              class="frendsbuttonimage-icon2"
              loading="lazy"
              alt=""
              src="./public/frendsbuttonimage.svg"
            />
          </div>
          <b class="hometext">Frends</b>
        </div>
      </div>
    </div>
    <script>
      function updateStyles() {
        const container = document.querySelector('.top-container');
        const button = document.querySelector('.mainbuttons1');
        const screenWidth = window.innerWidth;
    
       // Убедитесь, что minWidth и maxWidth имеют разумные значения
       const minWidth = 0; // Минимальная ширина экрана
      const maxWidth = 450; // Максимальная ширина экрана, измените по необходимости
  
      // Параметры для .zadniifon-container
      const minContainerScale = 0; // Минимальный коэффициент масштабирования
      const maxContainerScale = 1; // Максимальный коэффициент масштабирования
      const minContainerMarginTop = -295; // Минимальный верхний отступ
      const maxContainerMarginTop = 80;  // Максимальный верхний отступ
  
      // Параметры для .mainbuttons1
      const minButtonScale = 0; // Минимальный коэффициент масштабирования
      const maxButtonScale = 1; // Максимальный коэффициент масштабирования
      const minButtonMarginBottom = -60; // Минимальный отступ от нижнего края
      const maxButtonMarginBottom = 0;  // Максимальный отступ от нижнего края
  
      // Параметры для #backBigButton
      const minBackBigButtonScale = 0; // Минимальный коэффициент масштабирования
      const maxBackBigButtonScale = 1; // Максимальный коэффициент масштабирования
      const minBackBigButtonMarginBottom = -44; // Минимальный отступ от нижнего края
      const maxBackBigButtonMarginBottom = 95;  // Максимальный отступ от нижнего края
  
      // Вычислите интерполяцию масштабирования и отступа для контейнера
      let containerScale, containerMarginTop;
      if (screenWidth <= minWidth) {
        containerScale = minContainerScale;
        containerMarginTop = minContainerMarginTop;
      } else if (screenWidth >= maxWidth) {
        containerScale = maxContainerScale;
        containerMarginTop = maxContainerMarginTop;
      } else {
        const t = (screenWidth - minWidth) / (maxWidth - minWidth);
        containerScale = minContainerScale + t * (maxContainerScale - minContainerScale);
        containerMarginTop = minContainerMarginTop + t * (maxContainerMarginTop - minContainerMarginTop);
      }
  
      // Примените вычисленные стили для контейнера
      if (container) {
        container.style.marginTop = `${containerMarginTop}px`;
        container.style.transform = `scale(${containerScale})`;
      }
  
      // Вычислите интерполяцию масштабирования и отступа для кнопок
      let buttonScale, buttonMarginBottom;
      let backBigButtonScale, backBigButtonMarginBottom;
  
      if (screenWidth <= minWidth) {
        buttonScale = minButtonScale;
        buttonMarginBottom = minButtonMarginBottom;
        backBigButtonScale = minBackBigButtonScale;
        backBigButtonMarginBottom = minBackBigButtonMarginBottom;
      } else if (screenWidth >= maxWidth) {
        buttonScale = maxButtonScale;
        buttonMarginBottom = maxButtonMarginBottom;
        backBigButtonScale = maxBackBigButtonScale;
        backBigButtonMarginBottom = maxBackBigButtonMarginBottom;
      } else {
        const t = (screenWidth - minWidth) / (maxWidth - minWidth);
        buttonScale = minButtonScale + t * (maxButtonScale - minButtonScale);
        buttonMarginBottom = minButtonMarginBottom + t * (maxButtonMarginBottom - minButtonMarginBottom);
  
        backBigButtonScale = minBackBigButtonScale + t * (maxBackBigButtonScale - minBackBigButtonScale);
        backBigButtonMarginBottom = minBackBigButtonMarginBottom + t * (maxBackBigButtonMarginBottom - minBackBigButtonMarginBottom);
      }
  
      // Примените вычисленные стили для .mainbuttons1
      if (button) {
        button.style.transform = `translateX(-50%) scale(${buttonScale})`;
        button.style.bottom = `${buttonMarginBottom}px`;
        button.style.fontSize = `${12 + (buttonScale - minButtonScale) * 4}px`; // Примерное изменение размера шрифта
      }
  
      // Примените вычисленные стили для #backBigButton
      if (backBigButton) {
        backBigButton.style.transform = `translateX(-50%) scale(${backBigButtonScale})`;
        backBigButton.style.bottom = `${backBigButtonMarginBottom}px`;
      }
    }
    
      window.addEventListener('resize', updateStyles);
      window.addEventListener('load', updateStyles);
    
      // Функция для скрытия загрузочного экрана
      function hideLoadingScreen() {
        const loadingScreen = document.getElementById('loading-screen');
        if (loadingScreen) {
          loadingScreen.classList.add('hidden');
        }
      }
    
      // Скрываем загрузочный экран после полной загрузки страницы
      window.addEventListener('load', hideLoadingScreen);
    </script>
    
    <script src="./script/leader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js"></script>
    <script src="./script/telegram-web-app.js"></script>
    <script src="./script/FullOpen.js"></script>
    <script src="./bd/db_connect.php"></script> 
  </body>
</html>
