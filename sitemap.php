<?php
$page_title = 'Карта сайта';
include 'header.php';
?>

<div style="display: flex;">
    <aside class="sidebar">...</aside>

    <main class="main-content" style="flex: 1; padding: 40px;">
        <h1 style="color: #ff1a6e;">Карта сайта</h1>
        <hr>
        <ul>
            <li><a href="index.php">Главная</a></li>
            <li><a href="catalog.php">Каталог</a></li>
            <li><a href="contacts.php">Контакты</a></li>
            <li><a href="about.php">О нас</a></li>
            <li><a href="history.php">История</a></li>
            <li><a href="team.php">Сотрудники</a></li>
            <li><a href="review.php">Отзывы</a></li>
        </ul>
        <a href="index.php" class="btn">← На главную</a>
    </main>
</div>

<?php include 'footer.php'; ?>