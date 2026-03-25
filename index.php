<?php
$page_title = 'Главная';
include 'header.php';
include 'config.php';
?>

<div style="display: flex;">
    <!-- ЛЕВЫЙ САЙДБАР -->
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

    <!-- ЦЕНТРАЛЬНАЯ ЧАСТЬ -->
    <main class="main-content" style="flex: 1;">
        <h1 style="color: #ff1a6e; text-align: center;">ДОБРО ПОЖАЛОВАТЬ В МИР КРАСОТЫ!</h1>
        
        <div style="margin-bottom: 30px;">
            <img src="images/team.jpg" alt="Команда Лэтуаль" style="width: 300px; float: left; margin-right: 20px; border-radius: 10px;">
            
            <h2 style="color: #6b46c1;"><a href="about.php" style="color: #6b46c1;">О нас</a></h2>
            <p><strong>Лэтуаль</strong> — это <em>крупнейшая сеть магазинов парфюмерии и косметики</em> в России.</p>
            
            <h2 style="color: #6b46c1;"><a href="history.php" style="color: #6b46c1;">История фирмы</a></h2>
            <p>Начав с одного магазина в Москве, сегодня мы имеем более <strong>700 точек продаж</strong> по всей стране.</p>
        </div>
        
        <div style="clear: both;"></div>
        
        <h2 style="color: #6b46c1;"><a href="team.php" style="color: #6b46c1;">Наши сотрудники</a></h2>
        <p>В нашей компании работают <em>профессионалы высочайшего уровня</em>.</p>
        
        <!-- ТАБЛИЦА -->
        <h2 style="color: #6b46c1;">Преимущества работы с нами</h2>
        <table class="modern-table">
            <tr>
                <td rowspan="3" style="background: linear-gradient(135deg, #ff1a6e, #6b46c1); color: white; font-weight: bold;">
                    БОЛЕЕ 20 ЛЕТ<br>НА РЫНКЕ
                </td>
                <td colspan="2" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                    ГАРАНТИЯ КАЧЕСТВА
                </td>
            </tr>
            <tr>
                <td><strong>Оригинальная продукция</strong><br><small>Только официальные поставки</small></td>
                <td><strong>Доставка по России</strong><br><small>Бесплатно от 3000₽</small></td>
            </tr>
            <tr>
                <td><strong>Подарочная упаковка</strong><br><small>Любой товар бесплатно</small></td>
                <td><strong>Бонусная программа</strong><br><small>Кэшбэк до 10%</small></td>
            </tr>
        </table>
        
        <!-- БЛОК С ТОВАРАМИ -->
        <h2 style="color: #6b46c1;">Рекомендуемые товары</h2>
        <div class="product-grid" style="grid-template-columns: repeat(3, 1fr);">
            <?php
            // Получаем первые 3 товара из БД для рекомендаций
            $rec_sql = "SELECT * FROM product ORDER BY id ASC LIMIT 3";
            $rec_result = $conn->query($rec_sql);
            while($row = $rec_result->fetch_assoc()):
            ?>
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
        </div>
        
        <?php if (!$is_logged_in): ?>
    <div style="background: #f8f9fa; padding: 10px; border-radius: 5px; margin-top: 20px; text-align: center;">
        <a href="register.php">Зарегистрируйтесь</a> или войдите, чтобы пользоваться всеми возможностями сайта.
    </div>
<?php endif; ?>
    </main>
</div>

<?php include 'footer.php'; ?>