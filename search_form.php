<?php
$page_title = 'Поиск по букве';
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
        <a href="search_form.php">Поиск по букве</a>
    </aside>

    <main class="main-content" style="flex: 1; padding: 40px;">
        <h1 style="color: #ff1a6e; text-align: center;">ПОИСК ТОВАРА ПО ПЕРВОЙ БУКВЕ</h1>
        <hr style="margin-bottom: 30px;">
        
        <div style="background: #f8f9fa; padding: 40px; border-radius: 10px; max-width: 500px; margin: 0 auto;">
            <p style="text-align: center; margin-bottom: 20px;">Введите первую букву названия товара (например: C, D, G, Y и т.д.)</p>
            
            <form name="fl" method="post" action="search_letter.php" style="text-align: center;">
                <input type="text" name="search_q" placeholder="Введите букву..." required maxlength="1" style="padding: 12px; width: 100%; border: 2px solid #eee; border-radius: 5px; font-size: 18px; text-align: center; text-transform: uppercase;">
                <br><br>
                <input type="submit" value="Найти товары" class="btn" style="width: 100%;">
            </form>
            
            <p style="text-align: center; margin-top: 20px; color: var(--gray); font-size: 14px;">
                * Поиск осуществляется по первой букве названия
            </p>
        </div>
    </main>
</div>

<?php include 'footer.php'; ?>