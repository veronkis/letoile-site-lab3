<?php
// review.php - Страница отзывов
session_start();
include 'config.php';

$is_logged_in = isset($_SESSION['user_id']);
$username = $is_logged_in ? $_SESSION['username'] : '';
$user_email = $is_logged_in ? $_SESSION['email'] : '';

$message = '';
$error = '';

// Обработка отправки отзыва
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = trim($_POST['product_name']);
    $rating = intval($_POST['rating']);
    $review_text = trim($_POST['review']);
    $recommend = isset($_POST['recommend']) ? $_POST['recommend'] : 'yes';
    
    if ($is_logged_in) {
        $name = $username;
        $email = $user_email;
    } else {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
    }
    
    // Валидация
    if (empty($product_name)) {
        $error = "Выберите товар!";
    } elseif (empty($review_text)) {
        $error = "Напишите отзыв!";
    } elseif (!$is_logged_in && empty($name)) {
        $error = "Введите ваше имя!";
    } elseif (!$is_logged_in && empty($email)) {
        $error = "Введите email!";
    } elseif (!$is_logged_in && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Введите корректный email!";
    } else {
        $sql = "INSERT INTO reviews (user_name, user_email, product_name, rating, review, recommend) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssiss", $name, $email, $product_name, $rating, $review_text, $recommend);
        
        if ($stmt->execute()) {
            $message = "Спасибо за ваш отзыв!";
            $_POST = array();
        } else {
            $error = "Ошибка при сохранении: " . $conn->error;
        }
        $stmt->close();
    }
}

// Получаем список товаров для выпадающего списка
$products = [];
$sql = "SELECT name FROM product ORDER BY name";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row['name'];
    }
}

// Получаем все отзывы
$reviews = [];
$sql = "SELECT * FROM reviews ORDER BY created_at DESC LIMIT 50";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лэтуаль | Отзывы</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .review-form-container {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 40px;
            box-shadow: var(--shadow);
        }
        .review-item {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #eee;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        .review-author {
            font-weight: bold;
            color: #ff1a6e;
        }
        .review-date {
            color: #999;
            font-size: 12px;
        }
        .review-rating {
            color: #ffc107;
            margin: 10px 0;
        }
        .review-text {
            color: #555;
            line-height: 1.6;
            margin: 10px 0;
        }
        .review-product {
            display: inline-block;
            background: #e9ecef;
            padding: 3px 10px;
            border-radius: 15px;
            font-size: 12px;
            margin-top: 10px;
        }
        .message-success {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
        .message-error {
            background: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
        .rating-star {
            color: #ffc107;
            font-size: 20px;
        }
        .form-row {
            margin-bottom: 20px;
        }
        .form-row label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--dark);
        }
        .form-row input, .form-row select, .form-row textarea {
            width: 100%;
            padding: 10px;
            border: 2px solid #eee;
            border-radius: 5px;
            font-size: 16px;
        }
        .radio-group {
            display: flex;
            gap: 20px;
            align-items: center;
            flex-wrap: wrap;
        }
        .radio-group label {
            display: inline-block;
            margin-right: 10px;
            font-weight: normal;
        }
        .radio-group input {
            width: auto;
            margin-right: 5px;
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
                <?php if ($is_logged_in): ?>
                    <div style="color: white; text-align: right;">
                        Привет, <strong><?php echo htmlspecialchars($username); ?></strong>!
                        <a href="logout.php" style="color: white; margin-left: 10px;">Выйти</a>
                    </div>
                <?php else: ?>
                    <form action="login-process.php" method="post">
                        <input type="text" name="login" placeholder="Логин или Email" required>
                        <input type="password" name="password" placeholder="Пароль" required>
                        <div style="text-align: right; margin-top: 10px;">
                            <input type="submit" value="Войти">
                            <a href="register.php" style="color: white; margin-left: 10px;">Регистрация</a>
                        </div>
                    </form>
                <?php endif; ?>
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
            </aside>
            
            <!-- ЦЕНТРАЛЬНАЯ ЧАСТЬ -->
            <main class="main-content" style="flex: 1; padding: 40px;">
                <h1 style="color: #ff1a6e; text-align: center;">ОТЗЫВЫ НАШИХ ПОКУПАТЕЛЕЙ</h1>
                <hr style="margin-bottom: 30px;">
                
                <!-- ФОРМА ОТЗЫВА -->
                <div class="review-form-container">
                    <h2 style="color: #6b46c1; margin-bottom: 20px;">Оставить отзыв</h2>
                    
                    <?php if ($message): ?>
                        <div class="message-success"><?php echo $message; ?></div>
                    <?php endif; ?>
                    <?php if ($error): ?>
                        <div class="message-error"><?php echo $error; ?></div>
                    <?php endif; ?>
                    
                    <form method="POST" action="">
                        <?php if (!$is_logged_in): ?>
                            <div class="form-row">
                                <label>Ваше имя *</label>
                                <input type="text" name="name" required>
                            </div>
                            <div class="form-row">
                                <label>Email *</label>
                                <input type="email" name="email" required>
                            </div>
                        <?php endif; ?>
                        
                        <div class="form-row">
                            <label>Товар *</label>
                            <select name="product_name" required>
                                <option value="">-- Выберите товар --</option>
                                <?php foreach ($products as $product): ?>
                                    <option value="<?php echo htmlspecialchars($product); ?>"><?php echo htmlspecialchars($product); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="form-row">
                            <label>Оценка *</label>
                            <div class="radio-group">
                                <label><input type="radio" name="rating" value="5" checked> ⭐⭐⭐⭐⭐ (5)</label>
                                <label><input type="radio" name="rating" value="4"> ⭐⭐⭐⭐ (4)</label>
                                <label><input type="radio" name="rating" value="3"> ⭐⭐⭐ (3)</label>
                                <label><input type="radio" name="rating" value="2"> ⭐⭐ (2)</label>
                                <label><input type="radio" name="rating" value="1"> ⭐ (1)</label>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <label>Ваш отзыв *</label>
                            <textarea name="review" rows="5" required></textarea>
                        </div>
                        
                        <div class="form-row">
                            <label>Рекомендуете товар?</label>
                            <div class="radio-group">
                                <label><input type="radio" name="recommend" value="yes" checked> ✅ Да</label>
                                <label><input type="radio" name="recommend" value="no"> ❌ Нет</label>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn">Отправить отзыв</button>
                    </form>
                </div>
                
                <!-- СПИСОК ОТЗЫВОВ -->
                <h2 style="color: #6b46c1; margin-top: 40px;">Последние отзывы</h2>
                <hr>
                
                <?php if (count($reviews) > 0): ?>
                    <?php foreach ($reviews as $review): ?>
                        <div class="review-item">
                            <div class="review-header">
                                <span class="review-author"><?php echo htmlspecialchars($review['user_name']); ?></span>
                                <span class="review-date"><?php echo date('d.m.Y', strtotime($review['created_at'])); ?></span>
                            </div>
                            <div class="review-rating">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <?php if ($i <= $review['rating']): ?>
                                        <span class="rating-star">★</span>
                                    <?php else: ?>
                                        <span class="rating-star" style="color: #ddd;">★</span>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                            <div class="review-text">
                                <?php echo nl2br(htmlspecialchars($review['review'])); ?>
                            </div>
                            <div class="review-product">
                                Товар: <?php echo htmlspecialchars($review['product_name']); ?>
                                <?php if ($review['recommend'] == 'yes'): ?>
                                    <span style="color: green;"> ✓ Рекомендую</span>
                                <?php else: ?>
                                    <span style="color: red;"> ✗ Не рекомендую</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="text-align: center; padding: 40px; color: #999;">Пока нет отзывов. Будьте первым!</p>
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