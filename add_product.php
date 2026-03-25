<?php
// add_product.php - Добавление товара
session_start();
include 'config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != 1) {
    header("Location: index.php");
    exit;
}

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brand = trim($_POST['brand']);
    $category = trim($_POST['category']);
    $name = trim($_POST['name']);
    $price = floatval($_POST['price']);
    $short_desc = trim($_POST['short_description']);
    $desc = trim($_POST['description']);
    $image = trim($_POST['image']);
    
    if (empty($name)) {
        $error = "Введите название товара!";
    } elseif ($price <= 0) {
        $error = "Введите корректную цену!";
    } elseif (empty($short_desc)) {
        $error = "Введите краткое описание!";
    } else {
        $alias = strtolower(str_replace(' ', '-', $name));
        $alias = preg_replace('/[^a-z0-9-]/', '', $alias);
        $available = 1;
        $meta_keywords = $name . ', ' . $category . ', косметика';
        $meta_description = $short_desc;
        $meta_title = $name;
        
        if (empty($image)) {
            $image = 'perfume_default.jpg';
        }
        
        $sql = "INSERT INTO product (brand, category, name, alias, short_description, description, price, image, available, meta_keywords, meta_description, meta_title) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssdsssss", $brand, $category, $name, $alias, $short_desc, $desc, $price, $image, $available, $meta_keywords, $meta_description, $meta_title);
        
        if ($stmt->execute()) {
            $message = "Товар успешно добавлен! ID: " . $stmt->insert_id;
            $_POST = array();
        } else {
            $error = "Ошибка: " . $conn->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лэтуаль | Добавить товар</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .form-container { max-width: 600px; margin: 50px auto; background: #f8f9fa; padding: 30px; border-radius: 15px; }
        .message-success { background: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; text-align: center; }
        .message-error { background: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 20px; text-align: center; }
        .admin-nav { background: #333; padding: 10px; text-align: center; margin-bottom: 20px; }
        .admin-nav a { color: white; margin: 0 15px; text-decoration: none; }
    </style>
</head>
<body>
    <div class="admin-nav">
        <a href="admin.php">📦 Товары</a>
        <a href="add_product.php">➕ Добавить товар</a>
        <a href="index.php">🏠 На сайт</a>
        <a href="logout.php">🚪 Выйти</a>
    </div>
    
    <div class="form-container">
        <h1 style="color: #ff1a6e; text-align: center;">Добавить товар</h1>
        <hr>
        
        <?php if ($message): ?>
            <div class="message-success"><?php echo $message; ?></div>
        <?php endif; ?>
        <?php if ($error): ?>
            <div class="message-error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label>Бренд *</label>
                <input type="text" name="brand" placeholder="Например: Chanel, Dior, Gucci" required>
            </div>
            <div class="form-group">
                <label>Категория *</label>
                <select name="category" required>
                    <option value="Парфюмерия">Парфюмерия</option>
                    <option value="Декоративная косметика">Декоративная косметика</option>
                    <option value="Уход за кожей">Уход за кожей</option>
                    <option value="Уход за волосами">Уход за волосами</option>
                    <option value="Мужчинам">Мужчинам</option>
                    <option value="Подарочные наборы">Подарочные наборы</option>
                </select>
            </div>
            <div class="form-group">
                <label>Название товара *</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Цена *</label>
                <input type="number" name="price" step="0.01" required>
            </div>
            <div class="form-group">
                <label>Краткое описание *</label>
                <textarea name="short_description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label>Полное описание</label>
                <textarea name="description" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label>Изображение (имя файла)</label>
                <input type="text" name="image" placeholder="perfume1.jpg">
            </div>
            <button type="submit" class="btn" style="width:100%;">Добавить</button>
            <a href="admin.php" class="btn" style="width:100%; margin-top:10px; background:#6c757d;">Отмена</a>
        </form>
    </div>
</body>
</html>