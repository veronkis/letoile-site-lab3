<?php
$page_title = 'О нас';
include 'header.php';
?>

<div style="display: flex;">
    <aside class="sidebar">
        <h3>Меню</h3>
        <a href="index.php">Главная</a>
        <a href="about.php">О нас</a>
        <a href="history.php">История фирмы</a>
        <a href="team.php">Сотрудники</a>
        <a href="new.php">Новинки</a>
        <a href="bestsellers.php">Хиты продаж</a>
        <a href="catalog.php">Каталог</a>
        <a href="contacts.php">Контакты</a>
        <a href="review.php">Отзывы</a>
    </aside>

    <main class="main-content" style="flex: 1; padding: 40px;">
        <h1 style="color: #ff1a6e; text-align: center;">О КОМПАНИИ ЛЭТУАЛЬ</h1>
        <hr style="margin-bottom: 30px;">
        
        <img src="images/team.jpg" alt="О компании" style="width: 100%; max-height: 300px; object-fit: cover; border-radius: 10px; margin-bottom: 30px;">
        
        <h2 style="color: #6b46c1;">Кто мы</h2>
        <p><strong>Лэтуаль</strong> — это <em>крупнейшая сеть магазинов парфюмерии и косметики</em> в России. Мы работаем с 1997 года и сегодня представляем более 1000 брендов со всего мира.</p>
        
        <h2 style="color: #6b46c1; margin-top: 30px;">Наша миссия</h2>
        <p>Мы помогаем женщинам и мужчинам быть красивыми и уверенными в себе. Мы предлагаем только качественную оригинальную продукцию по доступным ценам.</p>
        
        <h2 style="color: #6b46c1; margin-top: 30px;">Наши ценности</h2>
        <ul class="modern-list">
            <li>Качество — мы продаем только оригинальную продукцию</li>
            <li>Доступность — у нас более 700 магазинов по всей России</li>
            <li>Сервис — наши консультанты всегда готовы помочь</li>
        </ul>
        
        <a href="index.php" class="btn" style="margin-top: 30px;">← На главную</a>
    </main>
</div>

<?php include 'footer.php'; ?>