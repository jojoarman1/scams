document.addEventListener('DOMContentLoaded', function() {
    // Проверяем, что WebApp загружен
    window.Telegram.WebApp.ready();

    // Включение подтверждения при закрытии
    window.Telegram.WebApp.enableClosingConfirmation();

    // Разворачиваем WebApp на весь экран
    window.Telegram.WebApp.expand();

    window.Telegram.WebApp.disableVerticalSwipes();

    // Устанавливаем цвет фона заголовка
    window.Telegram.WebApp.setHeaderColor('#000');

    window.Telegram.WebApp.secondary_bg_color('#000');

    // Подписка на событие themeChanged
    window.Telegram.WebApp.onEvent('themeChanged', function() {
        // Обработка изменения темы, если нужно
        window.Telegram.WebApp.expand();
    });

    // Подписка на событие viewportChanged, чтобы управлять изменениями размера
    window.Telegram.WebApp.onEvent('viewportChanged', function() {
        // Адаптируем интерфейс под новый размер
        console.log('Viewport changed:', window.Telegram.WebApp.viewport);
    });
});
