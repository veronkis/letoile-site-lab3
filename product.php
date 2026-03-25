<?php
// product.php - Универсальная страница товара
include 'config.php';

// Получаем ID товара из адресной строки
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Если ID не указан или равен 0 - перенаправляем в каталог
if ($id == 0) {
    header("Location: catalog.php");
    exit;
}

// Получаем данные товара из базы данных
$sql = "SELECT * FROM product WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

// Если товар не найден - перенаправляем в каталог
if (!$product) {
    header("Location: catalog.php");
    exit;
}

$page_title = $product['name'];
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
        <h1 style="color: #ff1a6e; text-align: center;"><?php echo htmlspecialchars($product['name']); ?></h1>
        <p style="text-align: center; color: #6c757d;">Артикул: <?php echo $product['id']; ?></p>
        <hr style="margin-bottom: 30px;">
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
            <!-- Левая колонка - изображение -->
            <div style="text-align: center;">
                <a href="images/<?php echo $product['image']; ?>" target="_blank">
                    <img src="images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" style="width: 100%; border-radius: 10px; border: 3px solid #ff1a6e;">
                </a>
                <p style="margin-top: 10px; color: #6c757d; font-style: italic;">Нажмите на изображение для увеличения</p>
            </div>
            
            <!-- Правая колонка - информация -->
            <div>
                <h2 style="color: #ff1a6e; font-size: 32px;"><?php echo number_format($product['price'], 0, '', ' '); ?> ₽</h2>
                <p style="color: green; margin-bottom: 20px;">✓ В наличии</p>
                
                <h3 style="color: #6b46c1;">Характеристики:</h3>
                <ul class="modern-list">
                    <li><strong>Бренд:</strong> <?php echo !empty($product['brand']) ? htmlspecialchars($product['brand']) : 'Другой'; ?></li>
                    <li><strong>Категория:</strong> <?php echo !empty($product['category']) ? htmlspecialchars($product['category']) : 'Парфюмерия'; ?></li>
                </ul>
                
                <h3 style="color: #6b46c1;">Краткое описание:</h3>
                <p style="color: #707070; font-size: 14px; font-style: italic; line-height: 16px;"><?php echo htmlspecialchars($product['short_description']); ?></p>
                
                <h3 style="color: #6b46c1;">Подробное описание:</h3>
                <p style="color: #484343; font-size: 16px; line-height: 24px;"><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
                
                <a href="catalog.php" class="btn" style="margin-top: 20px;">← Вернуться в каталог</a>
            </div>
        </div>
    </main>
</div>

<?php include 'footer.php'; ?>