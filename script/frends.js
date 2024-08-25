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
  