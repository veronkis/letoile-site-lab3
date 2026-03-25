<?php
// admin.php - Админ-панель (только товары)
session_start();
include 'config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != 1) {
    header("Location: index.php");
    exit;
}

$sql = "SELECT * FROM product ORDER BY id ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лэтуаль | Админ-панель</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .admin-header {
            background: #ff1a6e;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .admin-menu {
            background: #333;
            padding: 10px;
            text-align: center;
        }
        .admin-menu a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            padding: 5px 10px;
        }
        .admin-menu a:hover {
            background: #ff1a6e;
            border-radius: 5px;
        }
        .product-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .product-table th, .product-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .product-table th {
            background: #f8f9fa;
        }
        .btn-small {
            padding: 5px 10px;
            font-size: 12px;
            margin: 0 2px;
            display: inline-block;
            text-decoration: none;
            border-radius: 3px;
        }
        .btn-edit {
            background: #ffc107;
            color: #333;
        }
        .btn-delete {
            background: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>Админ-панель Лэтуаль</h1>
            <p>Добро пожаловать, <?php echo $_SESSION['username']; ?></p>
        </div>
        <div class="admin-menu">
            <a href="admin.php">📦 Товары</a>
            <a href="add_product.php">➕ Добавить товар</a>
            <a href="index.php">🏠 На сайт</a>
            <a href="logout.php">🚪 Выйти</a>
        </div>
        
        <h2 style="margin-top: 20px;">Управление товарами</h2>
        
        <table class="product-table">
            <tr>
                <th>ID</th>
                <th>Изображение</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Действия</th>
             </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><img src="images/<?php echo $row['image']; ?>" width="50" height="50" style="object-fit: cover;"></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo number_format($row['price'], 0, '', ' '); ?> ₽</td>
                <td>
                    <a href="edit_product.php?id=<?php echo $row['id']; ?>" class="btn-small btn-edit">✎ Редактировать</a>
                    <a href="delete_product.php?id=<?php echo $row['id']; ?>" class="btn-small btn-delete" onclick="return confirm('Удалить товар?')">🗑 Удалить</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>