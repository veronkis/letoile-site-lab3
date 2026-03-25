<?php
$page_title = 'Сотрудники';
include 'header.php';
?>

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
        <h1 style="color: #ff1a6e; text-align: center;">НАША КОМАНДА</h1>
        <hr style="margin-bottom: 30px;">
        
        <p style="text-align: center; margin-bottom: 40px;">В компании <strong>Лэтуаль</strong> работают <em>более 5000 сотрудников</em> по всей России.</p>
        
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 30px;">
            <div style="background: #f8f9fa; padding: 20px; border-radius: 10px; text-align: center;">
                <img src="images/team1.jpg" alt="Сотрудник" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;">
                <h3 style="color: #ff1a6e;">Бектенова Жанна</h3>
                <p><strong>Генеральный директор</strong></p>
            </div>
            <div style="background: #f8f9fa; padding: 20px; border-radius: 10px; text-align: center;">
                <img src="images/team2.jpg" alt="Сотрудник" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;">
                <h3 style="color: #ff1a6e;">Мазнева Вероника</h3>
                <p><strong>Руководитель отдела закупок</strong></p>
            </div>
            <div style="background: #f8f9fa; padding: 20px; border-radius: 10px; text-align: center;">
                <img src="images/team4.jpg" alt="Сотрудник" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;">
                <h3 style="color: #ff1a6e;">Карлов Роман</h3>
                <p><strong>Руководитель IT-отдела</strong></p>
            </div>
            <div style="background: #f8f9fa; padding: 20px; border-radius: 10px; text-align: center;">
                <img src="images/team3.jpg" alt="Сотрудник" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;">
                <h3 style="color: #ff1a6e;">Гизатулин Денис</h3>
                <p><strong>Главный маркетолог</strong></p>
            </div>
        </div>
        
        <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; border-radius: 10px; text-align: center; margin-top: 30px;">
            <h2 style="color: white;">ПРИСОЕДИНЯЙТЕСЬ К НАШЕЙ КОМАНДЕ!</h2>
            <p>Мы всегда ищем талантливых специалистов</p>
        </div>
        
        <a href="index.php" class="btn" style="margin-top: 30px;">← На главную</a>
    </main>
</div>

<?php include 'footer.php'; ?>