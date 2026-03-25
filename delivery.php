<?php
$page_title = 'Доставка';
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
        <h1 style="color: #ff1a6e; text-align: center;">ДОСТАВКА</h1>
        <hr style="margin-bottom: 30px;">
        
        <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; border-radius: 10px; text-align: center; margin-bottom: 40px;">
            <h2 style="color: white;">Бесплатная доставка от 3000₽</h2>
            <p>Доставляем по всей России</p>
        </div>
        
        <h2 style="color: #6b46c1; margin-bottom: 20px;">Способы доставки</h2>
        
        <table class="modern-table">
            <tr>
                <th>Способ доставки</th>
                <th>Сроки</th>
                <th>Стоимость</th>
            </tr>
            <tr>
                <td><strong>Курьером по Москве</strong></td>
                <td>1-2 дня</td>
                <td>300 ₽ (бесплатно от 3000₽)</td>
            </tr>
            <tr>
                <td><strong>Курьером по СПб</strong></td>
                <td>2-3 дня</td>
                <td>350 ₽ (бесплатно от 3000₽)</td>
            </tr>
            <tr>
                <td><strong>Почта России</strong></td>
                <td>5-14 дней</td>
                <td>от 350 ₽</td>
            </tr>
            <tr>
                <td><strong>СДЭК</strong></td>
                <td>3-7 дней</td>
                <td>от 400 ₽</td>
            </tr>
            <tr>
                <td><strong>Самовывоз из магазина</strong></td>
                <td>1 день</td>
                <td><strong style="color: green;">Бесплатно</strong></td>
            </tr>
        </table>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin: 40px 0;">
            <div style="background: #f8f9fa; padding: 25px; border-radius: 10px;">
                <h3 style="color: #ff1a6e;">🚚 Курьерская доставка</h3>
                <ul class="modern-list">
                    <li>Доставка осуществляется ежедневно с 10:00 до 22:00</li>
                    <li>Курьер предварительно свяжется с вами</li>
                    <li>Возможна примерка товара</li>
                    <li>Оплата наличными или картой курьеру</li>
                </ul>
            </div>
            
            <div style="background: #f8f9fa; padding: 25px; border-radius: 10px;">
                <h3 style="color: #ff1a6e;">📦 Самовывоз</h3>
                <ul class="modern-list">
                    <li>Более 700 пунктов выдачи по России</li>
                    <li>Заказ хранится 7 дней</li>
                    <li>При себе иметь паспорт</li>
                    <li>Оплата при получении</li>
                </ul>
            </div>
        </div>
        
        <div style="background: #f8f9fa; padding: 25px; border-radius: 10px; margin-bottom: 30px;">
            <h3 style="color: #ff1a6e;">📍 Пункты самовывоза в Москве</h3>
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px;">
                <div>
                    <p><strong>м. Тверская</strong></p>
                    <p>ул. Тверская, д. 1</p>
                </div>
                <div>
                    <p><strong>м. Арбатская</strong></p>
                    <p>ул. Новый Арбат, д. 15</p>
                </div>
                <div>
                    <p><strong>м. Павелецкая</strong></p>
                    <p>ул. Зацепский Вал, д. 2</p>
                </div>
                <div>
                    <p><strong>м. Кузнецкий мост</strong></p>
                    <p>ул. Рождественка, д. 5</p>
                </div>
            </div>
        </div>
        
        <div style="background: linear-gradient(135deg, #ff1a6e, #6b46c1); color: white; padding: 20px; border-radius: 10px;">
            <h3 style="color: white;">Важно!</h3>
            <p>✓ При получении заказа проверьте целостность упаковки</p>
            <p>✓ Возврат товара возможен в течение 14 дней</p>
            <p>✓ Бесплатная доставка действует при заказе от 3000₽</p>
        </div>
        
        <a href="index.php" class="btn" style="margin-top: 30px;">← На главную</a>
    </main>
</div>

<?php include 'footer.php'; ?>