<?php
// search_letter.php - Поиск товаров по первой букве в БД
include 'config.php';

// Получаем данные из формы и очищаем
$search_q = '';
if (isset($_POST['search_q'])) {
    $search_q = trim($_POST['search_q']);
    $search_q = strip_tags($search_q);
    $search_q = htmlspecialchars($search_q);
}

// Если запрос пустой - показываем сообщение
$first_letter = '';
if (!empty($search_q)) {
    $first_letter = mb_strtoupper(mb_substr($search_q, 0, 1, 'UTF-8'));
}

// =============================================
// ПОИСК ТОВАРОВ В БАЗЕ ДАННЫХ ПО ПЕРВОЙ БУКВЕ
// =============================================
$found_products = array();

if (!empty($first_letter)) {
    // Ищем товары, название которых начинается с введенной буквы
    $sql = "SELECT * FROM product WHERE name LIKE ? ORDER BY name ASC";
    $stmt = $conn->prepare($sql);
    $like = $first_letter . '%';
    $stmt->bind_param("s", $like);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $found_products[] = array(
            'name' => $row['name'],
            'brand' => !empty($row['brand']) ? $row['brand'] : 'Другой',
            'category' => !empty($row['category']) ? $row['category'] : 'Парфюмерия',
            'price' => number_format($row['price'], 0, '', ' ') . ' ₽',
            'description' => $row['short_description'],
            'page' => 'product.php?id=' . $row['id'],
            'image' => 'images/' . $row['image']
        );
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лэтуаль | Результаты поиска</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .result-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            gap: 20px;
            align-items: center;
            box-shadow: var(--shadow);
            border: 1px solid #eee;
            transition: all 0.3s;
        }
        .result-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }
        .result-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
            border: 3px solid var(--primary);
        }
        .result-info {
            flex: 1;
        }
        .result-info h3 {
            color: var(--primary);
            margin-bottom: 5px;
        }
        .result-info .brand {
            color: var(--secondary);
            font-weight: 600;
            margin-bottom: 5px;
        }
        .result-info .category {
            color: var(--gray);
            font-size: 14px;
            margin-bottom: 5px;
        }
        .result-info .price {
            color: var(--primary);
            font-size: 20px;
            font-weight: 700;
        }
        .count-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 30px;
            font-size: 18px;
        }
        .no-results {
            text-align: center;
            padding: 60px;
            background: #f8f9fa;
            border-radius: 10px;
            margin: 40px 0;
        }
    </style>
</head>
<body>
    <div class="container fade-in">
        <!-- ШАПКА САЙТА -->
        <header class="header">
            <div class="logo">
                <h1>ЛЭТУАЛЬ</h1>
                <p>Beauty is your way</p>
            </div>
            <div class="login-form">
                <form action="login-process.php" method="get">
                    <input type="text" name="username" placeholder="Логин" required>
                    <input type="password" name="password" placeholder="Пароль" required>
                    <div style="text-align: right; margin-top: 10px;">
                        <input type="submit" value="Войти">
                        <a href="register.php" style="color: white; margin-left: 10px;">Регистрация</a>
                    </div>
                </form>
            </div>
        </header>
        
        <!-- НАВИГАЦИЯ -->
        <nav class="nav">
            <div class="nav-links">
                <a href="index.php">Главная</a>
                <a href="catalog.php">Каталог</a>
                <a href="contacts.php">Контакты</a>
                <a href="brands.php">Бренды</a>
                <a href="new.php">Новинки</a>
                <a href="review.php">Отзывы</a>
                <a href="search_form.php">Поиск по букве</a>
            </div>
            <div class="search-box">
                <form action="search_form.php" method="get">
                    <input type="text" name="query" placeholder="Поиск...">
                    <input type="submit" value="Найти">
                </form>
            </div>
        </nav>
        
        <!-- ОСНОВНОЙ КОНТЕНТ -->
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
                <a href="search_form.php">Поиск по букве</a>
            </aside>
            
            <!-- ЦЕНТРАЛЬНАЯ ЧАСТЬ -->
            <main class="main-content" style="flex: 1; padding: 40px;">
                <h1 style="color: var(--primary); text-align: center;">РЕЗУЛЬТАТЫ ПОИСКА</h1>
                <hr style="margin-bottom: 30px;">
                
                <?php if (empty($search_q)): ?>
                    <!-- ЕСЛИ НИЧЕГО НЕ ВВЕДЕНО -->
                    <div class="no-results">
                        <h3 style="color: var(--primary);">🔍 Введите букву для поиска</h3>
                        <p>Вернитесь на страницу поиска и введите первую букву названия товара</p>
                        <a href="search_form.php" class="btn" style="margin-top: 20px;">На страницу поиска</a>
                    </div>
                    
                <?php elseif (empty($found_products)): ?>
                    <!-- НИЧЕГО НЕ НАЙДЕНО -->
                    <div class="count-badge" style="background: linear-gradient(135deg, #ff1a6e, #6b46c1);">
                        По запросу "<?php echo htmlspecialchars($search_q); ?>" ничего не найдено
                    </div>
                    <div class="no-results">
                        <p>Товары на букву "<?php echo $first_letter; ?>" отсутствуют</p>
                        <p style="color: var(--gray); margin: 20px 0;">Попробуйте ввести другую букву</p>
                        <a href="search_form.php" class="btn">Новый поиск</a>
                    </div>
                    
                <?php else: ?>
                    <!-- ПОКАЗЫВАЕМ КОЛИЧЕСТВО -->
                    <div class="count-badge">
                        Найдено товаров на букву "<?php echo $first_letter; ?>": <?php echo count($found_products); ?>
                    </div>
                    
                    <!-- ВЫВОДИМ НАЙДЕННЫЕ ТОВАРЫ -->
                    <?php foreach ($found_products as $product): ?>
                    <div class="result-card">
                        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="result-image" onerror="this.src='images/perfume1.jpg'">
                        <div class="result-info">
                            <h3><?php echo $product['name']; ?></h3>
                            <div class="brand"><?php echo $product['brand']; ?></div>
                            <div class="category"><?php echo $product['category']; ?></div>
                            <div class="price"><?php echo $product['price']; ?></div>
                            <div class="description"><?php echo $product['description']; ?></div>
                            <a href="<?php echo $product['page']; ?>" class="btn" style="margin-top: 10px;">Подробнее</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                    <div style="text-align: center; margin-top: 30px;">
                        <a href="search_form.php" class="btn">Новый поиск</a>
                    </div>
                    
                <?php endif; ?>
            </main>
        </div>
        
        <!-- ПОДВАЛ -->
        <footer class="footer">
            <hr>
            <div class="footer-content">
                <div class="footer-section">
                    <h4>О компании</h4>
                    <p><a href="about.php" style="color: white;">О нас</a></p>
                    <p><a href="history.php" style="color: white;">История</a></p>
                    <p><a href="team.php" style="color: white;">Сотрудники</a></p>
                </div>
                <div class="footer-section">
                    <h4>Покупателям</h4>
                    <p><a href="catalog.php" style="color: white;">Каталог</a></p>
                    <p><a href="delivery.php" style="color: white;">Доставка</a></p>
                    <p><a href="payment.php" style="color: white;">Оплата</a></p>
                    <p><a href="review.php" style="color: white;">Отзывы</a></p>
                    <p><a href="search_form.php" style="color: white;">Поиск по букве</a></p>
                </div>
                <div class="footer-section">
                    <h4>Контакты</h4>
                    <p><a href="tel:88001234567" style="color: white;">8-800-123-45-67</a></p>
                    <p><a href="mailto:info@letoile.ru" style="color: white;">info@letoile.ru</a></p>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2024 Лэтуаль. Все права защищены</p>
            </div>
        </footer>
    </div>
</body>
</html>