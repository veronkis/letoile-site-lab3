<?php
$page_title = 'Каталог';
include 'header.php';
include 'config.php';

// Получаем параметры сортировки и фильтра
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
$category_filter = isset($_GET['category']) ? $_GET['category'] : '';

// Разрешенные поля для сортировки
$allowed_sort = ['id', 'name', 'price'];
if (!in_array($sort, $allowed_sort)) {
    $sort = 'id';
}

// Разрешенные направления
if ($order != 'ASC' && $order != 'DESC') {
    $order = 'ASC';
}

// Получаем список всех категорий для фильтра
$categories = [];
$cat_sql = "SELECT DISTINCT category FROM product WHERE category != '' ORDER BY category";
$cat_result = $conn->query($cat_sql);
while ($row = $cat_result->fetch_assoc()) {
    $categories[] = $row['category'];
}

// Формируем SQL запрос с фильтром
$sql = "SELECT * FROM product";
if (!empty($category_filter)) {
    $sql .= " WHERE category = '" . $conn->real_escape_string($category_filter) . "'";
}
$sql .= " ORDER BY $sort $order";
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
        <h1 style="color: #ff1a6e; text-align: center;">КАТАЛОГ ТОВАРОВ</h1>
        <hr style="margin-bottom: 20px;">
        
        <!-- ФИЛЬТР ПО КАТЕГОРИЯМ -->
        <div style="background: #f8f9fa; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
            <div style="display: flex; flex-wrap: wrap; gap: 10px; align-items: center;">
                <span><strong>Категории:</strong></span>
                <a href="catalog.php?<?php echo http_build_query(array_merge($_GET, ['category' => ''])); ?>" 
                   style="padding: 5px 15px; background: <?php echo empty($category_filter) ? '#ff1a6e' : '#fff'; ?>; color: <?php echo empty($category_filter) ? '#fff' : '#333'; ?>; border-radius: 20px; text-decoration: none; border: 1px solid #ddd;">
                    Все
                </a>
                <?php foreach ($categories as $cat): ?>
                    <a href="catalog.php?<?php echo http_build_query(array_merge($_GET, ['category' => $cat])); ?>" 
                       style="padding: 5px 15px; background: <?php echo $category_filter == $cat ? '#ff1a6e' : '#fff'; ?>; color: <?php echo $category_filter == $cat ? '#fff' : '#333'; ?>; border-radius: 20px; text-decoration: none; border: 1px solid #ddd;">
                        <?php echo htmlspecialchars($cat); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        
        <!-- ПАНЕЛЬ СОРТИРОВКИ -->
        <div style="background: #f8f9fa; padding: 15px; border-radius: 10px; margin-bottom: 30px; display: flex; gap: 20px; flex-wrap: wrap; align-items: center;">
            <span><strong>Сортировать:</strong></span>
            <a href="?<?php echo http_build_query(array_merge($_GET, ['sort' => 'id', 'order' => 'ASC'])); ?>" 
               style="padding: 5px 10px; background: <?php echo ($sort=='id' && $order=='ASC') ? '#ff1a6e' : '#fff'; ?>; color: <?php echo ($sort=='id' && $order=='ASC') ? '#fff' : '#333'; ?>; border-radius: 5px; text-decoration: none; border: 1px solid #ddd;">
                По умолчанию
            </a>
            <a href="?<?php echo http_build_query(array_merge($_GET, ['sort' => 'name', 'order' => 'ASC'])); ?>" 
               style="padding: 5px 10px; background: <?php echo ($sort=='name' && $order=='ASC') ? '#ff1a6e' : '#fff'; ?>; color: <?php echo ($sort=='name' && $order=='ASC') ? '#fff' : '#333'; ?>; border-radius: 5px; text-decoration: none; border: 1px solid #ddd;">
                По названию (А-Я)
            </a>
            <a href="?<?php echo http_build_query(array_merge($_GET, ['sort' => 'name', 'order' => 'DESC'])); ?>" 
               style="padding: 5px 10px; background: <?php echo ($sort=='name' && $order=='DESC') ? '#ff1a6e' : '#fff'; ?>; color: <?php echo ($sort=='name' && $order=='DESC') ? '#fff' : '#333'; ?>; border-radius: 5px; text-decoration: none; border: 1px solid #ddd;">
                По названию (Я-А)
            </a>
            <a href="?<?php echo http_build_query(array_merge($_GET, ['sort' => 'price', 'order' => 'ASC'])); ?>" 
               style="padding: 5px 10px; background: <?php echo ($sort=='price' && $order=='ASC') ? '#ff1a6e' : '#fff'; ?>; color: <?php echo ($sort=='price' && $order=='ASC') ? '#fff' : '#333'; ?>; border-radius: 5px; text-decoration: none; border: 1px solid #ddd;">
                По цене (сначала дешевые)
            </a>
            <a href="?<?php echo http_build_query(array_merge($_GET, ['sort' => 'price', 'order' => 'DESC'])); ?>" 
               style="padding: 5px 10px; background: <?php echo ($sort=='price' && $order=='DESC') ? '#ff1a6e' : '#fff'; ?>; color: <?php echo ($sort=='price' && $order=='DESC') ? '#fff' : '#333'; ?>; border-radius: 5px; text-decoration: none; border: 1px solid #ddd;">
                По цене (сначала дорогие)
            </a>
        </div>
        
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
                            <p><?php echo $row['short_description']; ?></p>
                            <p><small>Категория: <?php echo htmlspecialchars($row['category']); ?></small></p>
                            <a href="product.php?id=<?php echo $row['id']; ?>" class="btn">Подробнее</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p style="text-align: center;">Товары не найдены</p>
            <?php endif; ?>
        </div>
    </main>
</div>

<?php include 'footer.php'; ?>