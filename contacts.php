<?php
$page_title = 'Контакты';
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
        <h1 style="color: #ff1a6e; text-align: center;">НАПИШИТЕ НАМ</h1>
        <hr style="margin-bottom: 30px;">
        
        <div class="contact-form">
            <form action="message-sent.php" method="get">
                <div class="form-group">
                    <label>Имя *</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label>Email *</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label>Телефон</label>
                    <input type="tel" name="phone">
                </div>
                <div class="form-group">
                    <label>Тема</label>
                    <input type="text" name="subject">
                </div>
                <div class="form-group">
                    <label>Сообщение *</label>
                    <textarea name="message" required rows="5"></textarea>
                </div>
                <button type="submit" class="btn" style="width: 100%;">Отправить сообщение</button>
            </form>
        </div>
        
        <h2 style="color: #6b46c1; margin: 40px 0 20px;">АДРЕС</h2>
        
        <div style="background: #f8f9fa; padding: 20px; border-radius: 10px;">
            <p><strong>Телефон:</strong> 8-800-123-45-67 (бесплатно по России)</p>
            <p><strong>Email:</strong> info@letoile.ru</p>
            <p><strong>Адрес:</strong> г. Москва, ул. Тверская, д. 1</p>
            <p><strong>Часы работы:</strong> Ежедневно с 10:00 до 22:00</p>
        </div>
        
        <!-- GOOGLE КАРТА -->
        <h2 style="color: #6b46c1; margin: 40px 0 20px;">📍 КАК НАС НАЙТИ</h2>
        <div style="border-radius: 10px; overflow: hidden; box-shadow: var(--shadow); margin-bottom: 20px;">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2245.1040105423103!2d37.6110974767461!3d55.756695373085726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54a5aa91b8145%3A0x7e7cddd0c984796c!2s6%2C%201%2C%20Moskva%2C%20125009!5e0!3m2!1sen!2sru!4v1772112708520!5m2!1sen!2sru" 
                width="100%" 
                height="450" 
                style="border:0; display: block;" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>
        
        <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 10px;">
            <h3 style="color: white;">Как добраться</h3>
            <p>🚇 Метро: Тверская, Пушкинская, Чеховская (5 минут пешком)</p>
        </div>
    </main>
</div>

<?php include 'footer.php'; ?>