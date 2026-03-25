<?php
$page_title = 'Оплата';
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
        <h1 style="color: #ff1a6e; text-align: center;">СПОСОБЫ ОПЛАТЫ</h1>
        <hr style="margin-bottom: 30px;">
        
        <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; border-radius: 10px; text-align: center; margin-bottom: 40px;">
            <h2 style="color: white;">Безопасная оплата онлайн</h2>
            <p>Все платежи защищены</p>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; margin-bottom: 40px;">
            <div style="background: #f8f9fa; padding: 25px; border-radius: 10px; text-align: center;">
                <h3 style="color: #ff1a6e;">💳 Банковские карты</h3>
                <p>Visa, MasterCard, МИР</p>
                <p>Комиссия 0%</p>
            </div>
            
            <div style="background: #f8f9fa; padding: 25px; border-radius: 10px; text-align: center;">
                <h3 style="color: #ff1a6e;">💰 Наличные</h3>
                <p>При получении заказа</p>
                <p>Курьеру или в магазине</p>
            </div>
            
            <div style="background: #f8f9fa; padding: 25px; border-radius: 10px; text-align: center;">
                <h3 style="color: #ff1a6e;">📱 Электронные кошельки</h3>
                <p>ЮMoney, QIWI</p>
                <p>Мгновенное зачисление</p>
            </div>
        </div>
        
        <h2 style="color: #6b46c1; margin: 40px 0 20px;">Подробнее о способах оплаты</h2>
        
        <div style="margin-bottom: 30px;">
            <h3 style="color: #ff1a6e;">💳 Оплата картой онлайн</h3>
            <p>Принимаются карты Visa, MasterCard и МИР. Оплата происходит через защищенное соединение. Данные карты не передаются продавцу.</p>
            <ul class="modern-list">
                <li>Безопасно - 3D Secure защита</li>
                <li>Быстро - моментальное зачисление</li>
                <li>Удобно - не нужно искать терминал</li>
            </ul>
        </div>
        
        <div style="margin-bottom: 30px;">
            <h3 style="color: #ff1a6e;">💰 Оплата наличными</h3>
            <p>Вы можете оплатить заказ наличными при получении:</p>
            <ul class="modern-list">
                <li>Курьеру при доставке</li>
                <li>В пункте самовывоза</li>
                <li>В любом магазине Лэтуаль</li>
            </ul>
        </div>
        
        <div style="margin-bottom: 30px;">
            <h3 style="color: #ff1a6e;">🏦 Безналичный расчет</h3>
            <p>Для юридических лиц и индивидуальных предпринимателей. После оформления заказа мы выставим счет на оплату.</p>
            <ul class="modern-list">
                <li>Все документы предоставляются</li>
                <li>Работаем с НДС и без НДС</li>
                <li>Отсрочка платежа для постоянных клиентов</li>
            </ul>
        </div>
        
        <div style="background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%); padding: 25px; border-radius: 10px; margin: 40px 0;">
            <h3 style="color: #ff1a6e;">Бонусная программа</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div>
                    <p><strong>Кэшбэк до 10%</strong></p>
                    <p>Бонусами можно оплатить до 30% покупки</p>
                </div>
                <div>
                    <p><strong>Подарки за покупки</strong></p>
                    <p>Накапливайте бонусы и получайте подарки</p>
                </div>
            </div>
        </div>
        
        <div style="background: linear-gradient(135deg, #ff1a6e, #6b46c1); color: white; padding: 20px; border-radius: 10px;">
            <h3 style="color: white;">Гарантия безопасности</h3>
            <p>✓ Все платежи защищены современными протоколами шифрования</p>
            <p>✓ Мы не храним данные ваших карт</p>
            <p>✓ Возврат средств осуществляется быстро и без проблем</p>
        </div>
        
        <a href="index.php" class="btn" style="margin-top: 30px;">← На главную</a>
    </main>
</div>

<?php include 'footer.php'; ?>