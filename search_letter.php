<?php
// search_letter.php - Поиск товаров по первой букве

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
// МНОГОМЕРНЫЙ АССОЦИИРОВАННЫЙ МАССИВ ТОВАРОВ
// =============================================
$products = array(
    // Женская парфюмерия
    'Chanel Chance' => array(
        'name' => 'Chanel Chance',
        'brand' => 'Chanel',
        'category' => 'Парфюмерия',
        'price' => '8 990 ₽',
        'description' => 'Цветочно-цитрусовый аромат для современных женщин',
        'page' => 'product1.html',
        'image' => 'images/perfume1.jpg'
    ),
    'Dior J\'adore' => array(
        'name' => 'Dior J\'adore',
        'brand' => 'Dior',
        'category' => 'Парфюмерия',
        'price' => '10 490 ₽',
        'description' => 'Элегантный цветочно-фруктовый аромат',
        'page' => 'product2.html',
        'image' => 'images/perfume2.jpg'
    ),
    'Gucci Bloom' => array(
        'name' => 'Gucci Bloom',
        'brand' => 'Gucci',
        'category' => 'Парфюмерия',
        'price' => '7 990 ₽',
        'description' => 'Нежный цветочный аромат',
        'page' => 'product3.html',
        'image' => 'images/perfume3.jpg'
    ),
    'YSL Libre' => array(
        'name' => 'YSL Libre',
        'brand' => 'Yves Saint Laurent',
        'category' => 'Парфюмерия',
        'price' => '9 490 ₽',
        'description' => 'Новый аромат 2024',
        'page' => '#',
        'image' => 'images/perfume4.jpg'
    ),
    'Givenchy L\'Interdit' => array(
        'name' => 'Givenchy L\'Interdit',
        'brand' => 'Givenchy',
        'category' => 'Парфюмерия',
        'price' => '8 490 ₽',
        'description' => 'Запретный цветочный аромат',
        'page' => '#',
        'image' => 'images/perfume5.jpg'
    ),
    'Prada Paradoxe' => array(
        'name' => 'Prada Paradoxe',
        'brand' => 'Prada',
        'category' => 'Парфюмерия',
        'price' => '9 990 ₽',
        'description' => 'Современный цветочный аромат',
        'page' => '#',
        'image' => 'images/perfume6.jpg'
    ),
    
    // Мужская парфюмерия
    'Boss Bottled' => array(
        'name' => 'Boss Bottled',
        'brand' => 'Hugo Boss',
        'category' => 'Мужская парфюмерия',
        'price' => '6 490 ₽',
        'description' => 'Древесный аромат для мужчин',
        'page' => '#',
        'image' => 'images/perfume7.jpg'
    ),
    'Bleu de Chanel' => array(
        'name' => 'Bleu de Chanel',
        'brand' => 'Chanel',
        'category' => 'Мужская парфюмерия',
        'price' => '7 990 ₽',
        'description' => 'Древесно-пряный аромат',
        'page' => '#',
        'image' => 'images/perfume8.jpg'
    ),
    'Dior Sauvage' => array(
        'name' => 'Dior Sauvage',
        'brand' => 'Dior',
        'category' => 'Мужская парфюмерия',
        'price' => '8 490 ₽',
        'description' => 'Свежий фужерный аромат',
        'page' => '#',
        'image' => 'images/perfume9.jpg'
    ),
    
    // Декоративная косметика
    'Помада Dior' => array(
        'name' => 'Помада Dior',
        'brand' => 'Dior',
        'category' => 'Декоративная косметика',
        'price' => '3 490 ₽',
        'description' => '24 оттенка, стойкая формула',
        'page' => '#',
        'image' => 'images/pomada.jpg'
    ),
    'Блеск для губ' => array(
        'name' => 'Блеск для губ',
        'brand' => 'Lancome',
        'category' => 'Декоративная косметика',
        'price' => '2 490 ₽',
        'description' => 'Объем 6 мл, увлажнение',
        'page' => '#',
        'image' => 'images/blesk.jpg'
    ),
    'Тушь Lancome' => array(
        'name' => 'Тушь Lancome',
        'brand' => 'Lancome',
        'category' => 'Декоративная косметика',
        'price' => '2 990 ₽',
        'description' => 'Объем + удлинение',
        'page' => '#',
        'image' => 'images/tosh.jpg'
    ),
    
    // Уход за кожей
    'Крем для лица' => array(
        'name' => 'Крем для лица',
        'brand' => 'La Roche-Posay',
        'category' => 'Уход за кожей',
        'price' => '2 490 ₽',
        'description' => 'Увлажняющий для всех типов кожи',
        'page' => '#',
        'image' => 'images/krem1.jpg'
    ),
    'Сыворотка' => array(
        'name' => 'Сыворотка',
        'brand' => 'Vichy',
        'category' => 'Уход за кожей',
        'price' => '3 990 ₽',
        'description' => 'Антивозрастная',
        'page' => '#',
        'image' => 'images/sivorotka.jpg'
    ),
    'Тоник для лица' => array(
        'name' => 'Тоник для лица',
        'brand' => 'Avene',
        'category' => 'Уход за кожей',
        'price' => '1 490 ₽',
        'description' => 'Очищающий',
        'page' => '#',
        'image' => 'images/tonik.jpg'
    )
);

// =============================================
// ПОИСК ТОВАРОВ ПО ПЕРВОЙ БУКВЕ
// =============================================
$found_products = array();
if (!empty($first_letter)) {
    foreach ($products as $product_name => $product_info) {
        // Берем первую букву названия
        $first_char = mb_substr($product_name, 0, 1, 'UTF-8');
        $first_char_upper = mb_strtoupper($first_char, 'UTF-8');
        
        // Сравниваем с введенной буквой
        if ($first_char_upper === $first_letter) {
            $found_products[] = $product_info;
        }
    }
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
                <form action="login-process.html" method="get">
                    <input type="text" name="username" placeholder="Логин" required>
                    <input type="password" name="password" placeholder="Пароль" required>
                    <div style="text-align: right; margin-top: 10px;">
                        <input type="submit" value="Войти">
                        <a href="register.html" style="color: white; margin-left: 10px;">Регистрация</a>
                    </div>
                </form>
            </div>
        </header>
        
        <!-- НАВИГАЦИЯ -->
        <nav class="nav">
            <div class="nav-links">
                <a href="index.html">Главная</a>
                <a href="catalog.html">Каталог</a>
                <a href="contacts.html">Контакты</a>
                <a href="brands.html">Бренды</a>
                <a href="new.html">Новинки</a>
                <a href="review.html">Отзывы</a>
                <a href="search_form.html">Поиск по букве</a>
            </div>
            <div class="search-box">
                <form action="search_form.html" method="get">
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
                <a href="index.html">Главная</a>
                <a href="about.html">О нас</a>
                <a href="history.html">История фирмы</a>
                <a href="team.html">Сотрудники</a>
                <a href="new.html">Новинки</a>
                <a href="bestsellers.html">Хиты продаж</a>
                <a href="catalog.html">Каталог</a>
                <a href="contacts.html">Контакты</a>
                <a href="review.html">Отзывы</a>
                <a href="search_form.html">Поиск по букве</a>
                
                <h3 style="margin-top: 30px;">Категории</h3>
                <a href="category-perfume.html">Парфюмерия</a>
                <a href="category-makeup.html">Декоративная косметика</a>
                <a href="category-skin.html">Уход за кожей</a>
                <a href="category-hair.html">Уход за волосами</a>
                <a href="category-men.html">Мужчинам</a>
                <a href="category-gifts.html">Подарочные наборы</a>
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
                        <a href="search_form.html" class="btn" style="margin-top: 20px;">На страницу поиска</a>
                    </div>
                    
                <?php elseif (empty($found_products)): ?>
                    <!-- НИЧЕГО НЕ НАЙДЕНО -->
                    <div class="count-badge" style="background: linear-gradient(135deg, #ff1a6e, #6b46c1);">
                        По запросу "<?php echo htmlspecialchars($search_q); ?>" ничего не найдено
                    </div>
                    <div class="no-results">
                        <p>Товары на букву "<?php echo $first_letter; ?>" отсутствуют</p>
                        <p style="color: var(--gray); margin: 20px 0;">Попробуйте ввести другую букву</p>
                        <a href="search_form.html" class="btn">Новый поиск</a>
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
                        <a href="search_form.html" class="btn">Новый поиск</a>
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
                    <p><a href="about.html" style="color: white;">О нас</a></p>
                    <p><a href="history.html" style="color: white;">История</a></p>
                    <p><a href="team.html" style="color: white;">Сотрудники</a></p>
                </div>
                <div class="footer-section">
                    <h4>Покупателям</h4>
                    <p><a href="catalog.html" style="color: white;">Каталог</a></p>
                    <p><a href="delivery.html" style="color: white;">Доставка</a></p>
                    <p><a href="payment.html" style="color: white;">Оплата</a></p>
                    <p><a href="review.html" style="color: white;">Отзывы</a></p>
                    <p><a href="search_form.html" style="color: white;">Поиск по букве</a></p>
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