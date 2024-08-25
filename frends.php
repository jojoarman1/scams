<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0" />
    <link rel="stylesheet" href="./style/global.css" />
    <link rel="stylesheet" href="./style/frends.css" />
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
    <div class="newscamfrendsframe">
      <div class="main">
        <section class="zadniifon-container">
              <div class="yourfrendsall">

                <div class="frame-wrapper3">
                  <div class="zadniifon3"></div>
                  <div class="texttopscammers-wrapper">
                    <b class="texttopscammers1">
                      <span>Invite frends and get more </span>
                      <span class="scam3">SCAM$</span>
                    </b>
                  </div>
                  <div class="svgfrends-wrapper">
                    <img
                      class="svgfrends-icon"
                      loading="lazy"
                      alt=""
                      src="./public/svgfrends.svg"
                    />
                  </div>
                    <div class="frame-parent2">
                      <div class="kolvofrendstext-parent">
                        <b class="kolvofrendstext">10</b>
                        <b class="textfrends">frends</b>
                      </div>
                    </div>
                <div class="yourfrends-group">
                  <div class="yourfrends">
                    <div class="avafrends-parent">
                      <div class="avafrends"></div>
                      <div class="usernamefrends-wrapper">
                        <b class="usernamefrends">John</b>
                      </div>
                    </div>
                    <div class="yourfrends-inner">
                      <div class="kolvoscamszafrends-parent">
                        <b class="kolvoscamszafrends">+42</b>
                        <b class="valutafrends">SCAM$</b>
                      </div>
                    </div>
                  </div>

                  
                </div>
              </div>
            </div>
          </div>
        </section>
        
        <div class="back-bigbutton" id="backBigButton">
          <div class="bigbutton" id="bigButton">
            <b class="bigbuttontext">Big Button</b>
          </div>
        </div>
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
                src="./public/leaderboardsbuttonimage1.svg"
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
                src="./public/frendsbuttonimage1.svg"
              />
            </div>
            <b class="hometext">Frends</b>
          </div>
        </div>
      </div>
    </div>
    <script>
      function updateStyles() {
        const container = document.querySelector('.zadniifon-container');
        const button = document.querySelector('.mainbuttons1');
        const backBigButton = document.querySelector('#backBigButton');
        const screenWidth = window.innerWidth;
    
        // Убедитесь, что minWidth и maxWidth имеют разумные значения
        const minWidth = 0; // Минимальная ширина экрана
        const maxWidth = 450; // Максимальная ширина экрана, измените по необходимости
    
        // Параметры для .zadniifon-container
        const minContainerScale = 0; // Минимальный коэффициент масштабирования
        const maxContainerScale = 1; // Максимальный коэффициент масштабирования
        const minContainerMarginTop = -360; // Минимальный верхний отступ
        const maxContainerMarginTop = 50;  // Максимальный верхний отступ
    
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
    
    <script src="./script/frends.js"></script>
    <script src="./script/telegram-web-app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js"></script>
    <script src="./script/FullOpen.js"></script>
    <script src="./bd/db_connect.php"></script> 
  </body>
</html>
