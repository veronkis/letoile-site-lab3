<?php
// header.php - общая шапка для всех страниц
session_start();

$is_logged_in = isset($_SESSION['user_id']);
$username = $is_logged_in ? $_SESSION['username'] : '';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лэтуаль | <?php echo $page_title ?? 'Главная'; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container fade-in">
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
                        <?php if ($_SESSION['user_id'] == 1): ?>
                            | <a href="admin.php" style="color: white;">Админ-панель</a>
                        <?php endif; ?>
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