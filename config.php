<?php
// config.php - Подключение к базе данных

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "letoile_db";

// Создаем подключение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем подключение
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Устанавливаем кодировку
$conn->set_charset("utf8");
?>