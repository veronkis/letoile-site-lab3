<?php
// test_connection.php - Проверка подключения к БД
include 'config.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лэтуаль | Проверка БД</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .result-box {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            text-align: center;
            box-shadow: var(--shadow);
        }
        .success {
            color: green;
            font-weight: bold;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container fade-in">
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
                        <a href="register.html" style="color: white;">Регистрация</a>
                    </div>
                </form>
            </div>
        </header>

        <nav class="nav">
            <div class="nav-links">
                <a href="index.html">Главная</a>
                <a href="catalog.html">Каталог</a>
                <a href="contacts.html">Контакты</a>
                <a href="brands.html">Бренды</a>
                <a href="new.html">Новинки</a>
                <a href="products_db.php">Товары из БД</a>
            </div>
        </nav>

        <div class="result-box">
            <h1 style="color: var(--primary);">Проверка подключения</h1>
            <hr>
            <?php
            // Проверяем, есть ли данные в таблице
            $sql = "SELECT COUNT(*) as count FROM product";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            ?>
            <p><strong>Сервер:</strong> <?php echo $servername; ?></p>
            <p><strong>База данных:</strong> <?php echo $dbname; ?></p>
            <p><strong>Количество товаров:</strong> <?php echo $row['count']; ?></p>
            
            <?php if ($row['count'] > 0): ?>
                <p class="success">✓ Подключение к базе данных работает корректно!</p>
                <a href="products_db.php" class="btn" style="margin-top: 20px;">Перейти к товарам</a>
            <?php else: ?>
                <p class="error">✗ В таблице нет данных</p>
                <a href="add_product.php" class="btn" style="margin-top: 20px;">Добавить товар</a>
            <?php endif; ?>
            
            <a href="index.html" class="btn" style="margin-top: 10px; background: #6c757d;">На главную</a>
        </div>

        <footer class="footer">
            <hr>
            <div class="copyright">
                <p>&copy; 2024 Лэтуаль. Все права защищены</p>
            </div>
        </footer>
    </div>
</body>
</html>
<?php $conn->close(); ?>