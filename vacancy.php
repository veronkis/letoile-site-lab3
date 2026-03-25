<?php
$page_title = 'Вакансии';
include 'header.php';
?>

<div style="display: flex;">
    <aside class="sidebar">...</aside>

    <main class="main-content" style="flex: 1; padding: 40px;">
        <h1 style="color: #ff1a6e; text-align: center;">ВАКАНСИИ</h1>
        <hr>
        
        <div style="background: #f8f9fa; padding: 20px; border-radius: 10px;">
            <h3>Продавец-консультант</h3>
            <p>Зарплата: от 45 000 ₽</p>
            <p>Требования: опыт работы от 1 года</p>
        </div>
        
        <div style="background: #f8f9fa; padding: 20px; border-radius: 10px; margin-top: 20px;">
            <h3>Администратор магазина</h3>
            <p>Зарплата: от 55 000 ₽</p>
            <p>Требования: опыт работы от 2 лет</p>
        </div>
        
        <a href="contacts.php" class="btn" style="margin-top: 20px;">Отправить резюме</a>
    </main>
</div>

<?php include 'footer.php'; ?>