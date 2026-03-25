<?php
$page_title = 'Бренды';
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
        <h1 style="color: #ff1a6e; text-align: center;">БРЕНДЫ</h1>
        <hr style="margin-bottom: 30px;">
        
        <p style="text-align: center; margin-bottom: 40px;">Мы представляем более <strong>1000 брендов</strong> со всего мира. Выбирайте любимые!</p>
        
        <h2 style="color: #6b46c1; margin-bottom: 20px;">🔥 Популярные бренды</h2>
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 40px;">
            <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px 20px; border-radius: 10px; text-align: center;">
                <a href="brand-chanel.php" style="color: white; text-decoration: none; font-weight: bold; font-size: 18px;">CHANEL</a>
            </div>
            <div style="background: linear-gradient(135deg, #ff1a6e, #6b46c1); color: white; padding: 30px 20px; border-radius: 10px; text-align: center;">
                <a href="brand-dior.php" style="color: white; text-decoration: none; font-weight: bold; font-size: 18px;">DIOR</a>
            </div>
            <div style="background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%); color: white; padding: 30px 20px; border-radius: 10px; text-align: center;">
                <span style="font-weight: bold; font-size: 18px;">GUCCI</span>
            </div>
            <div style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%); color: white; padding: 30px 20px; border-radius: 10px; text-align: center;">
                <span style="font-weight: bold; font-size: 18px;">YSL</span>
            </div>
        </div>
        
        <h2 style="color: #6b46c1; margin: 40px 0 20px;">🇫🇷 Французские бренды</h2>
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 15px; margin-bottom: 30px;">
            <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; text-align: center;"><a href="brand-chanel.php" style="color: #333;">Chanel</a></div>
            <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; text-align: center;"><a href="brand-dior.php" style="color: #333;">Dior</a></div>
            <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; text-align: center;">Givenchy</div>
            <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; text-align: center;">YSL</div>
            <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; text-align: center;">Lancome</div>
            <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; text-align: center;">Guerlain</div>
            <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; text-align: center;">Clarins</div>
            <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; text-align: center;">L'Occitane</div>
        </div>
        
        <h2 style="color: #6b46c1; margin: 40px 0 20px;">🇮🇹 Итальянские бренды</h2>
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 15px; margin-bottom: 30px;">
            <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; text-align: center;">Giorgio Armani</div>
            <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; text-align: center;">Versace</div>
            <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; text-align: center;">Dolce&Gabbana</div>
            <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; text-align: center;">Prada</div>
            <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; text-align: center;">Gucci</div>
            <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; text-align: center;">Valentino</div>
            <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; text-align: center;">Bvlgari</div>
            <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; text-align: center;">Moschino</div>
        </div>
        
        <!-- БЛОК СВЯЗИ -->
        <div style="background: linear-gradient(135deg, #ff1a6e, #6b46c1); color: white; padding: 30px; border-radius: 10px; margin-top: 40px; text-align: center;">
            <h3 style="color: white; margin-bottom: 15px;">Нужна консультация по брендам?</h3>
            <p style="margin-bottom: 20px;">Наши специалисты помогут выбрать идеальный продукт</p>
            <div style="display: flex; justify-content: center; gap: 30px;">
                <div><p>📞 <a href="tel:88001234567" style="color: white;">8-800-123-45-67</a></p></div>
                <div><p>✉️ <a href="mailto:info@letoile.ru" style="color: white;">info@letoile.ru</a></p></div>
                <div><p>📍 <a href="contacts.php" style="color: white;">Адреса</a></p></div>
            </div>
        </div>
    </main>
</div>

<?php include 'footer.php'; ?>