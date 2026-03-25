<?php
// edit_product.php - Редактирование товара
session_start();
include 'config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != 1) {
    header("Location: index.php");
    exit;
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id == 0) die("Не указан ID товара");

$sql = "SELECT * FROM product WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if (!$product) die("Товар не найден");

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
    } else {
        $sql = "UPDATE product SET brand=?, category=?, name=?, price=?, short_description=?, description=?, image=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssdsssi", $brand, $category, $name, $price, $short_desc, $desc, $image, $id);
        
        if ($stmt->execute()) {
            $message = "Товар обновлен!";
            $product['brand'] = $brand;
            $product['category'] = $category;
            $product['name'] = $name;
            $product['price'] = $price;
            $product['short_description'] = $short_desc;
            $product['description'] = $desc;
            $product['image'] = $image;
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
    <title>Лэтуаль | Редактировать</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .form-container { max-width: 600px; margin: 50px auto; background: #f8f9fa; padding: 30px; border-radius: 15px; }
        .message-success { background: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; }
        .message-error { background: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 20px; }
        .admin-nav { background: #333; padding: 10px; text-align: center; margin-bottom: 20px; }
        .admin-nav a { color: white; margin: 0 15px; text-decoration: none; }
    </style>
</head>
<body>
    <div class="admin-nav">
        <a href="admin.php">📦 Товары</a>
        <a href="add_product.php">➕ Добавить</a>
        <a href="index.php">🏠 На сайт</a>
        <a href="logout.php">🚪 Выйти</a>
    </div>
    
    <div class="form-container">
        <h1 style="color: #ff1a6e;">Редактировать товар ID: <?php echo $id; ?></h1>
        <hr>
        
        <?php if ($message): ?>
            <div class="message-success"><?php echo $message; ?></div>
        <?php endif; ?>
        <?php if ($error): ?>
            <div class="message-error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label>Бренд</label>
                <input type="text" name="brand" value="<?php echo htmlspecialchars($product['brand']); ?>">
            </div>
            <div class="form-group">
                <label>Категория</label>
                <select name="category">
                    <option value="Парфюмерия" <?php echo $product['category'] == 'Парфюмерия' ? 'selected' : ''; ?>>Парфюмерия</option>
                    <option value="Декоративная косметика" <?php echo $product['category'] == 'Декоративная косметика' ? 'selected' : ''; ?>>Декоративная косметика</option>
                    <option value="Уход за кожей" <?php echo $product['category'] == 'Уход за кожей' ? 'selected' : ''; ?>>Уход за кожей</option>
                    <option value="Уход за волосами" <?php echo $product['category'] == 'Уход за волосами' ? 'selected' : ''; ?>>Уход за волосами</option>
                    <option value="Мужчинам" <?php echo $product['category'] == 'Мужчинам' ? 'selected' : ''; ?>>Мужчинам</option>
                    <option value="Подарочные наборы" <?php echo $product['category'] == 'Подарочные наборы' ? 'selected' : ''; ?>>Подарочные наборы</option>
                </select>
            </div>
            <div class="form-group">
                <label>Название</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
            </div>
            <div class="form-group">
                <label>Цена</label>
                <input type="number" name="price" step="0.01" value="<?php echo $product['price']; ?>" required>
            </div>
            <div class="form-group">
                <label>Краткое описание</label>
                <textarea name="short_description" rows="3" required><?php echo htmlspecialchars($product['short_description']); ?></textarea>
            </div>
            <div class="form-group">
                <label>Полное описание</label>
                <textarea name="description" rows="5"><?php echo htmlspecialchars($product['description']); ?></textarea>
            </div>
            <div class="form-group">
                <label>Изображение</label>
                <input type="text" name="image" value="<?php echo htmlspecialchars($product['image']); ?>">
            </div>
            <button type="submit" class="btn" style="width:100%;">Сохранить</button>
            <a href="admin.php" class="btn" style="width:100%; margin-top:10px; background:#6c757d;">Отмена</a>
        </form>
    </div>
</body>
</html>