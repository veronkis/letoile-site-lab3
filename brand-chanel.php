<?php
$page_title = 'Chanel';
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
        <h1 style="color: #ff1a6e;">Chanel</h1>
        <hr>
        <div class="product-grid">
            <div class="product-card">
                <a href="product1.php"><img src="images/perfume1.jpg"><h3>Chanel Chance</h3></a>
            </div>
        </div>
        <a href="brands.php" class="btn" style="margin-top: 20px;">← Назад к брендам</a>
    </main>
</div>

<?php include 'footer.php'; ?>