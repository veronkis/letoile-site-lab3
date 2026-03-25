<?php
// products_db.php - Вывод товаров из базы данных с сортировкой, свойствами и изображениями
include 'config.php';

$sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
$message = isset($_GET['message']) ? $_GET['message'] : '';

$allowed_sort = ['id', 'name', 'price'];
if (!in_array($sort, $allowed_sort)) $sort = 'id';
if ($order != 'ASC' && $order != 'DESC') $order = 'ASC';

$sql = "SELECT * FROM product ORDER BY $sort $order";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лэтуаль | Товары из БД</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .product-item {
            border: 1px solid #eee;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            background: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .product-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .product-main {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        .product-main img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            border: 3px solid #ff1a6e;
        }
        .product-info {
            flex: 1;
        }
        .product-info h3 {
            color: #ff1a6e;
            margin-bottom: 10px;
        }
        .product-price {
            font-size: 24px;
            font-weight: bold;
            color: #ff1a6e;
            margin: 10px 0;
        }
        .properties-section {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
        }
        .properties-section h4 {
            margin-bottom: 10px;
            color: #6b46c1;
        }
        .properties-list {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .property-item {
            background: white;
            padding: 5px 12px;
            border-radius: 20px;
            border: 1px solid #ddd;
            font-size: 14px;
        }
        .images-section {
            margin: 15px 0;
        }
        .images-section h4 {
            margin-bottom: 10px;
            color: #6b46c1;
        }
        .additional-images {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .additional-images img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid #ddd;
            cursor: pointer;
        }
        .additional-images img:hover {
            border-color: #ff1a6e;
        }
        .action-buttons {
            margin-top: 15px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .edit-btn, .delete-btn, .add-prop-btn, .add-img-btn {
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
        }
        .edit-btn { background: #ffc107; color: #333; }
        .add-prop-btn { background: #17a2b8; color: white; }
        .add-img-btn { background: #28a745; color: white; }
        .delete-btn { background: #dc3545; color: white; }
        .sort-bar {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 30px;
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }
        .sort-bar a {
            padding: 8px 15px;
            background: white;
            border-radius: 5px;
            text-decoration: none;
            color: #333;
            border: 1px solid #ddd;
        }
        .sort-bar a.active {
            background: #ff1a6e;
            color: white;
        }
        .message-success {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container fade-in">
        <header class="header">...</header>
        <nav class="nav">
            <div class="nav-links">
                <a href="index.html">Главная</a>
                <a href="catalog.html">Каталог</a>
                <a href="contacts.html">Контакты</a>
                <a href="brands.html">Бренды</a>
                <a href="products_db.php">Товары из БД</a>
                <a href="add_product.php">Добавить товар</a>
                <a href="add_property.php">Добавить свойство</a>
                <a href="add_image.php">Добавить фото</a>
            </div>
        </nav>

        <div style="display: flex;">
            <aside class="sidebar">...</aside>
            
            <main class="main-content" style="flex: 1; padding: 40px;">
                <h1 style="color: #ff1a6e; text-align: center;">ТОВАРЫ ИЗ БАЗЫ ДАННЫХ</h1>
                <hr>
                
                <?php if ($message): ?>
                    <div class="message-success"><?php echo htmlspecialchars($message); ?></div>
                <?php endif; ?>
                
                <div class="sort-bar">
                    <span><strong>Сортировка:</strong></span>
                    <a href="?sort=id&order=ASC" class="<?php echo ($sort=='id' && $order=='ASC')?'active':''; ?>">По ID ↑</a>
                    <a href="?sort=id&order=DESC" class="<?php echo ($sort=='id' && $order=='DESC')?'active':''; ?>">По ID ↓</a>
                    <a href="?sort=name&order=ASC" class="<?php echo ($sort=='name' && $order=='ASC')?'active':''; ?>">По названию А-Я</a>
                    <a href="?sort=name&order=DESC" class="<?php echo ($sort=='name' && $order=='DESC')?'active':''; ?>">По названию Я-А</a>
                    <a href="?sort=price&order=ASC" class="<?php echo ($sort=='price' && $order=='ASC')?'active':''; ?>">По цене ↑</a>
                    <a href="?sort=price&order=DESC" class="<?php echo ($sort=='price' && $order=='DESC')?'active':''; ?>">По цене ↓</a>
                </div>

                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $product_id = $row['id'];
                        
                        // Получаем свойства товара
                        $prop_sql = "SELECT * FROM product_properties WHERE product_id = $product_id";
                        $prop_result = $conn->query($prop_sql);
                        
                        // Получаем дополнительные изображения
                        $img_sql = "SELECT * FROM product_images WHERE product_id = $product_id";
                        $img_result = $conn->query($img_sql);
                        
                        echo '<div class="product-item">';
                        echo '<div class="product-main">';
                        echo '<img src="images/' . $row['image'] . '" alt="' . $row['name'] . '">';
                        echo '<div class="product-info">';
                        echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                        echo '<div class="product-price">' . number_format($row['price'], 0, '', ' ') . ' ₽</div>';
                        echo '<p><strong>Описание:</strong> ' . htmlspecialchars($row['short_description']) . '</p>';
                        echo '</div></div>';
                        
                        // Вывод свойств товара
                        if ($prop_result->num_rows > 0) {
                            echo '<div class="properties-section">';
                            echo '<h4>📦 Характеристики:</h4>';
                            echo '<div class="properties-list">';
                            while($prop = $prop_result->fetch_assoc()) {
                                echo '<div class="property-item">';
                                echo '<strong>' . htmlspecialchars($prop['property_name']) . ':</strong> ';
                                echo htmlspecialchars($prop['property_value']);
                                if ($prop['property_price'] > 0) {
                                    echo ' (+' . number_format($prop['property_price'], 0, '', ' ') . ' ₽)';
                                }
                                echo ' <a href="delete_property.php?id=' . $prop['id'] . '&product_id=' . $product_id . '" style="color:red; text-decoration:none;" onclick="return confirm(\'Удалить свойство?\')">✖</a>';
                                echo '</div>';
                            }
                            echo '</div></div>';
                        }
                        
                        // Вывод дополнительных изображений
                        if ($img_result->num_rows > 0) {
                            echo '<div class="images-section">';
                            echo '<h4>🖼️ Дополнительные фото:</h4>';
                            echo '<div class="additional-images">';
                            while($img = $img_result->fetch_assoc()) {
                                echo '<a href="images/' . $img['image'] . '" target="_blank">';
                                echo '<img src="images/' . $img['image'] . '" alt="' . $img['title'] . '">';
                                echo '</a>';
                                echo ' <a href="delete_image.php?id=' . $img['id'] . '&product_id=' . $product_id . '" style="color:red; text-decoration:none; font-size:12px;" onclick="return confirm(\'Удалить фото?\')">✖</a>';
                            }
                            echo '</div></div>';
                        }
                        
                        // Кнопки действий
                        echo '<div class="action-buttons">';
                        echo '<a href="edit_product.php?id=' . $product_id . '" class="edit-btn">✎ Редактировать товар</a>';
                        echo '<a href="add_property.php?product_id=' . $product_id . '" class="add-prop-btn">+ Добавить свойство</a>';
                        echo '<a href="add_image.php?product_id=' . $product_id . '" class="add-img-btn">+ Добавить фото</a>';
                        echo '<a href="delete_product.php?id=' . $product_id . '" class="delete-btn" onclick="return confirm(\'Удалить товар?\')">🗑 Удалить товар</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p style="text-align: center;">Товары не найдены</p>';
                }
                $conn->close();
                ?>
            </main>
        </div>
        <footer class="footer">...</footer>
    </div>
</body>
</html>