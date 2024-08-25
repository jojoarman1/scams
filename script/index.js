document.addEventListener('DOMContentLoaded', () => {
    // Функция для перенаправления на другую страницу
    function navigateTo(page) {
      window.location.href = page;
    }
  
    // Найдите элементы кнопок по идентификаторам
    const homeButton = document.getElementById('homeButton');
    const leaderboardsButton = document.getElementById('leaderboardsButton');
    const friendsButton = document.getElementById('friendsButton');
  
    // Назначьте обработчики событий для кнопок
    homeButton.addEventListener('click', () => navigateTo('index.php'));
    leaderboardsButton.addEventListener('click', () => navigateTo('leader.php'));
    friendsButton.addEventListener('click', () => navigateTo('frends.php'));
  });
  function updateStyles() {
    const container = document.querySelector('.zadniifon-parent');
    const button = document.querySelector('.mainbuttons1');
    const backBigButton = document.querySelector('#backBigButton');
    const screenWidth = window.innerWidth;

    // Убедитесь, что minWidth и maxWidth имеют разумные значения
    const minWidth = 0; // Минимальная ширина экрана
    const maxWidth = 450; // Максимальная ширина экрана, измените по необходимости

    // Параметры для .zadniifon-container
    const minContainerScale = 0; // Минимальный коэффициент масштабирования
    const maxContainerScale = 1; // Максимальный коэффициент масштабирования
    const minContainerMarginTop = -174; // Минимальный верхний отступ
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

