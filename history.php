<?php
$page_title = 'История фирмы';
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
        <h1 style="color: #ff1a6e; text-align: center;">ИСТОРИЯ КОМПАНИИ</h1>
        <hr style="margin-bottom: 30px;">
        
        <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 30px; align-items: start;">
            <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 10px;">
                <h3 style="color: white; text-align: center;">Годы</h3>
                <p><strong>1997</strong></p>
                <p><strong>2005</strong></p>
                <p><strong>2010</strong></p>
                <p><strong>2015</strong></p>
                <p><strong>2024</strong></p>
            </div>
            
            <div>
                <h3 style="color: #6b46c1;">1997 год</h3>
                <p>Открытие первого магазина <strong>Лэтуаль</strong> в Москве.</p>
                
                <h3 style="color: #6b46c1; margin-top: 20px;">2005 год</h3>
                <p>Запуск <em>интернет-магазина</em>.</p>
                
                <h3 style="color: #6b46c1; margin-top: 20px;">2010 год</h3>
                <p>Выход на международный рынок.</p>
                
                <h3 style="color: #6b46c1; margin-top: 20px;">2015 год</h3>
                <p>Открытие 500-го магазина.</p>
                
                <h3 style="color: #6b46c1; margin-top: 20px;">2024 год</h3>
                <p>Сегодня у нас более <strong>700 магазинов</strong> по всей России.</p>
            </div>
        </div>
        
        <a href="index.php" class="btn" style="margin-top: 30px;">← На главную</a>
    </main>
</div>

<?php include 'footer.php'; ?>