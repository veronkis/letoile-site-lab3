<?php
$page_title = 'Новинки';
include 'header.php';
include 'config.php';

// Получаем последние добавленные товары (новинки)
$sql = "SELECT * FROM product ORDER BY id DESC LIMIT 6";
$result = $conn->query($sql);
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

    <main class="main-content" style="flex: 1;">
        <h1 style="color: #ff1a6e; text-align: center;">НОВИНКИ СЕЗОНА</h1>
        <hr style="margin-bottom: 30px;">
        
        <div class="product-grid">
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="product-card">
                        <a href="product.php?id=<?php echo $row['id']; ?>">
                            <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                        </a>
                        <div class="product-info">
                            <h3><a href="product.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></h3>
                            <p class="price"><?php echo number_format($row['price'], 0, '', ' '); ?> ₽</p>
                            <a href="product.php?id=<?php echo $row['id']; ?>" class="btn">Подробнее</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p style="text-align: center;">Новинок пока нет</p>
            <?php endif; ?>
        </div>
    </main>
</div>

<?php include 'footer.php'; ?>