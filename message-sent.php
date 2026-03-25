<?php
$page_title = 'Сообщение отправлено';
include 'header.php';
?>

<div style="display: flex;">
    <aside class="sidebar">...</aside>

    <main class="main-content" style="flex: 1; padding: 60px; text-align: center;">
        <div style="font-size: 80px;">✅</div>
        <h1 style="color: #ff1a6e;">СООБЩЕНИЕ ОТПРАВЛЕНО!</h1>
        <p style="margin: 20px 0;">Спасибо за обращение. Мы ответим вам в ближайшее время.</p>
        <a href="index.php" class="btn">На главную</a>
        <a href="contacts.php" class="btn" style="background: linear-gradient(135deg, #ff1a6e, #6b46c1); margin-left: 10px;">Новое сообщение</a>
    </main>
</div>

<?php include 'footer.php'; ?>