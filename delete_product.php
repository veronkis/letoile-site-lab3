<?php
// delete_product.php - Удаление товара
session_start();
include 'config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != 1) {
    header("Location: index.php");
    exit;
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id > 0) {
    $conn->query("DELETE FROM product WHERE id = $id");
}

header("Location: admin.php");
exit;
?>