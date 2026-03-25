<?php
// register.php - Регистрация пользователя
include 'config.php';

$page_title = 'Регистрация';
include 'header.php';  // ДОБАВЛЯЕМ ЭТУ СТРОКУ

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $phone = trim($_POST['phone']);
    
    // Валидация
    if (empty($username) || empty($email) || empty($password)) {
        $error = "Заполните все обязательные поля!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Введите корректный email!";
    } elseif (strlen($password) < 6) {
        $error = "Пароль должен быть не менее 6 символов!";
    } else {
        // Проверяем, не существует ли пользователь
        $check = $conn->query("SELECT id FROM users WHERE email = '$email'");
        if ($check->num_rows > 0) {
            $error = "Пользователь с таким email уже зарегистрирован!";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, email, password, phone) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $username, $email, $hashed_password, $phone);
            
            if ($stmt->execute()) {
                $message = "Регистрация успешна! Теперь вы можете войти.";
                $_POST = array();
            } else {
                $error = "Ошибка: " . $conn->error;
            }
            $stmt->close();
        }
    }
}
?>

<!-- Убираем дублирующийся header, он уже в header.php -->
<div style="display: flex;">
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

    <main class="main-content" style="flex: 1; padding: 40px;">
        <h1 style="color: #ff1a6e; text-align: center;">РЕГИСТРАЦИЯ</h1>
        <hr style="margin-bottom: 30px;">
        
        <?php if ($message): ?>
            <div style="background: #d4edda; color: #155724; padding: 12px; border-radius: 5px; margin-bottom: 20px; text-align: center;">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div style="background: #f8d7da; color: #721c24; padding: 12px; border-radius: 5px; margin-bottom: 20px; text-align: center;">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        
        <div style="max-width: 500px; margin: 0 auto; background: #f8f9fa; padding: 30px; border-radius: 15px; box-shadow: var(--shadow);">
            <form method="POST" action="">
                <div class="form-group">
                    <label>Имя пользователя *</label>
                    <input type="text" name="username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label>Email *</label>
                    <input type="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label>Пароль *</label>
                    <input type="password" name="password" required>
                    <small>Минимум 6 символов</small>
                </div>
                <div class="form-group">
                    <label>Телефон</label>
                    <input type="tel" name="phone" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
                </div>
                <button type="submit" class="btn" style="width: 100%;">Зарегистрироваться</button>
                <p style="text-align: center; margin-top: 15px;">Уже есть аккаунт? <a href="login-process.php">Войти</a></p>
            </form>
        </div>
    </main>
</div>

<?php include 'footer.php'; ?>